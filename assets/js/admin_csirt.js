function toggleMoreText(event, id) {
    event.preventDefault();
    var desc = document.getElementById('desc-' + id);
    var moreText = desc.querySelector('.more-text');
    var toggleLink = desc.querySelector('.toggle-more');

    if (moreText.style.display === "none") {
        moreText.style.display = "inline";
        toggleLink.textContent = "Sembunyikan";
    } else {
        moreText.style.display = "none";
        toggleLink.textContent = "Selanjutnya";
    }
}

function showModal(filePath, fileType) {
    var fileImage = document.getElementById('fileImage');
    var filePDF = document.getElementById('filePDF');
    var downloadLink = document.getElementById('downloadLink');

    // Reset tampilannya
    fileImage.style.display = 'none';
    filePDF.style.display = 'none';
    downloadLink.style.display = 'none';

    // Jika file adalah PDF, tampilkan dalam iframe
    if (fileType === 'pdf') {
        filePDF.src = filePath;
        filePDF.style.display = 'block';
    } else {
        // Jika file adalah gambar, tampilkan dalam tag img
        fileImage.src = filePath;
        fileImage.style.display = 'block';
    }

    // Tampilkan tombol unduh
    downloadLink.href = filePath;
    downloadLink.style.display = 'block';

    // Tampilkan modal
    document.getElementById('fileModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('fileModal').style.display = 'none';
}

// Tutup modal ketika mengklik di luar modal
window.onclick = function (event) {
    var modal = document.getElementById('fileModal');
    if (event.target === modal) {
