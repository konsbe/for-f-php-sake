function getCustomer() {
  return (promise = new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      resolve(this.responseText);
    };
    xhr.onerror = reject;
    xhr.open("GET", "./api/apiGetCustomer.php", true);
    xhr.send();
  }));
}
function getCustomerId() {
  return (promise = new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      resolve(this.responseText);
    };
    xhr.onerror = reject;
    xhr.open("GET", "./api/apiGetCustomerId.php", true);
    xhr.send();
  }));
}
async function handleSubmit() {
  if (
    document.getElementById("countryTO").value ===
      document.getElementById("countryFROM").value ||
    document.getElementById("dateTo").value ===
      document.getElementById("dateFrom").value ||
    document.getElementById("dateTo").value >
      document.getElementById("dateFrom").value
  ) {
    alert("Your Days or the Airports has wrong values!");
  } else {
    const customerId = await getCustomerId().then((obj) => {
      return await obj;
    });
    const customer = await getCustomer().then((obj) => {
      return obj;
    });
    element = document.getElementById("myForm");
    element.setAttribute("method", "POST");
    if (customer && customerId) {
      alert(customer);
      element.setAttribute("action", "./api/apiFlight.php");
      return;
    } else {
      element.setAttribute("action", "./api/apiUser.php");
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
          dateTo.value +
          "\n" +
          "date return: " +
          dateFrom.value +
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
}
