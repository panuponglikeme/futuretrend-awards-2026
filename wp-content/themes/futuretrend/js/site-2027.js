/**
 * Version 2027: shared header/footer behaviour (loaded on every 2027 page).
 */
(function () {
    var header = document.querySelector('.hd27');
    if (!header) {
        return;
    }

    // Sticky header once the page scrolls.
    function updateSticky() {
        header.classList.toggle('is-sticky', window.scrollY > 50);
    }
    document.addEventListener('scroll', updateSticky, { passive: true });
    updateSticky();

    // Mobile menu toggle.
    var toggle = header.querySelector('.hd27__toggle');
    if (toggle) {
        toggle.addEventListener('click', function () {
            var open = toggle.getAttribute('aria-expanded') !== 'true';
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            header.classList.toggle('is-menu-open', open);
            document.documentElement.classList.toggle('hd27-no-scroll', open);
        });
    }
})();
