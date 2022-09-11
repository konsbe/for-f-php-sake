<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Book Flight</title>
</head>
<body>
<ul class="navbar">
    <li><a href="./dashboard.php">Dashboard</a></li>
    <li><a href="../sky-high.html">Home</a></li>
    <li><a href="./destinations.html">Destinations</a></li>
    <li><a href="./information.php">CRUD Informations</a></li>
    <li  class="active"><a href="./personal-data.php">Book A Flight</a></li>
    <li style="float:right" class="active"><a href="./contact.php">Contact</a></li>


</ul>

<div class="container"style="margin-bottom:5rem;margin-top:5rem;" >
  <h4 style="margin-top:3rem;margin-bottom:2rem;border-bottom: 1px solid;">Personal Informations</h4>
  <form id="myForm" >
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-25">
        <input type="text" id="fname" name="firstname" placeholder="Your First name..">
      </div>
      <div class="col-25" style="padding-left:1rem;">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-25">
      <input type="text" id="lname" name="lastName" placeholder="Your Last name..">
    </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone">Phone</label>
      </div>
      <div class="col-25">
        <input type="text" id="phone" name="phone" placeholder="Enter your phone..">
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="idCard">ID Card</label>
      </div>
      <div class="col-25">
        <input type="text" id="idCard" name="idCard" placeholder="Your Id Card name..">
      </div>

    </div>
    <div class="row">
      <div class="col-25">
        <label for="mail">Email</label>
      </div>
      <div class="col-25">
        <input type="email" style="width:100%;padding:0.6rem;" id="mail" name="mail" placeholder="example@email.com..">
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="userAddress">Personal Address</label>
      </div>
      <div class="col-25">
        <input type="text" id="userAddress" name="userAddress" placeholder="Ener your address..">
      </div>

    </div>
    <h4 style="margin-top:3rem;margin-bottom:2rem;border-bottom: 1px solid;">Book a Flight</h4>
    <div class="row">
      <div class="col-25">
        <label for="dateTo">Ημερομηνία Αναχώρηση</label>
      </div>
      <div class="col-25">
        <input type="date" id="dateTo" value="<?php echo date('Y-m-d'); ?>" name="dateTo" style="width:100%;padding:1.3rem; border-radius: 3px;height: 2rem; border:0.3px solid gray;">
      </div>
          <div class="col-25" style="padding-left:1rem;">
        <label for="dateFrom">Επιστοφή</label>
      </div>
      <div class="col-25">
        <input type="date" value="<?php echo date('Y-m-d'); ?>" id="dateFrom" name="dateFrom" style="width:100%;padding:1.3rem; border-radius: 3px;height: 2rem; border:0.3px solid gray;">
      </div>
        <div class="row">
      <div class="col-25">
        <label for="hourTo">Ώρα Αναχώρηση</label>
      </div>
      <div class="col-25">
        <div id="hourTo"></div>
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="hourFrom">Ώρα Επιστροφής</label>
      </div>
      <div class="col-25">
        <div id="hourFrom"></div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="personId">Χώρα Αναχώρησης</label>
      </div>
      <div class="col-25">
        <select id="countryFROM" name="countryFROM" >
          <option value="australia">AUS</option>
          <option value="tsimari">TSI</option>
          <option value="greece">GR</option>
          <option value="menidi">MND</option>
          <option value="italy">ITALY</option>
          <option value="katwPatissia">KWPA</option>
        </select>
      </div>
      <div class="col-25">
        <label for="personId" style="padding-left:1rem;" >Χώρα Άφιξης</label>
      </div>
      <div class="col-25">
        <select id="countryTO" name="countryTO" >
          <option value="australia">AUS</option>
          <option value="tsimari">TSI</option>
          <option value="greece">GR</option>
          <option value="menidi">MND</option>
          <option value="italy">ITALY</option>
          <option value="katwPatissia">KWPA</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="personId">Κατηγορία</label>
      </div>
      <div class="col-25">
        <select id="sheetCategory" name="sheetCategory" >
          <option value="economy">Economy</option>
          <option value="business">Business</option>
          <option value="firt class">First Class</option>
        </select>
      </div>
      <div class="col-25">
      </div>
      <div class="col-25">
      </div>
    </div>
        <div class="row">
      <div class="col-25" >
        <label></label>
      </div>
      <div class="col-25">
        <div ></div>
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="midStationValue">Mid Station</label>
      </div>
        <div class="col-25">
        <div id="midStationValue"></div>
        </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="aircraft">Airplane</label>
      </div>
      <div class="col-25">
        <select id="aircraft" name="aircraft" >
      <?php
      function phpfunction() {
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
      $sql = "select plane_name from  airplanes;";
      $result = pg_query($dbconn, $sql) ;
      //Check results
      if ($result) {
        // var_dump($result);
        while ($row = pg_fetch_row($result)) {
        echo "<option value='$row[0]'>$row[0]</option>";
        }
      } else {
        echo "Oops:Error! <br>";
        die('Query failed: ' . pg_last_error());
      }
      //Close connection
      pg_close($dbconn);
    }
    phpfunction();
    ?>
      </select>
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="timeZone">Time Zone</label>
      </div>
      <div class="col-25">
        <div id="timeZone"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="ticketId">Εισητήριο</label>
      </div>
      <div class="col-25">
        <div id="ticketId"></div>
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="reservationId">Reservation ID</label>
      </div>
      <div class="col-25">
        <div id="reservationId"></div>
      </div>

    </div>
    <div class="row">
      <div class="col-25" >
        <label></label>
      </div>
      <div class="col-25">
        <div ></div>
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="myPrice">Price</label>
      </div>
      <div class="col-25">
        <div id="myPrice"></div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="row" style="float:right;margin-bottom: 3rem;">
        <div class="col-25" style="margin-right:0.9rem;">
          <button  value="Print" onclick="handlePrint()" class="printButton myButton">Print</button>
        </div>
        <div class="col-25" style="margin-left:1.3rem;margin-right: 0.9rem;">
          <input  type="submit" value="Submit" onclick="handleSubmit()" >
        </div>
        <div class="col-25">
          <button  value="Clear" onclick="handleResetForm()" class="clearButton myButton">Clear</button>
        </div>
      </div>
    </div>


  </form>
</div>
<script>
function handleResetForm() {
  document.getElementById("myForm").reset();
}

function handlePrint() {
  alert("Sorry :( no printer connection detected!")
}
// $(document).ready(function(){
//    $("#myForm").on("submit", function () {
//         var hvalue = $('.mine').text();
//         $(this).append("<input type='hidden' name='ticketId' value=' " + document.getElementById("ticketId").value + " '/>");
//         $(this).append("<input type='hidden' name='myPrice' value=' " + document.getElementById("myPrice").value + " '/>");
//     });
// });
</script>

<script type="text/javascript" src="../javascript/rndDataScript.js"></script>
<script type="text/javascript" src="../javascript/js.js"></script>

</body>
</html>