function mainInfo() {
  $.ajax({
    type: "POST",
    url: "/apiBook.php",
    data: data,
    success: function (result) {
      console.log("success: ", result);
    },
    onerror: function (error) {
      console.log("error: ", error);
    },
  });
}
function handleSubmit() {
  // if (
  //   document.getElementById("countryTO").value ===
  //     document.getElementById("countryFROM").value ||
  //   document.getElementById("dateLeaving").value ===
  //     document.getElementById("dateReturn").value ||
  //   document.getElementById("dateLeaving").value >
  //     document.getElementById("dateReturn").value
  // ) {
  //   alert("Your Days or the Airports has wrong values!");
  // } else {
  element = document.getElementById("myForm");
  element.setAttribute("method", "POST");
  element.setAttribute("action", "./apiBook.php");
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
  // }
}
