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

    // $('#profileModal').on('show.bs.modal', function(event) {
    //     var button = $(event.relatedTarget) // Bouton qui a déclenché la modal
    //     var username = button.data('username') // Récupère le nom d'utilisateur du data-* attribut

    //     // Récupère les informations de profil
    //     var profileInfo = getProfileInfo(username);

    //     var modal = $(this)
    //     modal.find('.modal-title').text('Profil de ' + username)
    //     modal.find('.modal-body').html(profileInfo)
    // })
</script>