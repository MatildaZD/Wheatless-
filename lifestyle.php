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
          echo "<link href='restaurant.css' rel='stylesheet' type='text/css' />";
          echo "<img src='wheatlessheader.png' alt='header' id='logo'>";
          echo "<br>";
    
$query = "SELECT name FROM gfamArticles WHERE type = 'Lifestyle'";
$result = $db->query($query);
// Loop through the result set and store the data in an array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Encode the data in JSON format
$json_data = json_encode($data);
$datas = json_decode($json_data, true);
$items = array();
foreach ($datas as $item) {
    // Get the value of the "item" key and remove any backslashes
    $value = str_replace('\\', '', $item['name']);
    $key = substr($value, 0, strpos($value, ':'));
    array_push($items, $value);
}
$items = json_encode($items);

    ?>
<!DOCTYPE html> 
<html>
<link href='restaurant.css' rel='stylesheet' type='text/css' />
<head>
        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LDLB94KCY8">
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());  gtag('config', 'G-LDLB94KCY8');
</script>
         <a href='https://wheatless.riverdale.edu/enter.php'>
        <button id='button'>Home</button></a>
        <br>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Search Articles</title>
      </head>
      <body> 
        <span id='enter'>Search for articles:</span>
        <form autocomplete="off" action="lifestyle.php" method="GET">
    

       <div class="autocomplete">
       <input id="myInput" type="text" name="query" placeholder="Enter Here">
        </div>
       <input type="submit" value="Search"/>
      </form>



<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var recipeLists = <?php echo $items?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), recipeLists);
</script>


</body>
</html>


    <?php

    //AFTER SEARCHING 
    $query = $_GET['query'];
    $min_length = 2;
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
    $search = true;  
    $sql = "SELECT * FROM gfamArticles WHERE type = 'Lifestyle' AND (name LIKE '%".$query."%')";
 
    $result = $db->query($sql);
    


   if ($result->num_rows > 0) {
   echo "<table class='Center' style='border-collapse: separate; border-spacing: 20px;'>";
  $rows = $result->fetch_all(MYSQLI_ASSOC);

  $num_rows = count($rows);
  for ($i = 0; $i < $num_rows; $i += 2) {
    echo "<tr>";
    for ($j = 0; $j < 2; $j++) {
        if ($i + $j < $num_rows) {
            $row = $rows[$i + $j];

            echo "<td style='border-radius: 20px; padding: 20px; background-color: #f3e1a1; text-align: center;'>" .
                 "<div style='margin-bottom: 10px;'><strong>" . $row["name"] . "</strong></div>" .
                

                 "<button class = 'buttons' id='myBtn" . ($j+1) . "'><img src = 'infobut.png' style = 'width:30px; height: 30px;'></button>".
                "<div id='myModal"  . ($j+1) . "'class='modal'>"  . 
                "<div class='modal-content'>".
          "<span class='close'>&times;</span>".
          
          "<p>
        <strong style='font-size: 30px;'>" . $row["name"] . "</strong><br><br>
         
          <a href='" . $row["link"] . "' target='_blank'>Link to Article</a><br>
          </p>".
            "</div>".
                 "</td>";
        } else {
            echo "<td></td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
}
else {
  echo "<h3>no results found, try another search</h3>";
    }
    }

    }






// BEFORE SEARCH: GENERAL PAGE ON FIRST CLICK
    if ($search == false) {
    echo "<h1>Lifestyle</h1>";    
    $db = mysqli_connect($servername, $username, $password, $dbname);
    $query = $_GET['query'];
    $sql = "SELECT * FROM gfamArticles WHERE type = 'Lifestyle'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

  echo "<table class='Center' style='border-collapse: separate; border-spacing: 20px;'>";
$rows = $result->fetch_all(MYSQLI_ASSOC);
$num_rows = count($rows);

for ($i = 0; $i < $num_rows; $i += 2) {

    echo "<tr>";
    for ($j = 0; $j < 2; $j++) {

        if ($i + $j < $num_rows) {
            $row = $rows[$i + $j];
            echo "<td style='border-radius: 20px; padding: 20px; background-color: #f3e1a1; text-align: center;'>" .
                 "<div style='margin-bottom: 10px;'><strong>" . $row["name"] . "</strong></div>" .
               
                "<button class = 'buttons' id='myBtn" . ($j+1) . "'><img src = 'infobut.png' style = 'width:30px; height: 30px;'></button>".
                "<div id='myModal"  . ($j+1) . "'class='modal'>"  . 
                "<div class='modal-content'>".
          "<span class='close'>&times;</span>".

      
          "<p>

          <strong style='font-size: 30px;'>" . $row["name"] . "</strong><br><br>
           <a href='" . $row["link"] . "' target='_blank'>Link to Article</a><br>".
            "</p>" .
            "</div>".
            "</td>";
          
               
        } else {
            echo "<td></td>";
        }
    }
    echo "</tr>";
    if ($i < $num_rows - 2) {
        echo "<tr><td colspan='2' style='height: 20px;'></td></tr>";
    }
}

echo "</table>";
  }
}
?>







<!DOCTYPE HMTL>
<script>
var count = parseInt(<?php echo count($rows) ?>);
var btn = [];
var modal = [];
for (let i = 0; i < count; i++) {
  btn[i] = document.getElementById("myBtn" + (i+1));
  modal[i] = document.getElementById("myModal" + (i+1));
  var span = modal[i].getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 
  btn[i].onclick = function() {
    modal[i].style.display = "block";
  };

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal[i].style.display = "none";
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal[i]) {
      modal[i].style.display = "none";
    }
  }
}
</script>
</html>


