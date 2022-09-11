<?php
    function makeUserNticket(){
    require_once '../env.php';
    //Open Connection
    $connecionstr="host=".DB_SERVER." port=5432 dbname=".DB_BASE." password=".DB_PASS." user=".DB_USER." options='--client_encoding=UTF8'";
    $dbconn = pg_connect($connecionstr);
    $milliseconds = floor(microtime(true) * 1000);
    // Check connection
    if (!$dbconn) {
        die("Connection failed: " . pg_connect_error());
    }
    //Sql query
    $name=$_POST['lastName'];
    $sql = "INSERT INTO passengers(passenger_id, passenger_name,passenger_phone, passenger_mail, passenger_address, passenger_created_on)
     VALUES ('".$_POST['idCard']."','".$_POST['lastName']."','".$_POST['phone']."','".$_POST['mail']."','".$_POST['userAddress']."',$milliseconds)";
    // echo $sql;
    $result = pg_query($dbconn, $sql) ;
    if ($result) {
    $passengerId= $_POST['idCard'];
    $passengerPhone = $_POST['phone'];
    $passengerName= $_POST['lastName'];
    $ticketId= $_POST['ticketId'];
    $fare= $_POST['sheetCategory'];
    $flights= $_POST['countryTO'] .' ' . $_POST['countryFROM'];
    //Sql query
    $sqlt = "INSERT INTO tickets(ticket_no, passenger_id, flights, amount, fare) 
    VALUES ('".$_POST['ticketId']."','".$_POST['idCard']."','$flights','".$_POST['myPrice']."','$fare')";
    // echo $sql; 
    //insert into tickets(ticket_no, passenger_id, flights, amount, fare)values(1234567890125,'asd','123','45','Economy');
    $resultt = pg_query($dbconn, $sqlt);
    //Check results
    if ($resultt) {
                echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                <p>$passengerId ticket αποθηκευση οκ
                <p>$passengerId ειναι καινουργιος</p>
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
    }} else {
                            echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                    <p>Error: στην αποθηκευση ticket
                    </p> <br>
                    <a href='../routes/personal-data.php'>Back</a>
                    </div>
    ";
        die('Query failed: ' . pg_last_error());
        //Close connection
        pg_close($dbconn);
    }}
?>




<!--  -->