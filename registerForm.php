<?php 
    require_once('Register.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $reg = new Register();
        $reg->register();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register Form</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="reset" name="reset" value="RESET">
                    <input type="submit" name="register" value="REGISTER">
                </td>
            </tr>
        </table>
    </form>
    <a href="loginForm.php">Login</a>
</body>
</html>