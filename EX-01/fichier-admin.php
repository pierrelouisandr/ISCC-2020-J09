<form enctype= "multipart/form-data" action= "fichier-admin.php" method= "POST" >
<input type="file" accept= "image/png, image/jpeg, image/png" name= "fichier">
<input type="text" name = "titre">
<input type="text" name = "description">
<input type="submit" name = "submit">
</form>

<?php
if ($_FILES["fichier"]["size"] > 2097152)
header ("location : fichier-admin.php");
 echo "<p> Le fichier est trop volumineux </p>";
   

$longueur = strlen($_FILES["fichier"]["name"]);
echo $longueur;
if ($longueur < 4){
    echo "<p> Le nom du fichier n'est pas assez volumineux </p>";
}

session_start ();
($_SESSION["description"] = $_POST["description"]);
($_SESSION["titre"] = ($_POST["titre"]));
($_SESSION['image'] = ($_FILES['fichier']['name']));
echo "<p>" . ($_SESSION['description'] . "</p>");
echo "<p>" . ($_SESSION['titre'] . "</p>");

move_uploaded_file($_FILES["fichier"]['tmp_name'],"./" .($_FILES['fichier']['name']));
?>