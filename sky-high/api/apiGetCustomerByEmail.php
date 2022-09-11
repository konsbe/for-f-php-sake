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
      $sql = "SELECT * from passengers WHERE passenger_mail LIKE '".$_POST['emailF']."';";
      $result = pg_query($dbconn, $sql) ;
      //Check results
      if ($result) {
        // echo json_encode($result);
        // echo var_dump(json_encode($result));
        $seconds = $milliseconds / 1000;
        $toDate = date("d/m/Y H:i:s", $seconds);
        // var_dump($result);
           echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;top:50%;text-align: center;'>
                <p>O πελάτης που Ψαχνεις</p> <br>
                <a href='../routes/dashboard.php'>Back</a>
                </div>";
        echo "<div  class='divTable'>";
        echo "<table  style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;' id='flyghts'>";
        echo "  <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Id card</th>
          <th>@email</th>
          <th>adress</th>
          <th>Created on</th>
        </tr>";
        while ($column = pg_fetch_row($result)) {
        echo "<tr>
          <td>$column[0]</td>
          <td>$column[1]</td>
          <td>$column[2]</td>
          <td>$column[3]</td>
          <td>$column[4]</td>
          <td>$toDate</td>
          </tr>
          ";
          echo "</div>";

    } }else {
      echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;top:50%;text-align: center;'>
                <p>Δε βρέθηκε ο πελάτης που Ψαχνεις</p> <br>
                <a href='../routes/dashboard.php'>Back</a>
                </div>";
      die('Query failed: ' . pg_last_error());
    }
    //Close connection
    pg_close($dbconn);
?>