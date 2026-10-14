(function () {
    'use strict';

    var search = document.getElementById('esim-country-search');
    var tabs = document.querySelectorAll('.esim-tab');
    var cards = document.querySelectorAll('.esim-card');
    var emptyState = document.querySelector('.esim-empty');
    var activeFilter = 'popular';

    function filterCards() {
        var query = search.value.trim().toLowerCase();
        var visibleCount = 0;

        cards.forEach(function (card) {
            var matchesFilter = card.dataset.categories.split(' ').indexOf(activeFilter) !== -1;
            var matchesSearch = !query || card.dataset.name.indexOf(query) !== -1;
            var isVisible = matchesFilter && matchesSearch;

            card.hidden = !isVisible;
            if (isVisible) {
                visibleCount += 1;
            }
        });

        emptyState.hidden = visibleCount !== 0;
    }

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            activeFilter = tab.dataset.filter;
            tabs.forEach(function (item) {
                var isActive = item === tab;
                item.classList.toggle('is-active', isActive);
                item.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });
            filterCards();
        });
    });

    search.addEventListener('input', filterCards);
    filterCards();
}());