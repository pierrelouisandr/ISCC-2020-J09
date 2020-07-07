<form action= "fichier admin.php" method= "POST" enctype= "multipart/form-data">
<input type="file" accept= "image/png, image/jpeg, image/png" name= "fichier">
<input type="text" name = "titre">
<input type="text" name = "description">
<input type="submit" name = "submit">
</form>

<?php
if ($_FILES['fichier']['size'] > 2097152) {
    echo "Le fichier est trop volumineux";
    $uploadOK = 0;
}

if  ($_FILES['fichier']['name']);
$longueur = strlen($_FILES['fichier']['name']);

if ($longueur < 4){
    echo "Le nom du fichier n'est pas assez volumineux";
}

session_start ();
$_SESSION ['description'] = $_POST ['description'];
$_SESSION ['titre'] = $_POST ['titre'];
echo "<p>" . $_SESSION ['description'] . "</p>";
echo "<p>" . $_SESSION ['titre'] . "</p>";

move_uploaded_file ($_FILES ['tmp_name'],"./" .$_FILES['fichier']['name']);

$_SESSION ['image'] = $_FILES['fichier']['name'];

?>