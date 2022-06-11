<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Contact</title>
</head>
<body>
        <ul class="navbar">
            <li><a href="../sky-high.html">Home</a></li>
            <li><a href="./destinations.html">Destinations</a></li>
            <li><a href="./information.php">CRUD Informations</a></li>
            <li><a href="./personal-data.php">Book A Flight</a></li>
            <li style="float:right" class="active"><a href="./contact.php">Contact</a></li>
        </ul>

<div class="container" style="margin-top:3rem;">
  <form  onsubmit="myFunction().then(handleResetForm())">
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" placeholder="Your name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country">Country</label>
    </div>
    <div class="col-75">
      <select id="country" name="country">
        <option value="australia">Australia</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
        <option value="usa">GREECE</option>
        <option value="usa">ITALY</option>
        <option value="usa">SOMWHERE ELSE</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Subject</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
    </div>
  </div>
  <br>
  <div class="row">
    <input  name="mybtn" id="mybtn" type="submit" value="Submit">
  </div>
  </form>
</div>
<script>
function handleResetForm() {
  document.getElementById("myForm").reset();
}
function myFunction() {
  alert("Thanks for sumbiting the form!");
}
</script>
</body>
</html>