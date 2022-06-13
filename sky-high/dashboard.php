<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
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
        <?php
      require_once 'env.php';
      //Open Connection
      $connecionstr="host=".DB_SERVER." port=5432 dbname=".DB_BASE." password=".DB_PASS." user=".DB_USER." options='--client_encoding=UTF8'";
      $dbconn = pg_connect($connecionstr);
      $milliseconds = floor(microtime(true) * 1000);

      // Check connection
      if (!$dbconn) {
        die("Connection failed: " . pg_connect_error());
      }
      //Sql query
      $sql = " SELECT * FROM customers;";
      $result = pg_query($dbconn, $sql) ;
      //Check results
      if ($result) {
        $seconds = $mil / 1000;
        $toDate = date("d/m/Y H:i:s", $seconds);
        // var_dump($result);
        echo "<div class='divTable'>";
        echo " <h4 style='margin-top:6rem;margin-bottom: 3rem;'>Οι πελάτες μας</h4>";
        echo "<table id='flyghts'>";
        echo "  <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Id card</th>
          <th>@email</th>
          <th>adress</th>
          <th>Created on</th>
        </tr>";
        while ($row = pg_fetch_row($result)) {
        echo "<tr>
          <td>$row[0]</td>
          <td>$row[1]</td>
          <td>$row[2]</td>
          <td>$row[3]</td>
          <td>$row[4]</td>
          <td>$toDate</td>
          </tr>
        ";
      }
      echo "</table>";
      echo "</div>";
    } else {
      echo "αποθηκευση NOT οκ <br>";
      die('Query failed: ' . pg_last_error());
    }
    //Close connection
    pg_close($dbconn);
    ?>


</body>
</html>