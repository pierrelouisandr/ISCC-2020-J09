<form action="index.php?page=4" method="post" enctype="multipart/form-data">
    <input type="file" accept="image/png, image/jpg, image/jpeg" name="file" required>
    <input type="text" name="title" placeholder="Titre">
    <input type="text" name="desc" placeholder="Description">
    <input type="submit" name="submit" value="Upload">
</form>
<?php
if (empty($_FILES['file']))
    echo("<p>En attente de fichier</p>");
else {
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $destination = "./";

    if (strlen(substr($filename, 0, (strrpos($filename, ".")))) < 4)
        echo("<p>Erreur dans le fichier: valeur ['name']</p>");
    elseif ($filesize > 2097152)
        echo("<p>Erreur dans le fichier: valeur ['size']</p>");
    else {
        if (!empty($_POST['title']))
            $_SESSION['title'] = $_POST['title'];
        if (!empty($_POST['desc']))
            $_SESSION['desc'] = $_POST['desc'];
        $_SESSION['image'] = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $_SESSION['image']);
        header("Location: index.php?page=1");
    }
}
?>