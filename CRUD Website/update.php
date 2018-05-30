<HTML>
    <head></head>
    <body>
<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: template.html');
        exit;   
    }
else
    {
        echo $studentID;
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT * FROM student WHERE studentID='" . $_POST['update'] . "'";
        $result = $conn->query($sql);

        $lastName = $row[0];
        $sportName = $row[1];
        $age = $row[2];
        
        if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	        {
                while($row = $result->fetch_assoc())
		            {
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['studentName'].".";
	                    echo "<TABLE><TR><TH>lastName</TH><TH>sportName</TH><TH>age</TH></TR>";
                        echo "<TR>";
	                    echo "<TD>".$row['lastName']. "</TD><TD>". $row['sportName']. "</TD><TD>". $row['age']. "</TD></TR>";
	                    echo "<form action='changeItem.php' method = 'post'>";
	                    echo "<TR><TD><input type='text' name = lastName value=".$row['lastName']." class='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Full Name' name='lastName' class='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='sportName'>";
                        echo "<option value='Football' >Football</option>";
                        echo "<option value='Soccer' >Soccer</option>";
                        echo "<option value='Hockey' >Hockey</option>";
                        echo "<option value='Baseball' >Baseball</option>";
                        echo "<option value='Basketball' >Basketball</option>";
                        echo "</select></TD>";
                        echo "<TD><select id='select' name='age'>";
                        echo "<option value='2' >2</option>";
                        echo "<option value='3' >3</option>";
                        echo "<option value='4' >4</option>";
                        echo "<option value='5' >5</option>";
                        echo "<option value='6' >6</option>";
                        echo "<option value='7' >7</option>";
                        echo "<option value='8' >8</option>";
                        echo "<option value='9' >9</option>";
                        echo "<option value='10' >10</option>";
                        echo "<option value='11' >11</option>";
                        echo "<option value='12' >12</option>";
                        echo "<option value='13' >13</option>";
                        echo "<option value='14' >14</option>";
                        echo "<option value='15' >15</option>";
                        echo "<option value='16' >16</option>";
                        echo "<option value='17' >17</option>";
                        echo "<option value='18' >18</option>";
                        echo "</select></TD></TR></TABLE>";
                        echo "<input name = 'create' type = 'submit' value = 'Submit Changes'>";
                        echo "</form>";
	                    
	                    
                    } 
                 echo "</body>";   
	        }
    }
?>
</HTML>