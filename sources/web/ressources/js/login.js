var domain = "http://localhost/GPEA/sources/web/";
$(document).ready(function () {

    $("#submit").click(function (e) {
        e.preventDefault();

        $.post(
            domain + 'controller/controller_login.php', {
                username: $("#username").val(),
                password: $("#password").val()
            },

            function (data) {
                if (data.trim() == "Success") {
                    $("#resultat").html("<div class='alert alert-success' role='alert'>Vous avez été connecté avec succès !</div>");
                    location.reload();
                } else {
                    $("#password").val("");
                    $("#resultat").html("<div class='alert alert-warning' role='alert'>Erreur lors de la connexion</div>");
                }

            },
            'text'
        );
    });
});