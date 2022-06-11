<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Book Flight</title>
</head>
<body>
<ul class="navbar">
    <li><a href="../sky-high.html">Home</a></li>
    <li><a href="./destinations.html">Destinations</a></li>
    <li><a href="./information.php">CRUD Informations</a></li>
    <li  class="active"><a href="./personal-data.php">Book A Flight</a></li>
    <li style="float:right" class="active"><a href="./contact.html">Contact</a></li>
</ul>

<div class="container">
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
        <label for="address">Address</label>
      </div>
      <div class="col-25">
        <input type="text" id="address" name="address" placeholder="Ener your address..">
      </div>

    </div>
    <h4 style="margin-top:3rem;margin-bottom:2rem;border-bottom: 1px solid;">Book a Flight</h4>
    <div class="row">
      <div class="col-25">
        <label for="dateLeaving">Ημερομηνία Αναχώρηση</label>
      </div>
      <div class="col-25">
        <input type="date" id="dateLeaving" value="<?php echo date('Y-m-d'); ?>" name="dateLeaving" style="width:100%;padding:1.3rem; border-radius: 3px;height: 2rem; border:0.3px solid gray;">
      </div>
          <div class="col-25" style="padding-left:1rem;">
        <label for="dateReturn">Επιστοφή</label>
      </div>
      <div class="col-25">
        <input type="date" value="<?php echo date('Y-m-d'); ?>" id="dateReturn" name="dateReturn" style="width:100%;padding:1.3rem; border-radius: 3px;height: 2rem; border:0.3px solid gray;">
      </div>

    </div>
    <div class="row">
      <div class="col-25">
        <label for="personId">Χώρα Αναχώρησης</label>
      </div>
      <div class="col-25">
        <select id="countryFROM" name="countryFROM">
          <option value="australia">AUS</option>
          <option value="tsimari">TSI</option>
          <option value="greece">GR</option>
          <option value="menidi">MND</option>
          <option value="italy">ITALY</option>
          <option value="katwPatissia">KWPA</option>
        </select>
      </div>
      <div class="col-25">
        <label for="personId" style="padding-left:1rem;">Χώρα Άφιξης</label>
      </div>
      <div class="col-25">
        <select id="countryTO" name="countryTO">
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
        <label for="ticketId">Εισητήριο</label>
      </div>
      <div class="col-25">
        <div id="ticketId"></div>
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
        <label for="aircraft">Airplane</label>
      </div>
      <div class="col-25">
        <div  id="aircraft"></div>
      </div>
      <div class="col-25" style="padding-left:1rem;">
        <label for="reservationId">Reservation ID</label>
      </div>
      <div class="col-25">
        <div id="reservationId"></div>
      </div>

    </div>
    <div class="row">
      <div class="col-25">
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
function handleSubmit() {

  alert(
    "Thanks! mr: "+fname.value
    + "\n" + "phone: "+phone.value
    + "\n" + "mail: "+mail.value
    + "\n" + "idCard: " + idCard.value
    + "\n" + "address: "+address.value
    + "\n" + "country from: "+ countryFROM.value
    + "\n" + "country to: "+ countryTO.value
    + "\n" + "date leaving: "+ dateLeaving.value
    + "\n" + "date return: "+ dateReturn.value
    + "\n" + "airplane: "+ document.getElementById("aircraft").innerHTML
    + "\n" + "reservation id: "+ document.getElementById("reservationId").innerHTML
    + "\n" + "ticket id: "+ document.getElementById("ticketId").innerHTML
    + "\n" + "price: "+ document.getElementById("myPrice").children[0].innerHTML


    )
}
function handlePrint() {
  alert("Sorry :( no printer connection detected!")
}
</script>

<script type="text/javascript" src="./rndDataScript.js"></script>
</body>
</html>