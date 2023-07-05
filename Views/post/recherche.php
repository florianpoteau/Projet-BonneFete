<script>
    // Fonctionnement de la barre de recherche
    $(document).ready(function() {
        $("#pseudoSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".card").filter(function() {
                var cardTitle = $(this).find('.card-title').text().toLowerCase();
                var cardText = $(this).find('.card-text').text().toLowerCase();
                $(this).toggle(cardTitle.includes(value) || cardText.includes(value));
            });
        });
    });
</script>