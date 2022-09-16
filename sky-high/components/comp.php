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
    $sql = "select * from flights;";
    $result = pg_query($dbconn, $sql) ;
    //Check results
    if ($result) {
      // var_dump($result);
      echo "<div class='divTable' style='margin-bottom:9rem;'>";
      echo " <h4 style='margin-top:6rem;margin-bottom: 3rem;'>Next Destination</h4>";
      echo "<table id='flyghts'>";
      echo "  <tr>
        <th>Airport</th>
        <th>Flights</th>
        <th>Departure Airport</th>
        <th>Arrival Airport</th>
        <th>Aircraft code</th>
        <th>Status</th>
      </tr>";
      while ($column = pg_fetch_row($result)) {
      echo "<tr>
        <td>$column[0]</td>
        <td>$column[1]</td>
        <td>$column[4]</td>
        <td>$column[5]</td>
        <td>$column[6]</td>
        <td>$column[14]</td>
        </tr>
      ";
    }
    echo "</table>";
    echo "</div>";
  } else {
    echo "error NO data <br>";
    die('Query failed: ' . pg_last_error());
  }
  //Close connection
  pg_close($dbconn);
  ?>