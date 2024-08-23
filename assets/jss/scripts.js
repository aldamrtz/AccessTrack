// Fungsi untuk menampilkan atau menyembunyikan bagian form
function showFormPart(value) {
	console.log("Dropdown value: " + value); // Untuk debugging
	document.getElementById("formMahasiswa").style.display =
		value === "Mahasiswa" ? "block" : "none";
	document.getElementById("formDosen").style.display =
		value === "Dosen" ? "block" : "none";
}

