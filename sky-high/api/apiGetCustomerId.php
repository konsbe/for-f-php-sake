<?php
      include('apiUser.php');
      include('apiFlight.php');
      require_once '../env.php';
      //Open Connection
      $connecionstr="host=".DB_SERVER." port=5432 dbname=".DB_BASE." password=".DB_PASS." user=".DB_USER." options='--client_encoding=UTF8'";
      $dbconn = pg_connect($connecionstr);
      $milliseconds = floor(microtime(true) * 1000);

      // Check connection
      if (!$dbconn) {
        die("Connection failed: " . pg_connect_error());
      }
      $idCard = $_POST['idCard'];

      //Sql query
      $sql = "SELECT passenger_id from passengers WHERE passenger_id LIKE '$idCard'";
      $result = pg_query($dbconn, $sql) ;
      //Check results
      if ($result) {
        // echo json_encode($result);
        // echo var_dump(json_encode($result));
        $resultArray = pg_fetch_all($result);
        if(!$resultArray){
          makeUserNticket();
        }else{
          bookAflight();
          // echo json_encode($resultArray);
        }
        
      } else {
        die('Query failed: ' . pg_last_error());
    }
   //Close connection
    pg_close($dbconn);
    ?>