<!DOCTYPE HTML>  <!-- presentation/register.php  FRITUUR -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Frituur</title>
    </head>
    <body>
        <h1>Registreren</h1>
        <form action="register.php" method="POST">
            Naam:<input type="text" name="name" required><br>
            Email:<input type="email" name="email" required><br>
            Wachtwoord:<input type="password" name="password1" required><br>
            Herhaal wachtwoord:<input type="password" name="password2" required><br>
            <input type="submit"><br>
        </form>
        <a href="list.php">Lijst</a>
    </body>
</html>