<script>
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

    $(document).ready(function() {
    $("#pseudoSearch").on("keyup", debounce(function() {
        var value = $("#pseudoSearch").val();
    
        if (value !== undefined && value !== null) {
            value = value.toLowerCase();

            // Enlevez la classe selected de tous les éléments dans les deux conteneurs
            $grid.find('.card').removeClass('selected'); 
            $gridRight.find('.card').removeClass('selected'); 

            // Filtre les éléments de toutes les cartes
            $(".card").filter(function() {
                var cardTitle = $(this).find(".card-title");
                var match = false;
                if (cardTitle.length > 0 && cardTitle.text().trim() !== "") {
                match = cardTitle.text().toLowerCase().startsWith(value);
                }
                $(this).toggle(match);

                if (match) {
                    $(this).addClass('selected');
                }
            });

            // Réorganise de nouveaux l'ordre de tri dans les deux conteneurs
            $grid.isotope();
            $gridRight.isotope();
        }
        }, 200));
    });

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
</script>