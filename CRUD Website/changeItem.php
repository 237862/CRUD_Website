<HTML>
    <HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")	//Check it is coming from a form
    {
        require_once 'login.php';				//mysql credentials

	    //delcare PHP variables
	    $studentID = $_POST["studentID"];
	    $lastName = $_POST["lastName"];			//The values in the $_POST must match the names given from the HTML document
	    $sportName = $_POST["sportName"];
	    $age = $_POST["age"];
	    
        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
        if ($mysqli->connect_error) 
            {
		        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	        }   
        if ($_POST['lastName']!= "")
            {
                
	
		$statement = $mysqli->prepare("UPDATE student SET studentName= ?, class=?, year=? WHERE studentID = ?"); //prepare sql insert query - thank you(https://stackoverflow.com/questions/6514649/php-mysql-bind-param-how-to-prepare-statement-for-update-query)
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('ssss', $lastName, $sportName, $age, $studentID); //bind value
		if($statement->execute())
			{
				//print output text
				echo nl2br("You have updated "." ". $lastName . "'s information to;\r\n Class " . $sportName." ". $age ."th year.", false);
			}
			else{
					print $mysqli->error; //show mysql error if any 
				}
                
            }
        echo"Hi";
    }
echo"<br><form action= 'update.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form></body>";
?>