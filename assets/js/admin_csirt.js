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