/**
 * Version 2027: award group tabs and category tabs (loaded on the Awards 2027 template only).
 * Markup: template-parts/2027/award-groups.php
 */
(function () {
    function activate(buttons, panels, value, buttonAttr, panelAttr) {
        buttons.forEach(function (button) {
            var on = button.getAttribute(buttonAttr) === value;
            button.classList.toggle('is-active', on);
            button.setAttribute('aria-selected', on ? 'true' : 'false');
        });
        panels.forEach(function (panel) {
            panel.hidden = panel.getAttribute(panelAttr) !== value;
        });
    }

    document.querySelectorAll('[data-aw27-awards]').forEach(function (root) {
        root.addEventListener('click', function (event) {
            var groupButton = event.target.closest('[data-aw27-group]');
            if (groupButton && root.contains(groupButton)) {
                var key = groupButton.getAttribute('data-aw27-group');
                activate(
                    root.querySelectorAll('[data-aw27-group]'),
                    root.querySelectorAll('[data-aw27-panel]'),
                    key,
                    'data-aw27-group',
                    'data-aw27-panel'
                );

                // On mobile the group buttons stack, so bring the chosen group's results into view.
                if (window.matchMedia('(max-width: 991px)').matches) {
                    var panel = root.querySelector('[data-aw27-panel="' + key + '"]');
                    if (panel) {
                        panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
                return;
            }

            var catButton = event.target.closest('[data-aw27-cat]');
            if (catButton && root.contains(catButton)) {
                var group = catButton.closest('[data-aw27-panel]');
                activate(
                    group.querySelectorAll('[data-aw27-cat]'),
                    group.querySelectorAll('[data-aw27-cat-panel]'),
                    catButton.getAttribute('data-aw27-cat'),
                    'data-aw27-cat',
                    'data-aw27-cat-panel'
                );
            }
        });
    });
})();
