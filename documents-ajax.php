<!doctype html>
<html lang="en">

    <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">
          <meta name="author" content="Nattanin Prancharoen">
          <meta name="generator" content="np-dms.com">
          <title>Dashboard Template · Bootstrap v5.0</title>

          <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



          <!-- Bootstrap core CSS -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
          <!-- นำเข้า  CSS จาก dataTables -->
  <       <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
         
          <style>
          .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    user-select: none;
          }

          @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                              font-size: 3.5rem;
                    }
          }
          </style>
          <!-- Custom styles for this template -->
          <link href="dashboard.css" rel="stylesheet">
          <!--https://www.discussdesk.com/bootstrap-datatable-with-php-mysql-server-side-script.htm -->
          <!-- นำเข้า  Javascript จาก  Jquery -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   
          <script type="text/javascript" language="javascript" class="init">
          //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id = documents-table
                    $(document).ready(function() {
                    $('#doctable').dataTable({
                    "aProcessing": true,
                    "aServerSide": true,
                    "ajax": "server-response.php",
                    } );
                    } );

          </script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
          crossorigin="anonymous"></script>

    </head>
    <div class="table-responsive">
    <table class= "table table-bordered" id="doctable" width="100%"" cellspacing="0">
                        <thead><tr><th data-field="id">ID</th><th ata-field="number">Number</th><th data-field="title">Title</th>
                        <th data-field="date_recieve">date_recieve</th><th data-field="date_doc">date_doc</th></tr></thead>
                <tbody>
                    <tr>
                    <td data-field="id"></td>
                    <td data-field="number"></td>
                    <td data-field="title"></td>
                    <td data-field="date_recieve"></td>
                    <td data-field="date_doc"></td>"
                    </tr>
                </tbody>
                        <tfoot>
                          <tr>
                            <th>ID</th>
                            <th>Number</th>
                            <th>Title</th>
                            <th>date_recieve</th>
                            <th>date_doc</th>
                          </tr>
                        </tfoot>       
                      
              </table>    
    </div>


<script src="dashboard.js"></script>
</html>