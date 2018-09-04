<?php
session_start();
$hashedkey = '$2y$10$KoWfbXcpiSazdkt5q8vTxOQ2U40rOzAuZKKKW.kPZeq7ZGazy3AQ.';
# Create a hash for a password with hashgenerator.php; in this case, I used "test1234"
if (isset($_SESSION["verified"]) && $_SESSION["verified"]) {
  header("Location: /index.php");
  # Check if a user has been previously verified first, in order to redirect them as quickly as possible.
}

if (isset($_POST["key"])) {
  $sanitizedinput = trim($_POST["key"]);
  # Sanitized input to make it easier the enter in the password; it is very easy to strengthen these restrictions, or lessen them.
  if (password_verify($sanitizedinput, $hashedkey)) {
    $_SESSION["verified"] = true;
    $whitelist = ["/index.php"];
    # Add any other pages you wish to be accessible through the continue param.
    $nextpage = $_GET["continue"];
    if (isset($nextpage) && in_array($nextpage, $whitelist)) {
      header("Location: $nextpage");
    } else {
      header("Location: /index.php");
    }
  } else {
    $error = "That key is invalid!";
  }
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Verify to Continue</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="verification.css">
  </head>
  <body>
    <h1>Verify to Continue</h1>
    <p>Please enter in the verification key to continue.</p>
    <form action="verification.php<?php if (isset($_GET["continue"])) echo "?continue=" . htmlentities($_GET["continue"]); ?>" method="post" autocomplete="off">
      <input type="text" name="key" id="key" placeholder="Key">
      <input type="submit" value="Verify">
    </form>
<?php if (isset($error)) echo "    <p>$error</p>\n"; ?>
  </body>
</html>
