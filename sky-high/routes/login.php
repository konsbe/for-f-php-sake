<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles.css" />
    <title>Contact</title>
  </head>
  <body>
    <ul class="navbar">
      <li><a href="./dashboard.php">Dashboard</a></li>
      <li><a href="../sky-high.php">Home</a></li>
      <li><a href="./destinations.php">Destinations</a></li>
      <li><a href="./information.php">CRUD Informations</a></li>
      <li><a href="./personal-data.php">Book A Flight</a></li>
      
  <?php
      require_once '../env.php';
      //Open Connection
     include("../components/navbar.php")
  ?>
      <li style="float: right">
        <a href="./contact.php">Contact</a>
      </li>
    </ul>

    <div class="container" style="margin-top: 3rem">
      <form method="post" action="../api/apiLoginUser.php">
        <div style="display: flex; flex-direction: column; align-items: center">
          <div>
            <label for="fname">User email</label>
          </div>
          <div>
            <input
              type="text"
              id="umail"
              name="useremail"
              placeholder="example@email.com"
              style="
                width: 19rem;
                height: 2.3rem;
                border: 1px solid black;
                border-radius: 3px;
              "
            />
          </div>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center">
          <div style="justify-content: center">
            <label for="lname">Password</label>
          </div>
          <div>
            <input
              type="password"
              id="upass"
              name="userpassword"
              placeholder=" Secret.."
              style="
                width: 19rem;
                height: 2.3rem;
                border: 0.8px solid black;
                border-radius: 3px;
              "
            />
          </div>
        </div>
        <br />
        <div style="display: flex; flex-direction: column; align-items: center">
          <input
            name="mybtn"
            id="mybtn"
            type="submit"
            value="Submit"
            style="
              width: 19rem;
              height: 2.3rem;
              border: 0.8px solid black;
              border-radius: 3px;
            "
          />
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
