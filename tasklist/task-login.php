<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9fd733068b.js" crossorigin="anonymous"></script>

    <title>Task login</title>
</head>
<body>


<?php
require_once("init.php");
//validieren, sind alle felder ausgefüllt und stimmt das passwort mit passwort repeat überein
if (isset($_POST['submit'])){
    $statement = DB::get()->prepare("SELECT * FROM user WHERE username = :username LIMIT 1 ");
    $statement->execute([":username" => $_POST['username']]);
    $statement->fetch(PDO::FETCH_ASSOC);
    //PDO::FETCH_ASSOC Ein assoziatives Array mit den Resultaten, wobei
    //der Key dem Spaltennamen in der DB entspricht

    if (empty($_POST['username']) || empty($_POST['password']) ) {
        echo "Es fehlt ein Wert.";
    } elseif (!password_verify($_POST['password'], $statement["password"])) {
        echo "Passwörter stimmen nicht überein.";
    } else {
        $username = $_POST['username'];
        $_SESSION["username"] = $username;
        redirect(task-liste.php);

    }
}
?>

    <div class='wrapper'>

        <div class='title'><h1>Sign in</div>
        <form class="editForm" method="post" action="task-list.php">
            <label class="labelTitel"> Benutzername:</label>
            <input type="text" name="username" placeholder="Benutzername" maxlength="20">
            <br>
            <label class="labelTitel"> Passwort</label>
            <input type="password" name="password" placeholder="Passwort" maxlength="20">
            <br>
            <input class="submitBtn" type="submit" name="submit" value="senden">
            <a class='editLink' href='task-list.php'>Back to Todo list</a>

        </form>

    </div>

</body>
</html>
