<?php
/*
* Script: DataTables server-side script for PHP and MySQL
* Copyright: 2010 - Allan Jardine, 2012 - Chris Wright
* License: GPL v2 or BSD (3-point)
*/

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Easy set variables
*/

/* Array of database columns which should be read and sent back to DataTables. Use a space where
* you want to insert a non-database field (for example a counter or static image)
*/
$aColumns = array('number', 'title', 'date_recieve', 'date_doc');

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "ID";

/* DB table to use */
$sTable = "lcp3_docinf";

/* Database connection information */
$gaSql['user'] = "nattanin";
$gaSql['password'] = "Np721220$";
$gaSql['db'] = "npdms";
$gaSql['server'] = "localhost";


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* If you just want to use the basic configuration for DataTables with PHP server-side, there is
* no need to edit below this line
*/

/*
* Local functions
*/
function fatal_error($sErrorMessage = '')
{
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    die($sErrorMessage);
}


/*
* MySQL connection
*/
if (!$gaSql['link'] = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'])) {
    fatal_error('Could not open connection to server');
}
/*
if ( ! mysqli_select_db( $gaSql['db'], $gaSql['link'] ) )
{
fatal_error( 'Could not select database ' );
}
*/
$gaSql['link']->set_charset("utf8");
/*
* Paging
*/
$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " .
        intval($_GET['iDisplayLength']);
}


/*
* Ordering
*/
$sOrder = "";
if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY ";
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
" . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
        }
    }

    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == "ORDER BY") {
        $sOrder = "";
    }
}


/*
* Filtering
* NOTE this does not match the built-in DataTables filtering which does it
* word by word on any field. It's possible to do here, but concerned about efficiency
* on very large tables, and MySQL's regex functionality is very limited
*/
$sWhere = "";
if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
    $sWhere = "WHERE (";
    for ($i = 0; $i < count($aColumns); $i++) {
        if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
            $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch']) . "%' OR ";
        }
    }
    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ')';
}

/* Individual column filtering */
for ($i = 0; $i < count($aColumns); $i++) {
    if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
        if ($sWhere == "") {
            $sWhere = "WHERE ";
        } else {
            $sWhere .= " AND ";
        }
        $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
    }
}


/*
* SQL queries
* Get data to display
SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
FROM $sTable
*/
$sQuery = "
SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
FROM $sTable
$sWhere
$sOrder
$sLimit
";

/*$rResult = mysqli_query($sQuery, $gaSql['link']) or die(mysqli_errno($sQuery)); */
$rResult = $gaSql['link']->query($sQuery) or die($gaSql['link']->error);


/* Data set length after filtering */
$sQuery = "
SELECT FOUND_ROWS()
";
/*$rResultFilterTotal = mysqli_query($sQuery, $gaSql['link']) or die('MySQL Error: ' . mysqli_errno($sQuery));
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);*/
$rResultFilterTotal = $gaSql['link']->query($sQuery) or die($gaSql['link']->error);
$aResultFilterTotal = $rResultFilterTotal->fetch_array();

$iFilteredTotal = $aResultFilterTotal[0];

/* Total data set length */
$sQuery = "
SELECT COUNT(" . $sIndexColumn . ")
FROM $sTable
";
/*$rResultTotal = mysqli_query($sQuery, $gaSql['link']) or die('MySQL Error: ' . mysqli_errno($sQuery));
$aResultTotal = mysqli_fetch_array($rResultTotal);*/

$rResultTotal = ($gaSql['link']->query($sQuery)) or die($gaSql['link']->error);
$aResultTotal = $rResultTotal->fetch_array();

$iTotal = $aResultTotal[0];


/*
* Output


$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);
*/
/*while ($aRow = $rResult->fetch_array(MYSQLI_ASSOC)) {*/



while ($aRow = mysqli_fetch_array($rResult, MYSQLI_ASSOC)) {
    $row = array();
    for ($i = 0; $i < count($aColumns); $i++) {
        if ($aColumns[$i] == "version") {
            /* Special output formatting for 'version' column */
            $row[] = ($aRow[$aColumns[$i]] == "0") ? '-' : $aRow[$aColumns[$i]];
        } else if ($aColumns[$i] != ' ') {
            /* General output */
            $row[] = $aRow[$aColumns[$i]];
        }
    }
    $output['aaData'][] = $row;
}

echo json_encode($output);
