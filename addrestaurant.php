    <?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $servername = "mysql.riverdale.dreamhosters.com";
    $username = "rcs_wheatless";
    $password = "Dul#0aaPYa";
    $dbname = "rcs_wheatless_db";

    $db = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";

    if (isset($_POST['register'])) {
        //Get the user info from the form
        $name = $_POST['name'];
        $name = addslashes($name);
        $address1 = $_POST['address1'];
        $address1 = addslashes($address1);
        $address2 = $_POST['address1'];
        $address2 = addslashes($address2);
        $state = $_POST['state'];
        $city = $_POST['city'];
        $zipCode = $_POST['zipCode'];
        $phone = $_POST['phone'];
        $websiteURL = $_POST['websiteURL'];
        $websiteURL = addslashes($websiteURL);
        $menuURL = $_POST['menuURL'];
        $menuURL = addslashes($menuURL);
        $description = $_POST['description'];
        $description = addslashes($description);
        $foodOfferings = $_POST['foodOfferings'];
        $glutenMenu = $_POST['glutenMenu'];
        $foodItems = $_POST['foodItems'];
        $foodItems = addslashes($foodItems);
        $fryer = $_POST['fryer'];
        $cuisine = $_POST['cuisine'];
        $cuisine = addslashes($cuisine);
        $restaurantType = $_POST['restaurantType'];
        $restaurantType = addslashes($restaurantType);
        $priceRange = $_POST['priceRange'];
        $monday = $_POST['monday'];
        $tuesday = $_POST['tuesday'];
        $wednesday = $_POST['wednesday'];
        $thursday = $_POST['thursday'];
        $friday = $_POST['friday'];
        $saturday = $_POST['saturday'];
        $sunday = $_POST['sunday'];
        $contactName = $_POST['contactName'];
        $contactEmail = $_POST['contactEmail'];
        $contactPhone = $_POST['contactPhone'];

        if ($glutenMenu == "yes") {
            $glutenMenu = 1;
        } else{
            $glutenMenu = 0;
        }

        if ($fryer == "yes") {
            $fryer = 1;
        } else{
            $fryer = 0;
        }

        // echo "name:" . $name . "address1:" . $address1 . "adress2:" . $address2  . "state:" . $state . "city:" . $city . "zipCode:" . $zipCode . "phone:" . $phone. "websiteURL:" . $websiteURL . "menuURL:" . $menuURL . "description:" . $description . "foodOfferings:" . $foodOfferings . "glutenMenu:" . $glutenMenu . "foodItems:" . $foodItems . "priceRange:" . $priceRange . "monday:" . $monday . "tuesday:" . $tuesday . "wednesday:" . $wednesday . "thursday:" . $thursday . "friday:" . $friday . "saturday:" . $saturday . "sunday:" . $sunday . "contactName:" . $contactName . "contactEmail:" . $contactEmail . "contactPhone:" . $contactPhone;
        // Registration
        // $datainsert = "INSERT INTO Demographics (firstName, lastName, graduationYear, dean) VALUES ('".$first."','".$last."',".$yog.",'".$dean);
        // echo $description;
        $datainsert = "INSERT INTO restaurants (name, address1, address2, state, city, zipCode, phone, websiteURL, menuURL, description, foodOfferings, glutenMenu, foodItems, fryer, cuisine, restaurantType, priceRange, monday, tuesday, wednesday, thursday, friday, saturday, sunday, contactName, contactEmail, contactPhone) VALUES ('".$name."','".$address1."','".$address2."','".$state."','".$city."','".$zipCode."','".$phone."','".$websiteURL."','".$menuURL."','".$description."','".$foodOfferings."','".$glutenMenu."','".$foodItems."','".$fryer."','".$cuisine."','".$restaurantType."','".$priceRange."','".$monday."','".$tuesday."','".$wednesday."','".$thursday."','".$friday."','".$saturday."','".$sunday."','".$contactName."','".$contactEmail."','".$contactPhone."')";
        $registration = mysqli_query($db, $datainsert);
        // echo $datainsert;

        if (!$registration ) {
           echo "Error";
        }
        else{
            echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
            echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
            echo "<link href='https://fonts.googleapis.com/css2?family=Poppins&display=swap' rel='stylesheet'>";
           echo "<link href='addrestaurant.css' rel='stylesheet' type='text/css' />";
           echo "<link href='addrestaurantSubmission.css' rel='stylesheet' type='text/css'/>";
           echo "<img src='wheatlessheader.png' alt='header' id='logo'>";
           echo "<h1>Thank you for your submission!</h1>";
           echo "<h2>Return To Our Homepage:</h2>";
           echo "<a href='https://wheatless.riverdale.edu'>";
           echo "<button id='button'>Home</button>";
           echo "</a>";
        }
    }
    ?>

    <!-- This should work now -->