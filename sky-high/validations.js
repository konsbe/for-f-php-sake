function handleSubmit() {
  if (
    document.getElementById("countryTO").value ===
      document.getElementById("countryFROM").value ||
    document.getElementById("hourLeave").value ===
      document.getElementById("hourComing").value
  ) {
    alert("Your Days or the Airports has wrong values!");
  } else {
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
        "address: " +
        address.value +
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