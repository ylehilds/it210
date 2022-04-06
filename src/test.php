<?php
// start session
session_start();
if (!$_SESSION['auth'] == 1) {
    // check if authentication was performed
    // else die with error
    die ("ERROR: Unauthorized access!");
} 
else {
?>
    <html>
    <head></head>
    <body>
    This is a secure page. You can only see this if $_SESSION['auth'] = 1
    </body>
    </html>
<?php
} 
?>
