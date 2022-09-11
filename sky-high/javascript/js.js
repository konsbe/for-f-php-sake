async function getCustomer() {
  const promise = new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      resolve(this.responseText);
    };
    xhr.onerror = reject;
    xhr.open("GET", "../api/apiGetCustomer.php", true);
    xhr.send();
  });
  promise().then((reps) => {
    return reps;
  });
}
async function getCustomerId() {
  return (promise = new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      resolve(this.responseText);
    };
    xhr.onerror = reject;
    xhr.open("GET", "../api/apiGetCustomerId.php", true);
    xhr.send();
  }));
}

var ENGLISH = {};
"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
  .split("")
  .forEach(function (ch) {
    ENGLISH[ch] = true;
  });

function stringIsEnglish(str) {
  var index;

  for (index = str.length - 1; index >= 0; --index) {
    if (!ENGLISH[str.substring(index, index + 1)]) {
      return false;
    }
  }
  return true;
}

export const handleSubmit = async () => {
  if (!stringIsEnglish(lname.value)) alert("english only");
  if (!stringIsEnglish(fname.value)) alert("english only");

  if (
    document.getElementById("countryTO").value ===
      document.getElementById("countryFROM").value ||
    document.getElementById("dateTo").value ===
      document.getElementById("dateFrom").value ||
    document.getElementById("dateTo").value >
      document.getElementById("dateFrom").value
  ) {
    alert("FUCK!");
  } else {
    const customerId = await getCustomer().then((obj) => {
      console.log("customerId:  ", obj);
      return obj;
    });
    console.log(
      customerId.then((obj) => {
        return obj;
      })
    );
    element = document.getElementById("myForm");
    element.setAttribute("method", "POST");
    if (customerId) {
      // alert("FUCK YOU");
      // return "../api/apiFlight.php";
      element.setAttribute("action", "../api/apiFlight.php");
      return;
    } else {
      // return "../api/apiUser.php";
      element.setAttribute("action", "../api/apiUser.php");
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
      return;
    }
  }
};
