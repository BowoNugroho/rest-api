// let mahasiswa = {
//   nama: " bwnhyk",
//   umur: 23,
//   nip: 191110085,
//   lulus: true,
//   hobby: ["Volly", "coding"],
// };

// console.log(JSON.stringify(mahasiswa));

// let data = new XMLHttpRequest();
// data.onreadystatechange = function () {
//   if (data.readyState == 4 && data.status == 200) {
//     let mahasiswa = JSON.parse(this.responseText);
//     console.log(mahasiswa);
//   }
// };

// data.open("GET", "coba.json", true);
// data.send();

$.getJSON("coba.json", function (data) {
  console.log(data);
});
