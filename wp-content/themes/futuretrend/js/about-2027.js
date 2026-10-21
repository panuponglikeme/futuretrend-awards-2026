/**
 * Version 2027: video popup and photo gallery (loaded on the About 2027 template only).
 * Gallery settings come from PHP as window.ftAbout2027 (inc/version-2027.php).
 */
(function ($) {
    // Video popup (magnific-popup is loaded on every page).
    if ($ && $.fn.magnificPopup) {
        $('.ab27-video').magnificPopup({ type: 'iframe' });
    }

    // Photo gallery from gallery_cat "2027", with a load more button.
    var settings = window.ftAbout2027;
    var list = document.querySelector('[data-ab27-photos]');
    var more = document.querySelector('[data-ab27-photos-more]');
    if (!settings || !list || !settings.galleryCat) {
        return;
    }

    var shown = 0;

    function load(count) {
        var url = settings.restUrl + '?order=desc&per_page=' + count + '&gallery_cat=' + settings.galleryCat;
        if (more) {
            more.disabled = true;
        }

        fetch(url)
            .then(function (response) { return response.json(); })
            .then(function (items) {
                var ul = document.createElement('ul');
                items.forEach(function (item) {
                    if (!item.gall_thumbnail_img_url) {
                        return;
                    }
                    var li = document.createElement('li');
                    var img = document.createElement('img');
                    img.src = item.gall_thumbnail_img_url;
                    img.alt = 'Future Trends Awards 2027 gallery';
                    img.loading = 'lazy';
                    li.appendChild(img);
                    ul.appendChild(li);
                });
                list.replaceChildren(ul);
                shown = items.length;

                if (more) {
                    more.disabled = false;
                    more.hidden = shown >= settings.total;
                }
            })
            .catch(function (error) { console.error('Gallery 2027:', error); });
    }

    if (more) {
        more.addEventListener('click', function () {
            load(shown + settings.step);
        });
    }

    load(settings.perPage);
})(window.jQuery);
