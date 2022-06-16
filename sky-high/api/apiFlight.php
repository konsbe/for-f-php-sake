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
        $ticketId= $_POST['ticketId'];
        $myPrice= $_POST['myPrice'];
        //Sql query
        $sqlt = "INSERT INTO tickets(passenger_id_card,passenger_name,passenger_phone,ticket_id,ticket_price) VALUES ('".$_POST['idCard']."','".$_POST['lastName']."','".$_POST['phone']."','".$_POST['ticketId']."','".$_POST['myPrice']."')";
        // echo $sql;
        $result = pg_query($dbconn, $sqlt);
        //Check results
        if ($result) {
                    echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                    <p>$passengerId ticket αποθηκευση οκ
                    </p> <br>
                    <a href='../personal-data.php'>Back</a>
                    </div>
        ";
        } else {
                        echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                        <p>Error: στην αποθηκευση ticket
                        </p> <br>
                        <a href='../personal-data.php'>Back</a>
                        </div>
        ";
            die('Query failed: ' . pg_last_error());
        }
        //Close connection
        pg_close($dbconn);
    }
    bookAflight();
?>




