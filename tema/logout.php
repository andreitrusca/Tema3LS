<?php
// Always start this first
session_start();

// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
session_destroy();
?>

<body>

      <h2>Logout</h2>
	  Apasa pentru a te <a href = "login.php" tite = "Inapoi la pagina de Login">intoarce la pagina de login</a>.
</body>
