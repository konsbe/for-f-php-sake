let randomTime = async () => {
  hrs = Math.round(Math.random() * 12);
  mins = Math.round(Math.random() * 60);
  var hFormat = hrs < 10 ? "0" : "";
  var mFormat = mins < 10 ? "0" : "";
  var amPm = hrs < 12 ? "AM" : "PM";
  return String(hFormat + hrs + ":" + mFormat + mins + " " + amPm);
};
let func = async () => {
  return parseFloat(Math.random() * 100).toFixed(2);
};
const getRandoms = async () => {
  let p = 0;
  p = await func();
  let price = p > 40 ? p : p + 50;
  let ticketId = price * 1000 + 183 + 8888888800000;
  let airplane = ticketId - 1000 + "AWS";
  let reservationId = price * 1000 + 2048;
  var resultTime = await randomTime();
  var resultTimeTwo = await randomTime();
  console.log("random time:", resultTime);
  if (document.getElementById("myPrice").children[0]) {
    let priceElement = document.getElementById("myPrice").children[0];
    let ticketElement = document.getElementById("ticketId");
    let airplaneElement = document.getElementById("aircraft");
    let reservationIdElement = document.getElementById("reservationId");
    let hourLeavedElement = document.getElementById("hourLeave");
    let hourComingElement = document.getElementById("hourComing");
    const priceNode = document.createTextNode(price);
    const ticketNode = document.createTextNode(ticketId);
    const airplaneNode = document.createTextNode(airplane);
    const reservationIdNode = document.createTextNode(reservationId);
    const resultNode = document.createTextNode(resultTime);
    const resultNodeTwo = document.createTextNode(resultTimeTwo);
    priceElement.replaceChild(priceNode, priceElement.childNodes[0]);
    ticketElement.replaceChild(ticketNode, ticketElement.childNodes[0]);
    airplaneElement.replaceChild(airplaneNode, airplaneElement.childNodes[0]);
    hourLeavedElement.replaceChild(resultNode, hourLeavedElement.childNodes[0]);
    hourComingElement.replaceChild(
      resultNodeTwo,
      hourComingElement.childNodes[0]
    );
    reservationIdElement.replaceChild(
      reservationIdNode,
      reservationIdElement.childNodes[0]
    );
  } else {
    const node = document.createElement("div");
    const textnode = document.createTextNode(price);
    node.appendChild(textnode);
    document.getElementById("myPrice").appendChild(node);
    const textnodet = document.createTextNode(ticketId);
    node.appendChild(textnodet);
    document.getElementById("ticketId").appendChild(textnodet);
    const textnodea = document.createTextNode(airplane);
    node.appendChild(textnodea);
    document.getElementById("aircraft").appendChild(textnodea);
    const textnoder = document.createTextNode(reservationId);
    node.appendChild(textnoder);
    document.getElementById("reservationId").appendChild(textnoder);
    const textnodeht = document.createTextNode(resultTime);
    node.appendChild(textnodeht);
    document.getElementById("hourLeave").appendChild(textnodeht);
    const textnodehc = document.createTextNode(resultTimeTwo);
    node.appendChild(textnodehc);
    document.getElementById("hourComing").appendChild(textnodehc);
  }
};

let activitiesTo = document.getElementById("countryTO");
let activitiesFrom = document.getElementById("countryFROM");
let hourTO = document.getElementById("hourComing");
activitiesTo.addEventListener("change", getRandoms);
activitiesFrom.addEventListener("change", getRandoms);
