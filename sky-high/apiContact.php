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
    $sql = "INSERT INTO personal(first_name, last_name, country,created_on) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['country']."',$milliseconds) ";
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
