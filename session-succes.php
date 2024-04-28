<?php 
    require_once "Session.php";
    $session = new Session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Session</h1>
    <p>
        Selamat Datang <?php echo $session->login_user; ?>
    </p>

    <form action="" method="POST">
        <input type="submit" name="logout" value="LOGOUT">
    </form>
</body>
</html>