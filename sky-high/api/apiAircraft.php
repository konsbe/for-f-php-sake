

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
    $passengerId= $_POST['passengerId'];
    $passengerPhone = $_POST['passengerPhone'];
    $passengerName= $_POST['passengerName'];
    //Sql query
    $name=$_POST['lastName'];
    $sql = "INSERT INTO tickets(passenger_id,passenger_name,passenger_phone) VALUES ('".$_POST['passengerId']."','".$_POST['passengerName ']."','".$_POST['passengerPhone ']."',$milliseconds)";
    // echo $sql;
    $result = pg_query($dbconn, $sql) ;
    //Check results
    if ($result) {
                echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                <p>$name αποθηκευση οκ
                </p> <br>
                <a href='../dashboard.php'>Back</a>
                </div>
";
    } else {
                    echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                    <p>Error: στην αποθηκευση
                    </p> <br>
                    <a href='../dashboard.php'>Back</a>
                    </div>
";
        die('Query failed: ' . pg_last_error());
    }
    //Close connection
    pg_close($dbconn);
?>