

<!DOCTYPE html>
<html lang="en">
<head>
	<!--Sachin Ramesh IT1613560-->
	<title>User Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php	
		if(isset($_POST['submit']))
		{
    		ob_end_clean(); 
    
    
    		if($_POST['user_name'] =="admin" && $_POST['user_pswd'] =="123") //loggin user
    		{
				
				session_start();//Create session in  browser

				
				$sessionID = session_id(); //Setting and storing session ID
			
				
				if(empty($_SESSION['key']))
				{
					$_SESSION['key']=bin2hex(random_bytes(32));
				}
			
				$token = hash_hmac('sha256',$sessionID,$_SESSION['key']);//generate CSRF token

				//Setting 2 cookies
				setcookie("session_id_ass2",$sessionID,time()+3600,"/","localhost",false,true); //cookie terminates after 1 hour - HTTP only flag
    			setcookie("csrf_token",$token,time()+3600,"/","localhost",false,true); //csrf token cookie

				

				echo '<form  method="POST" action="server.php">
						<span>
							Comment
						</span>

						<div>
							<input  type="text" name="user_name"  placeholder="your name">
					
						</div>

						<div>
							<button type="submit" name="submit">
								submit
							</button>
						</div>

						<div class="spacing"><input type="hidden" id="csToken" name="CSR" value="'.$token.'"/></div>
						
					</form>';



				
    		}
    		else
    		{
				header( "Location:other/errorlogin.html" );
    		}

		}


?>

</body>
</html>
