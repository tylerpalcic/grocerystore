<!DOCTYPE html>
<html>
  <head>    
    <title>home page - password_hash example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
  </head>  
  
  <?php    
    require_once("includes/open_db.php"); 
    session_start();     
  ?>
  
  <body>      
    <main>
      
      <?php      
         if (isset($_SESSION['current_user'])){ 
           echo "<form action='login_files/logout.php' method='post'>";
           echo "<input type='submit' name='logout' value='logout'>";
           echo "</form>";
         }
        else {
          echo "<form action='login_files/login_start.php' method='post'>";
          echo "<input type='submit' value='Login/create account'>";
          echo "</form>";
         }    
      ?> 
      
    </main>  
  </body>
</html>


