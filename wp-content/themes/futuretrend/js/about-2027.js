/**
 * Version 2027: video popup and photo gallery (loaded on the About 2027 template only).
 * Gallery settings come from PHP as window.ftAbout2027 (inc/version-2027.php).
 */
(function ($) {
    // Video popup (magnific-popup is loaded on every page), as in 2026: an MP4 file or a YouTube link.
    if ($ && $.fn.magnificPopup) {
        $('.ab27-video-play').magnificPopup({
            mainClass: 'mfp-fade',
            removalDelay: 160,
            type: 'iframe',
            iframe: {
                markup: '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allow="autoplay"></iframe>' +
                    '</div>',
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                    }
                }
            }
        });
    }

    // Photo gallery from the chosen Gallery Category: the first photos, then more on each click.
    var settings = window.ftAbout2027;
    var list = document.querySelector('[data-ab27-photos]');
    var more = document.querySelector('[data-ab27-photos-more]');
    if (!settings || !list || !settings.galleryCat) {
        return;
    }

    var shown = 0;

    function load(count) {
        var url = settings.restUrl + '?order=desc&per_page=' + count + '&offset=' + shown + '&gallery_cat=' + settings.galleryCat;
        if (more) {
            more.disabled = true;
        }

        fetch(url)
            .then(function (response) { return response.json(); })
            .then(function (items) {
                items.forEach(function (item) {
                    if (!item.gall_thumbnail_img_url) {
                        return;
                    }
                    var li = document.createElement('li');
                    var img = document.createElement('img');
                    li.className = 'ab27-photo';
                    img.src = item.gall_thumbnail_img_url;
                    img.alt = 'Future Trends Awards gallery';
                    img.loading = 'lazy';
                    li.appendChild(img);
                    list.appendChild(li);
                });
                shown += items.length;

                if (more) {
                    more.disabled = false;
                    more.hidden = !items.length || shown >= settings.total;
                }
            })
            .catch(function (error) { console.error('Gallery 2027:', error); });
    }

    if (more) {
        more.addEventListener('click', function () {
            load(settings.step);
        });
    }

    load(settings.perPage);
})(window.jQuery);
