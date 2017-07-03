<?php
    date_default_timezone_set("Europe/Copenhagen");
    include 'comments.inc.php';
    include 'dbh.inc.php';  
    session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Comment section</title>
        <link rel="stylesheet" type="text/css" href="css/app.css">
    </head>
    <body>
      <?php
       echo "<form method='POST' action='".getLogin($conn)."'>
           <input type='text' name='uid'>
           <input type='password' name='pwd'>
           <button type='submit' name='loginSubmit'>Login</button>         
       </form>";
        
        echo "<form method='POST' action='".userLogout()."'>
           <button type='submit' name='logoutSubmit'>Log out</button>         
       </form>";
        
        if (isset($_SESSION['id'])) {
            echo "You are logged in !";
        } else {
            echo "You are NOT logged in !!";
        }
        ?>
       
       <br><br><br>
       
        <iframe src="https://www.youtube.com/embed/yinO3mjJLyk?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        <br><br>
        <?php
        if (isset($_SESSION['id'])) {
           echo "<form method='POST' action='".setComments($conn)."'>
           <input type='hidden' name='uid' value='".$_SESSION['id']."'>
           <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            <textarea name='message'></textarea><br>
            <button type='submit' name='commentSubmit'>Comment</button>
        </form>";
            } else {
            echo "You need to be logged in to comment !!
            <br><br>";
        }
        
        getComments($conn)
      
?>  
        
    </body>
</html>