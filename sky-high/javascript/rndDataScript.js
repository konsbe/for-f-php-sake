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
  const data = await getPlanes().then((obj) => console.log("obj  ", obj));
  // console.log("data: ", data);
  let priceElement = document.getElementById("myPrice");
  let ticketElement = document.getElementById("ticketId");
  let reservationIdElement = document.getElementById("reservationId");
  let hourLeavedElement = document.getElementById("hourLeave");
  let hourComingElement = document.getElementById("hourComing");
  ticketElement.innerHTML = ticketId;
  priceElement.innerHTML = price;
  reservationIdElement.innerHTML = reservationId;
  hourLeavedElement.innerHTML = resultTime;
  hourComingElement.innerHTML = resultTimeTwo;
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

let activitiesTo = document.getElementById("countryTO");
let activitiesFrom = document.getElementById("countryFROM");
let activitiesdateLeaving = document.getElementById("dateLeaving");
let activitiesdateReturn = document.getElementById("dateReturn");
let hourTO = document.getElementById("hourComing");
let activitiesAircraft = document.getElementById("aircraft");
activitiesdateLeaving.addEventListener("change", getRandoms);
dateReturn.addEventListener("change", getRandoms);
activitiesTo.addEventListener("change", getRandoms);
activitiesFrom.addEventListener("change", getRandoms);
activitiesAircraft.addEventListener("change", getRandoms);
