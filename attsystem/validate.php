<?php

  $db = mysqli_connect("localhost","group3","12345","attsystem");

   if(isset($_POST['login'])) // check whether user submits the form
   {

        $name_b = $_POST['name'];
        $password_b = $_POST['password'];

        $name = mysqli_real_escape_string($db,$name_b); // escaping special characters
        $password = mysqli_real_escape_string($db,$password_b);

        $query = "SELECT `type` FROM `users` WHERE `name` = '$name' AND `password` = `$password` LIMIT 1 ";
        $result = mysqli_query($db, $query);

        if($result)
        {
			  $row = mysqli_fetch_assoc($result);

			$user_type = $row['type']; // you get user type here whether he's admin or login

			if ($user_type == 1) { 

				 // this use is admin
				// do stuff here or redirect to admin panel or wherever you want
			}

			elseif ($user_type == 0) {
				// this user is member
				// do stuff here or redirect wherever you want
			}

			else
			{
				// if there's some other value, simplyredirect to login page again
			}
      } // close of if($result)
     else
     {
        echo "query failed"; // redirect to login page again
      }

    }

    else
    {
        // redirect to login page again         
    }




 ?>
 
 <html>
	<form action="validate.php" method="post">
     Username: <input type="text" name="name"><br></br>
     Password: <input type="password" name="password"><br></br>
     <input type="submit" name="login" value="Login">
</form>
 
 </html>