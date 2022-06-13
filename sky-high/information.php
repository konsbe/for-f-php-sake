<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Information</title>

</head>
<body>
  <ul class="navbar">
    <li><a href="./dashboard.php">Dashboard</a></li>
    <li><a href="../sky-high.html">Home</a></li>
    <li><a href="./destinations.html">Destinations</a></li>
        <li class="active"><a href="./information.php">CRUD Informations</a></li>
        <li><a href="./personal-data.php">Book A Flight</a></li>
        <li style="float:right"><a href="./contact.php">Contact</a></li>
    </ul>
</div>
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
      $sql = " SELECT * FROM airplanes;";
      $result = pg_query($dbconn, $sql) ;
      //Check results
      if ($result) {
        //
        // var_dump($result);
        echo "<div class='divTable'>";
        echo " <h4 style='margin-top:6rem;margin-bottom: 3rem;'>Εταιρείες που συνεργαζόμαστε</h4>";
        echo "<table id='flyghts'>";
        echo "  <tr>
          <th>ID</th>
          <th>Company</th>
          <th>Distance</th>
        </tr>";
        while ($row = pg_fetch_row($result)) {
        echo "<tr>
          <td>$row[0]</td>
          <td>$row[1]</td>
          <td>$row[2] <span style='float:right'>km</span></td>
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
        <div class="divTable">
          <span>CREATE NEW</span>
          <hr />
          <form onsubmit="handlesubmit()" method="POST" action="apiAircraft.php">
        <div class="row">
          <div class="col-25" >
            <label for="idPlane">Aircraft ID</label>
      </div>
      <div class="col-25">
        <input type="text" id="idPlane" name="idPlane" placeholder="Plane ID..">
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="planeCompany">Company</label>
      </div>
      <div class="col-25">
        <input type="text" id="planeCompany" name="planeCompany" placeholder="Plane Company..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="planeDistance">Distance</label>
      </div>
      <div class="col-25">
        <input type="text" id="planeDistance" name="planeDistance" placeholder="Plane Max. Distance..">
      </div>
      <div class="col-25">
        </div>
        <div class="col-25">
        <input style="width:100%;float:right;" type="submit" value="Submit" >
      </div>
    </div>

  </div>
  </form>

  <div class="divTable">
    <span>UPDATE BY ID</span>
    <hr/>
    <form onsubmit="handlesubmit()" method="POST" action="apiUpdateAircraft.php" style="margin-bottom:3rem;">
    <div class="row">
      <div class="col-25" >
        <label for="idPlaneUpdate">Aircraft ID</label>
      </div>
      <div class="col-25">
        <input type="text" id="idPlaneUpdate" name="idPlaneUpdate" placeholder="Aircraft Id to Update..">
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="planeCompanyUpdate">New Company</label>
      </div>
      <div class="col-25">
        <input type="text" id="planeCompanyUpdate" name="planeCompanyUpdate" placeholder="New Plane Name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="planeDistanceUpdate">New Distance</label>
      </div>
      <div class="col-25">
        <input type="text" id="planeDistanceUpdate" name="planeDistanceUpdate" placeholder="New Plane Max. Distance..">
      </div>
      <div class="col-25">
      </div>
      <div class="col-25">
        <input style="width:100%;float:right;background-color:blue;" type="submit" value="Update" >
      </div>
    </div>
  </form>
</div>

<div class="divTable">
  <span>DELETE BY ID</span>
  <hr/>

  <form onsubmit="handlesubmit()" method="POST" action="apiDeleteAircraft.php" style="margin-bottom:3rem;" >
    <div class="row">
      <div class="col-25">
        <label for="planeDelete">Aircraft ID</label>
    </div>
    <div class="col-25">
      <input type="text" id="planeDelete" name="planeDelete" placeholder="Id of Plane to Delete..">
    </div>
    <div class="col-25">
      </div>
      <div class="col-25">
        <input style="width:100%;float:right;background-color:red;" type="submit" value="Delete" >
      </div>
    </div>
  </form>
</div>




</div>
</div>
<script>
  function handlesubmit(){
    alert("Thanks for submited the form");
  }

</script>
</body>
</html>