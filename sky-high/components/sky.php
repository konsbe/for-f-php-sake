<?php
      require_once './env.php';
      //Open Connection
      $connecionstr="host=".DB_SERVER." port=5432 dbname=".DB_BASE." password=".DB_PASS." user=".DB_USER." options='--client_encoding=UTF8'";
      $dbconn = pg_connect($connecionstr);
      $milliseconds = floor(microtime(true) * 1000);

      // Check connection
      if (!$dbconn) {
          die("Connection failed: " . pg_connect_error());
      }
      //Sql query
      $sqld = "SELECT username FROM userloged ORDER BY id DESC LIMIT 1";
      $result = pg_query($dbconn, $sqld) ;

      //Check results
      if ($result) {
      echo "<li style='float: right; margin-left: 10px' class='loging active'>
               <a href='./login.php'>Log out</a>
          </li>";
      } else {
          echo "<li style='float: right; margin-left: 10px' class='loging active'>
        <a href='./login.php'>Log in</a>
      </li>
  ";
          die('Query failed: ' . pg_last_error());
      }
      //Close connection
      pg_close($dbconn);
  ?>