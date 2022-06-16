// import { ticket } from "../defaultParams";
// function mainInfo(passengerId, passengerPhone, passengerName) {
//   return (promise = new Promise(function (resolve, reject) {
//     var xhr = new XMLHttpRequest();
//     xhr.send = function () {
//       resolve(this.responseText);
//     };
//     xhr.onerror = reject;
//     xhr.open("POST", "./api/apiBook.php", true);
//     xhr.send();
//   }));
// $.ajax({
//   type: "POST",
//   url: "/api/apiBook.php",
//   data: { passengerId, passengerPhone, passengerName },
//   success: function (result) {
//     console.log("success: ", result);
//   },
//   onerror: function (error) {
//     console.log("error: ", error);
//   },
// });
// }
// async function readid(passengerId, passengerPhone, passengerName) {
//   var xmlhttp = new XMLHttpRequest();
//   xmlhttp.open("POST", "./api/apiBook.php", true);
//   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//   xmlhttp.onreadystatechange = function () {
//     if (this.readyState === 4 || this.status === 200) {
//       console.log(this.responseText); // echo from php
//     } else {
//       console.log("error: ", this.responseText); // echo from php
//     }
//   };
//   xmlhttp.send(
//     "passengerId=" +
//       passengerId +
//       "passengerPhone=" +
//       passengerPhone +
//       "passengerName" +
//       passengerName
//   );
// }
async function handleSubmit() {
  if (
    document.getElementById("countryTO").value ===
      document.getElementById("countryFROM").value ||
    document.getElementById("dateLeaving").value ===
      document.getElementById("dateReturn").value ||
    document.getElementById("dateLeaving").value >
      document.getElementById("dateReturn").value
  ) {
    alert("Your Days or the Airports has wrong values!");
  } else {
    element = document.getElementById("myForm");
    element.setAttribute("method", "POST");
    element.setAttribute("action", "./api/apiBook.php");
    console.log(ticketElement);
    alert(
      "Thanks! mr: " +
        fname.value +
        "\n" +
        "phone: " +
        phone.value +
        "\n" +
        "mail: " +
        mail.value +
        "\n" +
        "idCard: " +
        idCard.value +
        "\n" +
        "useruserAddress: " +
        userAddress.value +
        "\n" +
        "country from: " +
        countryFROM.value +
        "\n" +
        "country to: " +
        countryTO.value +
        "\n" +
        "date leaving: " +
        dateLeaving.value +
        "\n" +
        "date return: " +
        dateReturn.value +
        "\n" +
        "airplane: " +
        document.getElementById("aircraft").innerHTML +
        "\n" +
        "reservation id: " +
        document.getElementById("reservationId").innerHTML +
        "\n" +
        "ticket id: " +
        document.getElementById("ticketId").innerHTML +
        "\n" +
        "price: " +
        document.getElementById("myPrice").children[0].innerHTML
    );
  }
}
