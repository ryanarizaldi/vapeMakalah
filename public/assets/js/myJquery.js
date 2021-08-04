var norek = document.getElementById("norek");

norek.oninvalid = function (event) {
  event.target.setCustomValidity("Masukkan Nomor Rekening Hanya 13 Digit");
};

var kd_instansi = document.getElementById("kd_instansi");
kd_instansi.oninvalid = function (event) {
  event.target.setCustomValidity("Masukkan Nomor Kode Instansi Hanya 4 Digit");
};
