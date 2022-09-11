

<?php
    require_once '../env.php';
    //Open Connection
    $connecionstr="host=".DB_SERVER." port=5432 dbname=".DB_BASE." password=".DB_PASS." user=".DB_USER." options='--client_encoding=UTF8'";
    $dbconn = pg_connect($connecionstr);
    $milliseconds = floor(microtime(true) * 1000);

    // Check connection
    if (!$dbconn) {
        die("Connection failed: " . pg_connect_error());
    }
    $idPlane= $_POST['idPlane'];
    $planeCompany = $_POST['planeCompany'];
    $planeDistance= $_POST['planeDistance'];
    $planeCapacity= $_POST['planeCapacity'];
    //Sql query
    $sql = "INSERT INTO aircrafts(aircraft_code,aircraft_model,capacity,range) VALUES ('".$_POST['idPlane']."','".$_POST['planeCompany']."','".$_POST['planeCapacity']."','".$_POST['planeDistance']."')";
    // echo $sql;
    $result = pg_query($dbconn, $sql) ;
    //Check results
    if ($result) {
                echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                <p>$idPlane αποθηκευση οκ
                </p> <br>
                <a href='../routes/information.php'>Back</a>
                </div>
";
    } else {
                    echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                    <p>Error: στην αποθηκευση
                    </p> <br>
                    <a href='../routes/information.php'>Back</a>
                    </div>
";
        die('Query failed: ' . pg_last_error());
    }
    //Close connection
    pg_close($dbconn);
?>