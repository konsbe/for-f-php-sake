<?php
    require_once 'env.php';
    //Open Connection
    $connecionstr="host=".DB_SERVER." port=5432 dbname=".DB_BASE." password=".DB_PASS." user=".DB_USER." options='--client_encoding=UTF8'";
    $dbconn = pg_connect($connecionstr);
    $milliseconds = floor(microtime(true) * 1000);

    // Check connection
    if (!$dbconn) {
        die("Connection failed: " . pg_connect_error());
    }
    //Sql query
    $sql = "INSERT INTO airplanes(plane_id,plane_name,distance) VALUES ('".$_POST['idPlane']."','".$_POST['planeCompany']."','".$_POST['planeDistance']."')";
    echo $sql;
    $result = pg_query($dbconn, $sql) ;
    //Check results
    if ($result) {
    echo "αποθηκευση οκ";
    } else {
        echo "αποθηκευση NOT οκ <br>";
        die('Query failed: ' . pg_last_error());
    }
    //Close connection
    pg_close($dbconn);
?>
