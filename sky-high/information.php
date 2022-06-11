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
        <li><a href="../sky-high.html">Home</a></li>
        <li><a href="./destinations.html">Destinations</a></li>
        <li class="active"><a href="./information.php">CRUD Informations</a></li>
        <li><a href="./personal-data.php">Book A Flight</a></li>
        <li style="float:right"><a href="./contact.php">Contact</a></li>
    </ul>
    <div class="divTable">
      <h4 style="margin-top:6rem;margin-bottom: 3rem;">Εταιρείες που συνεργαζόμαστε</h4>
    <table id="flyghts">
  <tr>
    <th>ID</th>
    <th>Company</th>
    <th>Distance</th>
  </tr>
  <tr>
    <td>Air bahal</td>
    <td>GN</td>
    <td>12.000 <span style="float:right">km</span></td>
  </tr>
  <tr>
    <td>Berglunds Gapal</td>
    <td>SW</td>
    <td>12.000 <span style="float:right">km</span></td>
  </tr>
  <tr>
    <td>Centro Olympic</td>
    <td>MXC</td>
    <td>13.500 <span style="float:right">km</span></td>
  </tr>
  <tr>
    <td>Handel</td>
    <td>AUS</td>
    <td>38.000 <span style="float:right">km</span></td>
  </tr>
  <tr>
    <td>Island Travelling</td>
    <td>UK</td>
    <td>20.000 <span style="float:right">km</span></td>
  </tr>
  <tr>
    <td>Königlich</td>
    <td>GRM</td>
    <td>15.000 <span style="float:right">km</span></td>
  </tr>
  <tr>
    <td>Laughing puppets</td>
    <td>CND</td>
    <td>9.000 <span style="float:right">km</span></td>
  </tr>
  <tr>
  </tr>
</table>
</div>
<div class="divTable">
  <form onsubmit="handlesubmit()">
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
</div>
<script>
  function handlesubmit(){
    alert("Soon on SQL Exams");
  }

</script>
</body>
</html>