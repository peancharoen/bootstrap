<?php
    /*https://www.copahost.com/blog/login-registration-php-mysql-bootstrap/ */
    /* $link = mysqli_connect("localhost","boris_login",".98vfwL9zpLI","boris_login");
    if (!$link)
    {
        echo "MySQL Error: " . mysqli_connect_error();
    } */
    $serverName = "localhost";
    $userName = "nattanin";
    $userPassword = "Np721220$";
    $dbName = "npdms";
    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    mysqli_set_charset($conn, "utf8");
    /* check connection */
    if (mysqli_connect_errno()) {  
        printf("ไม่สามารถเชื่อมต่อกับฐานข้อมูล MySQL ได้: %s\n", mysqli_connect_error());
        exit();  
        }
    /* change character set to utf8 */
    if(!$conn->set_charset("utf8")) {  
        printf("Error loading character set utf8: %s\n", $conn->error);  
        exit();  
        }   
?>