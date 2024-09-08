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
          echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
          echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
          echo "<link href='https://fonts.googleapis.com/css2?family=Poppins&display=swap' rel='stylesheet'>";
        }
        ?>
<html>
    <head>
      <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LDLB94KCY8"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}s
 gtag('js', new Date());  gtag('config', 'G-LDLB94KCY8');
</script>
        <a href='https://wheatless.riverdale.edu/enter.php'>
        <button id='Homebutton'>Home</button></a>
        <img src="wheatlessheader.png" alt="header" id="logo">
        <link rel="preconnect" href="https://fonts.googleapis.com">
  		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link href="educate.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
	 <div class="flexdo">
	 <div class="dropdown">
        <br>
          <a href="https://wheatless.riverdale.edu/basics.php" class="button-wrapper">
      <button id="button" class="inner">The Basics</button>
             </a>
             <h1>Just learning how to be Gluten Free? Find everything you need to know here. This section will give you articles regarding the basics of your new health condition and how to deal with it, what being Celiac means, and how to start off. </h1>
         <a href="https://wheatless.riverdale.edu/lifestyle.php" class="button-wrapper">
             <button id="button" class="inner">Lifestyle</button>
            </a>
            <h1>In the lifestyle section, you can learn about many different aspects of what it means to be gluten free, ranging from managing finances, traversing new relationships, and even traveling safely! </h1>
    </a>
    </div>
    <br>
<div class="scrollbox">
<div class="flexarticle">
<?php
 $db = mysqli_connect($servername, $username, $password, $dbname);
    $query = $_GET['query'];
    $sql = "SELECT * FROM gfamArticles";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
          echo "<table class = 'Center'>";
          echo "<th style='text-align:left'>" . $row["name"] . "</th>
               <th style='text-align:left'>" . $row["Lame"] . "</th>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>" .
        "<td>" . $row["name"] . "</td>" .
        "<td><a font-size:20px;' href=$row[link] target='_blank'><h3>Website</h3></a></td></tr>";
}
echo "</table>";
}
?>

</div>
</div>
</div>
</div>
    </body>
</html>
