function BringInformation() {
  $.ajax({
    type: "POST",
    url: "../../app/controller/bringInfo.php",
    data: {
      option: 0,
    },
    async: true,
    success: function (data) {
      let info = $.parseJSON(data);

      $("#tableClient").html("");

      let divs = "";

      for (let i = 0; i < info.length; i++) {
        divs += `
          <tr>
              <td width="100"><a href="${info[i]["DIR"]}" target="_blank">${info[i]["NAME"]}</a></td>
          </tr>
          `;
      }

      $("#tableClient").html(divs);
    },
    error: function (error) {
      Console.log(`Error: ${error}`);
    },
  });
}
