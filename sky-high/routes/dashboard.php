<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Dashboard</title>
</head>
<body>
    <ul class="navbar">
        <li  class="active"><a href="./dashboard.php" >Dashboard</a></li>
        <li><a href="../sky-high.html">Home</a></li>
        <li><a href="./destinations.html">Destinations</a></li>
        <li><a href="./information.php">CRUD Informations</a></li>
        <li><a href="./personal-data.php">Book A Flight</a></li>
        <li style="float:right"><a href="./contact.php">Contact</a></li>
    </ul>
      <div class="divTable" style="margin-top:14rem;">
          <span>Customer Search</span>
          <hr />
      <form onsubmit="handlesubmit()" method="POST" action="../api/apiGetCustomerByEmail.php">
        <div class="row">
          <div class="col-25" >
            <label for="emailF">Search Customer By Email</label>
          </div>
          <div class="col-25">
            <input type="text" id="emailF" name="emailF" placeholder="Enter email..">
          </div>
          <div class="col-25">
          </div>
          <div class="col-25">
            <input style="width:100%;float:right;margin:auto;" type="submit" value="Submit" >
          </div>
        </div>
      </form>
    </div>
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
      $sql = " SELECT * FROM passengers;";
      $result = pg_query($dbconn, $sql) ;
      //Check results
      if ($result) {
        $seconds = $milliseconds / 1000;
        $toDate = date("d/m/Y H:i:s", $seconds);
        // var_dump($result);
        echo "<div class='divTable'>";
        echo " <h4 style='margin-top:6rem;margin-bottom: 3rem;'>Οι πελάτες μας</h4>";
        echo "<table id='flyghts'>";
        echo "  <tr>
          <th>Serial</th>
          <th>Id card</th>
          <th>Name</th>
          <th>Phone</th>
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
          <td>$column[5]</td>
          <td>$toDate</td>
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

    $dbconn = pg_connect($connecionstr);
    $milliseconds = floor(microtime(true) * 1000);

    // Check connection
    if (!$dbconn) {
      die("Connection failed: " . pg_connect_error());
    }
    //Sql query
    $sql = " SELECT * FROM tickets;";
    $result = pg_query($dbconn, $sql) ;
    //Check results
    if ($result) {
      // var_dump($result);
      echo "<div class='divTable' style='margin-bottom:9rem;'>";
      echo " <h4 style='margin-top:6rem;margin-bottom: 3rem;'>Εισητήρια</h4>";
      echo "<table id='flyghts'>";
      echo "  <tr>
        <th>Serial</th>
        <th>Ticket No</th>
        <th>Passenger Id</th>
        <th>Flights</th>
        <th>Amount</th>
        <th>Fare</th>
      </tr>";
      while ($column = pg_fetch_row($result)) {
      echo "<tr>
        <td>$column[0]</td>
        <td>$column[1]</td>
        <td>$column[2]</td>
        <td>$column[3]</td>
        <td>$column[4]</td>
        <td>$column[5]</td>
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


</body>
</html>