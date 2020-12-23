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
          <link href="../css/bootstrap.min.css" rel="stylesheet">

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
    </head>
    <div class="table-responsive">
    <table class= "table table-bordered" id="dataTable" width="100%"" cellspacing="0">
                        <thead><tr><th>ID</th><th>Number</th><th>Title</th>
                        <th>date_recieve</th><th>date_doc</th></tr></thead>
                <tbody>
                <?php
                include"database.php";
                $query = "SELECT `lcp3_document`.*, `lcp3_docdetail`.* FROM `lcp3_document` , `lcp3_docdetail` WHERE `lcp3_docdetail`.`document_ID` = `lcp3_document`.`ID";
                       
                if ($result = mysqli_query($conn,$query) ) {
                  while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td><?php echo $row["ID"]; ?> </td>
                      <td><?php echo $row["number"]; ?> </td>
                      <td><?php echo $row["title"]; ?> </td>
                      <td><?php echo $row["date_recieve"]; ?> </td>
                      <td><?php echo $row["date_doc"]; ?> </td>
                    </tr>
                <?php } 
                  
                } else {
                    echo '0 results';
                    }
                    mysqli_close($conn);
                ?>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
crossorigin="anonymous"></script>

<script src="dashboard.js"></script>
</html>