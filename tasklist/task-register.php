<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9fd733068b.js" crossorigin="anonymous"></script>
    <title>Task register</title>
</head>
<body>
<?php
require_once("init.php");
//validieren, sind alle felder ausgefüllt und stimmt das passwort mit passwort repeat überein
if (isset($_POST['submit'])){
    if (empty($_POST['username']) || empty($_POST['lastname']) || empty($_POST['name']) || empty($_POST['password']) || empty($_POST['password_repeat'])) {
        echo "Es fehlt ein Wert.";
    } elseif ($_POST['password'] != $_POST['password_repeat']) {
        echo "Passwörter stimmen nicht überein.";
    } else {
        //Array für's Statement
        $form = [
            ":username" => $_POST['username'],
            ":lastname" => $_POST['lastname'],
            ":name" => $_POST['name'],
            ":password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];
        //query mit prepared statement
        $statement = DB::get()->prepare("INSERT INTO user (username, lastname, name, password) VALUES (:username, :lastname, :name, :password)");
        $statement->execute($form);
    }
}
?>

    <div class='wrapper'>

        <div class='title'><h1>Register</h1></div>

        <form class="editForm" method="post" action="task-register.php">
            <label class="labelTitel"> Nachname:</label>
                <input type="text" name="lastname" placeholder="Nachname" maxlength="20">
            <br>
            <label class="labelTitel"> Vorname:</label>
                <input type="text" name="name" placeholder="Vorname" maxlength="20">
            <br>
            <label class="labelTitel"> Benutzername:</label>
                <input type="text" name="username" placeholder="Benutzername" maxlength="20">
            <br>
            <label class="labelTitel"> Passwort</label>
                <input type="password" name="password" placeholder="Passwort" maxlength="20">
            <br>
            <label class="labelTitel"> Passwort wiederholen</label>
                <input type="password" name="password_repeat" placeholder="Passwort wiederholen" maxlength="20">
            <br>
            <input class="submitBtn" type="submit" name="submit" value="senden">
            <a class='editLink' href='task-list.php'>Back to Todo list</a>
        </form>

    </div>
</body>
</html>
