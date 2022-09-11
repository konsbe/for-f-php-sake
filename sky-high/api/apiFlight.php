<?php
    require_once '../env.php';
    //Open Connection
    function bookAflight(){
        $connecionstr="host=".DB_SERVER." port=5432 dbname=".DB_BASE." password=".DB_PASS." user=".DB_USER." options='--client_encoding=UTF8'";
        $dbconn = pg_connect($connecionstr);
        $milliseconds = floor(microtime(true) * 1000);

        // Check connection
        if (!$dbconn) {
            die("Connection failed: " . pg_connect_error());
        }
        $passengerId= $_POST['idCard'];
        $passengerPhone = $_POST['phone'];
        $passengerName= $_POST['lastName'];
        $fare= $_POST['sheetCategory'];
        $flights= $_POST['countryTO'] . $_POST['countryFROM'];

        //Sql query
        $sqlt = "INSERT INTO tickets(ticket_no, passenger_id, flights, amount, fare) 
            VALUES ('".$_POST['ticketId']."','".$_POST['idCard']."','$flights','".$_POST['myPrice']."','$fare')";
        // echo $sql;
        $result = pg_query($dbconn, $sqlt);
        //Check results
        if ($result) {
                    echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                    <p>$passengerId ticket αποθηκευση οκ
                    <p?>$passengerId ειναι ήδη στη λίστα</p>
                    </p> <br>
                    <a href='../routes/personal-data.php'>Back</a>
                    </div>
        ";
        } else {
                        echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                        <p>Error: στην αποθηκευση ticket
                        </p> <br>
                        <a href='../routes/personal-data.php'>Back</a>
                        </div>
        ";
            die('Query failed: ' . pg_last_error());
        }
        //Close connection
        pg_close($dbconn);
    }
    bookAflight();
?>




