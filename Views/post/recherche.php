<script>
    window.onload = function() {
        // Initialise Isotope container gauche
        if ($('.wrapper .card').length) {
        var $grid = $('.wrapper').isotope({
            itemSelector: '.card',
            layoutMode: 'masonry',
            masonry: { columnWidth: 200},
            getSortData: {
                elected: function(itemElem) {
                    var $item = $(itemElem);
                    return ($item.hasClass('selected') ? -1 : 1);
                }
            },
            sortBy: 'selected'
        });
        // Force Isotope à recalculer le layout
        $grid.isotope('layout');
    }

    // Initialise Isotop container de droite
var $gridRight = $('.wrapper-right').isotope({
    itemSelector: '.card',
    getSortData: {
        selected: function(itemElem) {
            var $item = $(itemElem);
            return ($item.hasClass('selected') ? -1 : 1);
        }
    },
    sortBy: 'selected'
});
// Force Isotope à recalculer le layout
$gridRight.isotope('layout');

        // Fonction de filtrage avec debounce
        var filterItems = debounce(function() {
            var searchValue = $('#pseudoSearch').val().toLowerCase();

            // Filtre basé sur le texte du titre de la carte
            $grid.isotope({
                filter: function() {
                    var cardTitle = $(this).find('.card-title').text().toLowerCase();
                    return cardTitle.includes(searchValue);
                }
            });

            // Force la mise en page après le filtrage
            $grid.isotope('layout');

            // Faire de même pour le conteneur de droite
            $gridRight.isotope({
                filter: function() {
                    var cardTitle = $(this).find('.card-title').text().toLowerCase();
                    return cardTitle.includes(searchValue);
                }
            });
            
            // Forcer le redimensionnement de la fenêtre
            window.dispatchEvent(new Event('resize')); 
        }, 300);

        // Écouter les changements dans la barre de recherche
        $('#pseudoSearch').on('input', filterItems);


        // debounce pour éviter un filtrage à chaque milliseconde
        function debounce(fn, threshold) {
            var timeout;
            return function debounced() {
                if (timeout) {
                    clearTimeout(timeout);
                }
                function delayed() {
                    fn();
                    timeout = null;
                }
                timeout = setTimeout(delayed, threshold || 100);
            }
        }
    }
</script>