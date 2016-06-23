<?php
require_once('bootstrap.php');
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php if($_GET['m']) { ?>
        
        <div id="messageBox">
            <h2>Message Box</h2>
            <div id="message"><?php echo $_GET['m']?></div>
        </div>
        <?php } ?>
        
        <?php if($_GET['type'] == 'r') { ?>
        
        <h2>Form New Client</h2>
        <form method="post" action="register.php">
            <div> 
                Name: <input type="text" name="name">
            </div>
            <div>
                Username: <input type="text" name="username">
            </div>
            <div>
                Password: <input type="password" name="password">
            </div>
            <div>
                Birth Date: <input type="text" name="birthdate">
            </div>
            <div>
                Phone: <input type="text" name="phone">
            </div>
            <div>
                Email: <input type="text" name="email">
            </div>
            <input type="submit">
        </form>
        
        <?php } else { ?>
        <h2>Login Form</h2>
        <form method="post" action="login.php">
           Username: <input type="text" name="username">
           Password: <input type="text" name="password">
           <input type="submit">
        </form>
        <p>
            <a href="index.php?type=r">Create a new Client</a>
        </p>
        <?php } ?>
        
    </body>    
</html>
