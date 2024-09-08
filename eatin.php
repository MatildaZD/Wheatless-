<?php
// ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $servername = "mysql.riverdale.dreamhosters.com";
    $username = "rcs_wheatless";
    $password = "Dul#0aaPYa";
    $dbname = "rcs_wheatless_db";
    // $gmapAddress = "gmapAddress";
    $search = false;
    $db = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
      echo "<img src='wheatlessheader.png' alt='header' id='logo'>";
      
    }
    ?>
<!DOCTYPE html>
<html>
<head>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LDLB94KCY8"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());  gtag('config', 'G-LDLB94KCY8');
</script>
  <a href='https://wheatless.riverdale.edu/enter.php'>
        <button id='Homebutton'>Home</button></a>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Wheatless</title>
  <link href="eatin.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <h1>What do you want to make today?</h1>
    <a href="https://wheatless.riverdale.edu/breakfast.php" class="button-wrapper">
      <button id="button" class="inner">Breakfast</button>
    </a>
    <a href="https://wheatless.riverdale.edu/snacks.php" class="button-wrapper">
     <button id="button" class="inner">Snacks</button>
    </a>
    <a href="https://wheatless.riverdale.edu/dinner.php" class="button-wrapper">
       <button id="button" class="inner">Lunch/Dinner</button>
    </a>
     <a href="https://wheatless.riverdale.edu/dessert.php" class="button-wrapper">
       <button id="button" class="inner">Dessert</button>
    </a>
</body>
</html>