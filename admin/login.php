<?php
	session_start();
   $username = filter_input(INPUT_POST, 'uname');
   $passwd = filter_input(INPUT_POST, 'pwd');
   if (!empty($username)) {
        if (!empty($passwd)) {
            $host="localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="Yogi";
            $db=new mysqli($host,$dbusername,$dbpassword,$dbname);
            if (mysqli_connect_error()) {
               die();
            }
            else
            {
               $sql="SELECT * FROM admins WHERE UserName='$username' AND Password='$passwd'";
               $results = mysqli_query($db, $sql);
               if (mysqli_num_rows($results) == 1) {
                 // $_SESSION['username'] = $username;
                 // $_SESSION['success'] = "You are now logged in";

			      	// if(!isset($_SESSION['logged_in'])){
			      		header('location: admin.html');
			      	// }  
               }
               else {
                  echo "eroor";  
               }
            }
            $db->close();
         }
         else
         {
            echo "password should not be empty";
            die();
         }
   }
   else
   {
      echo "username should not be empty";
      die();
   }

?>