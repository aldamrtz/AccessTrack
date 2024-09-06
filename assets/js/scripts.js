// Fungsi untuk menampilkan atau menyembunyikan bagian form
function showFormPart(value) {
	console.log("Dropdown value: " + value); // Untuk debugging
	document.getElementById("formMahasiswa").style.display =
		value === "Mahasiswa" ? "block" : "none";
	document.getElementById("formDosen").style.display =
		value === "Dosen" ? "block" : "none";
}
document.addEventListener('DOMContentLoaded', function () {
	// Data Fakultas dan Jurusan
	const fakultasJurusan = {
		'Teknik (FT)': [
			'Teknik Elektro S-1',
			'Teknik Kimia S-1',
			'Teknik Sipil S-1',
			'Magister Teknik Sipil S-2',
			'Teknik Geomatika S-1'
		],
		'Teknologi Manufaktur (FTM)': [
			'Teknik Mesin S-1',
			'Teknik Industri S-1',
			'Teknik Metalurgi S-1',
			'Magister Manajemen Teknologi S-2'
		],
		'Ekonomi dan Bisnis (FEB)': [
			'Akuntansi S-1',
			'Manajemen S-1',
			'Magister Manajemen S-2'
		],
		'Ilmu Sosial dan Ilmu Politik (FISIP)': [
			'Ilmu Pemerintahan S-1',
			'Ilmu Hub. Internasional S-1',
			'Magister Hub. Internasional S-2',
			'Ilmu Hukum S-1',
			'Magister Ilmu Pemerintahan S-2'
		],
		'Sains dan Informatika (FSI)': [
			'Kimia S-1',
			'Magister Kimia S-2',
			'Teknik Informatika S-1',
			'Sistem Informasi S-1'
		],
		'Psikologi': [
			'Psikologi S-1'
		],
		'Farmasi': [
			'Farmasi S-1',
			'Profesi Apoteker',
			'Magister Farmasi S-2'
		],
		'Kedokteran': [
			'Pendidikan Dokter S-1',
			'Profesi Dokter',
			'Administrasi Rumah Sakit S-1',
			'Magister Penuaan Kulit dan Estetika S-2'
		],
		'Kedokteran Gigi': [
			'Kedokteran Gigi S-1',
			'Profesi Dokter Gigi'
		],
		'FITKES': [
			'Magister Keperawatan S-2',
			'Profesi Ners',
			'Ilmu Keperawatan S-1',
			'Keperawatan D-3',
			'Kesehatan Masyarakat S-1',
			'Teknologi Laboraturium Medis D-4',
			'Teknologi Laboraturium Medis D-3',
			'Kebidanan S-1',
			'Profesi Bidan',
			'Kebidanan D-3',
			'Magister Kesehatan Masyarakat S-2'
		]
	};

	const fakultasDropdown = document.getElementById('fakultasDropdown');
	const jurusanDropdown = document.getElementById('jurusanDropdown');
	const dropdownFakultasButton = document.getElementById('dropdownMenuButton1');
	const dropdownJurusanButton = document.getElementById('dropdownMenuButton2');

	// Populate Fakultas Dropdown
	Object.keys(fakultasJurusan).forEach(fakultasName => {
		const item = document.createElement('a');
		item.className = 'dropdown-item';
		item.href = '#';
		item.dataset.fakultas = fakultasName;
		item.textContent = fakultasName;
		fakultasDropdown.appendChild(item);
	});

	// Handle Fakultas Dropdown Selection
	fakultasDropdown.addEventListener('click', function (event) {
		const target = event.target;
		if (target.classList.contains('dropdown-item')) {
			const fakultasName = target.dataset.fakultas;
			dropdownFakultasButton.textContent = fakultasName; // Update Fakultas button text
			jurusanDropdown.innerHTML = ''; // Clear existing jurusan
			dropdownJurusanButton.textContent = 'Jurusan'; // Reset Jurusan button text

			// Populate Jurusan Dropdown based on selected Fakultas
			if (fakultasJurusan[fakultasName]) {
				fakultasJurusan[fakultasName].forEach(jurusan => {
					const item = document.createElement('a');
					item.className = 'dropdown-item';
					item.href = '#';
					item.textContent = jurusan;
					item.dataset.jurusan = jurusan;
					jurusanDropdown.appendChild(item);
				});
			}
		}
	});

	// Handle Jurusan Dropdown Selection
	jurusanDropdown.addEventListener('click', function (event) {
		const target = event.target;
		if (target.classList.contains('dropdown-item')) {
			const jurusanName = target.dataset.jurusan;
			dropdownJurusanButton.textContent = jurusanName; // Update Jurusan button text
		}
	});
});




