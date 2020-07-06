<?php
    session_start();

if ($_POST["user_password"] == "2020") {
    $_SESSION["id"] = $_POST["user_login"];
    setcookie("id", $_SESSION["id"]);
    header("Location: mini-site-routing.php?page=1");
}
else {
    ?>
    <p>Mauvais couple identifiant / mot de passe.</p>
    <a href= "mini-site-routing.php?page=connexion" > lien de connexion </a>
    <?php
}
?>

