document.addEventListener('DOMContentLoaded', () => {

    const langToggle = document.getElementById('langToggle');

    // Exit safely if element doesn't exist
    if (!langToggle) return;

    let lang = localStorage.getItem('lang') || 'en';

    function updateLabel() {
        langToggle.textContent = (lang === 'en') ? 'English' : 'Français';
    }

    updateLabel();

    langToggle.addEventListener('click', function (e) {
        e.preventDefault();

        lang = (lang === 'en') ? 'fr' : 'en';
        localStorage.setItem('lang', lang);

        updateLabel();

        location.reload();
    });

});