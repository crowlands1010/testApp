<!DOCTYPE HTML>  
<html>
   <head>
      <script>
         function favoriteColors() {
           favorite = document.forms[0].colors.value;
           alert("Your favorite color is " + favorite);
         }
		 funtion 
      </script>
   </head>
   <body>
      <?php
         // define variables and set to empty values
         $nameErr = $turtlesErr = $colorsErr = "";
         $name = $turtles = $colors = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
           if (empty($_POST["name"])) {
         	$nameErr = " ";
           } else {
         	$name = test_input($_POST["name"]);
         	// check if name only contains letters and whitespace
         	if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
         	  $nameErr = "Only letters and white space allowed";
         	}
           }
         
           if (empty($_POST["colors"])) {
         	$colorsErr = " ";
           } else {
         	$colors = test_input($_POST["colors"]);
           }
         
           if (empty($_POST["turtles"])) {
         	$turtlesErr = " ";
           } else {
         	$turtles = test_input($_POST["turtles"]);
           }
         
         if($name !=''&& $name !=''&& $colors !=''&& $turtles !='')
           {
            header("Location:test_form.php");
           }
         }
         
         function test_input($data) 
         {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
         }
         ?>
      <h2>PHP Form Validation Example</h2>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         Name: <input type="text" name="name" value="<?php echo $name;?>">
         <br><br>
         Do you like turtles?
         <input type="radio" name="turtles" <?php if (isset($turtles) && $turtles=="yes") echo "checked";?> value="Yes">Yes
         <input type="radio" name="turtles" <?php if (isset($turtles) && $turtles=="no") echo "checked";?> value="No">No
         <br><br>
         Choose your favorite color:
         <select id="colors" onchange="favoriteColors()">
            <option value="blank">
            </option>
            <option value="Red">Red</option>
            <option value="Orange">Orange</option>
            <option value="Yellow">Yellow</option>
            <option value="Green">Green</option>
            <option value="Blue">Blue</option>
            <option value="Indigo">Indigo</option>
            <option value="Violet">Violet</option>
         </select>
		 <br><br>
         <input type="submit" value="Submit" onClick="myFunction()" /> 
      </form>
      <?php
         echo "<h2>Your Input:</h2>";
         echo $name;         
         echo "<br>";
         echo $turtles;
		 echo "<br>";
		 echo $colors;
         ?>
   </body>
</html>


</style>
</head>


<?php
   echo "<BR><BR>"; //ADDED FOR SPACING

   include_once("global_functions.php");

   $sql = "SELECT top 100 emp_id, name_last, name_first from employee_master";
      
   $sql_rs=adodb_webapps_Database_connection($sql, $db, "secmn2"); //changed name for proprietary reasons
   
   if (!$sql_rs)
      trigger_error("SQL error has occurred", E_USER_ERROR);

echo "<h2>Employee Table</h2> \n";
   if($sql_rs->RecordCount() > 0){
      while (!$sql_rs->EOF){
        $emp_id = $sql_rs->fields["emp_id"]
			and $name_first = $sql_rs->fields["name_first"]
			and $name_last = $sql_rs->fields["name_last"];        
		
		//echo $emp_id."<BR>";
		//echo $name_first."<BR>";
		//echo $name_last."<BR>";
				   
	echo "<table border =\"1\" style='border-collapse: separate' width='30%'>";
	for ($row=1; $row <= 1; $row++) { 
		echo "<tr> \n";		
				for ($col=1; $col <= 1; $col++) { 
		   $p = $col * $row;
		   echo "<td width='20%'>$emp_id</td> \n";
		   echo "<td width='40%'>$name_first</td> \n";
		   echo "<td width='40%'>$name_last</td> \n";
		   	}
	  	    echo "</tr>";
		}
		echo "</table>";
        
        $sql_rs->Movenext();  //***MAKE SURE THIS IS HERE --WILL LOCK SERVER UP
      }

   }
?>



