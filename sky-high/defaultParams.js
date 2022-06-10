export const flight = {
  portFrom: "",
  portTo: "",
  hourFrom: "",
  hourTo: "",
  actualHourFrom: "",
  actualHourTo: "",
  status: "scheduled",
};

export const air_card = {
  name: passenger.name,
  flight: flight,
  seat: 0,
};

export const passenger = {
  id: "",
  name: "",
  phone: "",
  flights: [flight],
};

export const reservation = {
  id: "",
  passengers: [passenger],
  passengerTicketPrice: [0],
  sumPrice: 0,
};

export const ticket = {
  id: 1000000000000,
  passengerId: passenger.id,
  passengerName: passenger.name,
  passengerPhone: passenger.phone,
  passengerFlights: [passenger.flights],
};

export const airport = {
  id: "",
  name: "",
  city: "",
  timeZone: "",
};

export const aircraft = {
  id: "AWS",
  capacity: 100,
  maxDistance: 10000000,
};

export const airports = ["AUS", "TSI", "GR", "MND", "ITA", "KWPA"];
