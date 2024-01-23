
<!-- // class dbconnection
// spost user -> user object aanmaken -> class user extends login 
//      - functie die de user opzoekt in database. -> row count. -> doorgaan naar pw verify of naar onjuist.

// spost ww -> ww object aanmaken -> class password extends login
//         - password verify, na user verify.
// 
// als beide goed vul in in login functie voor class login.
//  voeruit-> login(username, password); -> welkom -->

<html>
<body>
<header>
    <h1>Login</h1>
  </header>
<form action="action.php" method="post">
<label for="name">Gebruikersnaam:</label><br>
<input type="text" name="name"><br>
<label for="ww">Wachtwoord:</label><br>
<input type="password" name="ww"><br>
<input type="submit">
</form>
<header>
    <h1>Sign Up</h1>
  </header>
<form action="chaterror.php" method="post">
<label for="name">Voornaam:</label><br>
<input type="text" name="naam"><br>
<label for="name">Achternaam:</label><br>
<input type="text" name="achternaam"><br>
<label for="name">Kies een Gebruikersnaam:</label><br>
<input type="text" name="gebruikersnaam"><br>
<label for="ww">Kies een Wachtwoord:</label><br>
<input type="password" name="wachtwoord"><br>
<input type="submit">
</form>
</body>
</html>