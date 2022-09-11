function getPlanes() {
  return (promise = new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      resolve(this.responseText);
    };
    xhr.onerror = reject;
    xhr.open("GET", "./api/newApi.php", true);
    xhr.send();
  }));
}

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
function getCustomerId(idCard) {
  return (promise = new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      resolve(this.responseText);
    };
    xhr.onerror = reject;
    xhr.open("GET", "../api/apiGetCustomerId.php", true);
    // xhr.send();
    xhr.send("idCard=" + idCard);
  }));
}
let randomTime = async () => {
  hrs = Math.round(Math.random() * 12);
  mins = Math.round(Math.random() * 60);
  var hFormat = hrs < 10 ? "0" : "";
  var mFormat = mins < 10 ? "0" : "";
  var amPm = hrs < 12 ? "AM" : "PM";
  return String(hFormat + hrs + ":" + mFormat + mins + " " + amPm);
};
const getRandoms = async () => {
  let p = (Math.random() * 100).toFixed(2);
  let psum = (Math.random() * 1000).toFixed(2);
  let price = p > 40 ? p : psum;
  let ticketId = price * 1000 + 183 + 8888888800000;
  let reservationId = price * 1000 + 2048;
  var resultTime = await randomTime();
  var resultTimeTwo = await randomTime();
  var station = "AWS";
  let idCard = document.getElementById("idCard");
  const data = await getPlanes().then((obj) => console.log("obj  ", obj));
  const data2 = await getCustomerId(idCard.value).then((obj) =>
    console.log("obj2  ", obj)
  );
  // console.log("data: ", data);
  let priceElement = document.getElementById("myPrice");
  let ticketElement = document.getElementById("ticketId");
  let reservationIdElement = document.getElementById("reservationId");
  let hourTodElement = document.getElementById("hourTo");
  let hourFromElement = document.getElementById("hourFrom");
  ticketElement.innerHTML = ticketId;
  priceElement.innerHTML = price;
  reservationIdElement.innerHTML = reservationId;
  hourTodElement.innerHTML = resultTime;
  hourFromElement.innerHTML = resultTimeTwo;
  var form = document.getElementById("myForm");
  var elem = document.createElement("input");
  elem.setAttribute("type", "hidden");
  elem.setAttribute("name", "ticketId");
  elem.setAttribute("value", ticketId);
  form.appendChild(elem);
  var elemt = document.createElement("input");
  elemt.setAttribute("type", "hidden");
  elemt.setAttribute("name", "myPrice");
  elemt.setAttribute("value", price);
  form.appendChild(elemt);
  // midStation checking in js
  if (priceElement.innerText) {
    if (
      price == psum &&
      document.getElementById("midStationValue").children[0]
    ) {
      let midStationElement = document.getElementById("midStationValue");
      const midStqtionNode = document.createTextNode(station);
      midStationElement.replaceChild(
        midStqtionNode,
        midStationElement.childNodes[0]
      );
    } else if (
      price == psum &&
      !document.getElementById("midStationValue").children[0]
    ) {
      const node = document.createElement("div");
      document.getElementById("midStationValue").appendChild(node);
      const textnodes = document.createTextNode(station);
      node.appendChild(textnodes);
    } else if (document.getElementById("midStationValue").childNodes[0]) {
      let midStation = document.getElementById("midStationValue");
    }
  } else {
    if (price === psum) {
      document.getElementById("midStationValue").appendChild(node);
      const textnodes = document.createTextNode(station);
      node.appendChild(textnodes);
    } else if (document.getElementById("midStationValue").childNodes[0]) {
      let midStation = document.getElementById("midStationValue");
      midStation.childNodes[0].remove();
    }
  }
};

let countryTo = document.getElementById("countryTO");
let countryFrom = document.getElementById("countryFROM");
let dateTo = document.getElementById("dateTo");
let dateFrom = document.getElementById("dateFrom");
let hourTO = document.getElementById("hourFrom");
let aircraft = document.getElementById("aircraft");
let sheetCategory = document.getElementById("sheetCategory");
countryTo.addEventListener("change", getRandoms);
countryFrom.addEventListener("change", getRandoms);
dateTo.addEventListener("change", getRandoms);
dateFrom.addEventListener("change", getRandoms);
aircraft.addEventListener("change", getRandoms);
sheetCategory.addEventListener("change", getRandoms);
