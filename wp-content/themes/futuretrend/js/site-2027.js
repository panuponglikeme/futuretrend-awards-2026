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

    // Mobile menu: the button toggles it (icon swaps to a cross via CSS); a click outside the menu or Escape closes it.
    var toggle = header.querySelector('.hd27__toggle');
    var nav = header.querySelector('.hd27__nav');
    if (toggle && nav) {
        var setMenuOpen = function (open) {
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            header.classList.toggle('is-menu-open', open);
            document.documentElement.classList.toggle('hd27-no-scroll', open);
        };
        var isMenuOpen = function () {
            return header.classList.contains('is-menu-open');
        };

        toggle.addEventListener('click', function () {
            setMenuOpen(!isMenuOpen());
        });
        document.addEventListener('click', function (event) {
            if (isMenuOpen() && !nav.contains(event.target) && !toggle.contains(event.target)) {
                setMenuOpen(false);
            }
        });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && isMenuOpen()) {
                setMenuOpen(false);
                toggle.focus();
            }
        });
    }

    // Year switcher dropdown.
    var yearToggle = header.querySelector('.hd27__year-toggle');
    var yearList = header.querySelector('.hd27__year-list');
    if (yearToggle && yearList) {
        function setYearOpen(open) {
            yearToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            yearList.hidden = !open;
        }
        yearToggle.addEventListener('click', function () {
            setYearOpen(yearList.hidden);
        });
        document.addEventListener('click', function (event) {
            if (!yearList.hidden && !event.target.closest('.hd27__year')) {
                setYearOpen(false);
            }
        });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                setYearOpen(false);
            }
        });
    }
})();

/**
 * Fade in on scroll for elements with data-ft27-fade (delay via the --ft27-fade-delay CSS variable).
 * Elements already on screen when the page loads are left as they are.
 */
(function () {
    var items = document.querySelectorAll('[data-ft27-fade]');
    if (!items.length || !('IntersectionObserver' in window)) {
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -10% 0px' });

    var viewportHeight = window.innerHeight;
    items.forEach(function (item) {
        if (item.getBoundingClientRect().top < viewportHeight) {
            return;
        }
        item.classList.add('is-fade-pending');
        observer.observe(item);
    });
})();
