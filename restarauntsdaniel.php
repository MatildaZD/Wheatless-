    <?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $servername = "mysql.riverdale.dreamhosters.com";
    $username = "rcs_wheatless";
    $password = "Dul#0aaPYa";
    $dbname = "rcs_wheatless_db";
    // $gmapAddress = "gmapAddress";

    $db = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
          echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
          echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
          echo "<link href='https://fonts.googleapis.com/css2?family=Poppins&display=swap' rel='stylesheet'>";
          echo "<link href='restaurant.css' rel='stylesheet' type='text/css' />";
          echo "<img src='wheatlessheader.png' alt='header' id='logo'>";
          echo "<br>"
    
    ?>
    <!-- <form action = "search.php" method="GET">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> -->
    <!DOCTYPE html> 
    <hmtl>
      <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Search Restaurants</title>
      </head>
      <body> 
        Enter a restaurant
        <form action = "restaurants.php" method="GET">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
        </form>


    <?php
    $query = $_GET['query'];
    $min_length = 2;
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

     $sql = "SELECT * FROM restaurants WHERE (name LIKE '%".$query."%')";

     $result = $db->query($sql);
    //after this, you run a sql query and get the information you need
      //$sql = "SELECT * FROM restaurants"; //give me all fields from demographics table
    if ($result->num_rows > 0) {
    echo "<table class = 'center' border = \"1\">";
    echo "<th>Name</th><th>Address 1</th><th>website</th>";
    // if there are results, show the output data of each row
    while($row = $result->fetch_assoc()) {
    
    echo "<tr>

            </td>" . 
            "<td>" . $row["name"] . "</td>". 
            "<td><a href=https://www.google.com/maps/search/?api=1&parameters&query=".urlencode($row[name]." ".$row[address1])." target='_blank'>".$row[address1]." </a></td>".
            
            "<td><a href=$row[websiteURL] target='_blank'>Website Link</a></td></tr>";

      }
        echo "</table>";
      }
    else {
      echo "<h3>no results found, try another search</h3>";
         }

     }

    }
?>

<?php
    echo "<h1>Our listed restaurants:</h1>";    
    $db = mysqli_connect($servername, $username, $password, $dbname);
    $query = $_GET['query'];
    $sql = "SELECT * FROM restaurants";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

          echo "<table class = 'center' border = \"1\">";
          echo "<th>Name</th><th>Address 1</th><th>website</th>";

     while ($row = $result->fetch_assoc()) {
            echo "<tr style='width:100%'>
            </td>" . 
            "<td>" . $row["name"] . "</td>". 
            "<td><a href=https://www.google.com/maps/search/?api=1&parameters&query=".urlencode($row[name]." ".$row[address1])." target='_blank'>".$row[address1]."</a></td>".
            
            "<td><a href=$row[websiteURL] target='_blank'>Website Link</a></td></tr>";
 


      }

        echo "</table>";

  }
?>
