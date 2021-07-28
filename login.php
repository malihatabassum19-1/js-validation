

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
 <body style="background-color:#55efc4;">

 	<?php 
  include 'dbinsert.php';

$usernameErr = $passwordErr = "";
$login = "";
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") 

if (empty($_POST["username"])) 
    {  
       $usernameErr = " Username is required";
       $flag = True;  
    } 

if (empty($_POST["password"])) 
    {  
       $passwordErr = " Password is required";
       $flag = True;  
    } 


if(!$flag) 
    {

    $username = input_data($_POST["username"]);
    $password = input_data($_POST["password"]); 
    $res = login($username,$password);
    if($res)
    {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
    }
    else 
    {
    echo  "Login failed";
    }
    }


  function input_data($data) 
  {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }

?>

 	<style>
   fieldset{
        text-align: center;
     } 
    form {
           text-align: middle;
            width: 90%;
            margin: 0 auto;
        }

        h1 {
            margin: 0 auto;
            color: #e67e22;
        }

        input {
            margin: 5px 0;

        }


        button {
            background-color: #e67e22;
            color: #ecf0f1;
            padding: 15px 20px; 
        }
</style>
		<h1>LOGIN </h1>
	<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		 <fieldset style="background-color:#d1d8e0;">
			<legend>Login</legend>

<label for="username">User Name:</label>
			<input type="text" name="username" id="username" >
			<span style="color: red"><?php echo $usernameErr; ?> </span><br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password" >
			<span style="color: red"><?php echo $passwordErr; ?> </span><br><br>



            <button type="submit" value="login">Login</button><br>
		</fieldset>
	</form>




</body>
</html>