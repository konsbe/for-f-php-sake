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
    //Sql query
    $name=$_POST['lastName'];
    $sql = "INSERT INTO customers(customer_name,customer_phone,customer_id_card,customer_mail,customer_address,customer_created_on) VALUES ('".$_POST['lastName']."','".$_POST['phone']."','".$_POST['idCard']."','".$_POST['mail']."','".$_POST['userAddress']."',$milliseconds)";
    // echo $sql;
    $result = pg_query($dbconn, $sql) ;
    //Check results
    if ($result) {
                echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                <p>$name αποθηκευση οκ
                </p> <br>
                <a href='../information.php'>Back</a>
                </div>
";
    } else {
                    echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                    <p>Error: στην αποθηκευση
                    </p> <br>
                    <a href='../information.php'>Back</a>
                    </div>
";
        die('Query failed: ' . pg_last_error());
    }
    //Close connection
    pg_close($dbconn);
?>
