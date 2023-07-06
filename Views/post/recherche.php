<script>
    $(document).ready(function() {
        // Initialise Isotope container gauche
        var $grid = $('.wrapper').isotope({
            itemSelector: '.card',
            getSortData: {
                selected: function(itemElem) {
                    var $item = $(itemElem);
                    return ($item.hasClass('selected') ? -1 : 1);
                }
            },
            sortBy: 'selected'
        });

        // Initialise Isotope container droite
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

        // Fonction de filtrage avec debounce
        var filterItems = debounce(function() {
            var searchValue = $('#pseudoSearch').val().toLowerCase();

            // Filtrer les profils
            $('.card').each(function() {
                var cardTitle = $(this).find('.card-title').text().toLowerCase();

                if (cardTitle.includes(searchValue)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Filtrer les posts
            $('.card-body').each(function() {
                var cardTitle = $(this).find('.card-title').text().toLowerCase();

                if (cardTitle.includes(searchValue)) {
                    $(this).closest('.col-md-4').show();
                } else {
                    $(this).closest('.col-md-4').hide();
                }
            });

            // Mettre à jour Isotope après le filtrage
            $grid.isotope('layout');
            $gridRight.isotope('layout');
        }, 300); // Délai de 300 ms

        // Écouter les changements dans la barre de recherche
        $('#pseudoSearch').on('input', filterItems);
    });

    // Fonction debounce pour éviter un filtrage à chaque milliseconde
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
</script>