<?php
//Sachin Ramesh IT16135680

session_start();//session start

if(isset($_POST['submit'])) //check comment was submited
{
    ob_end_clean(); 
    
    $name = $_POST['user_name'];
    sessionvalidate($_POST['CSR'],$_COOKIE['session_id_ass2']); //validates the csrf and session 

}


function sessionvalidate($user_CSRF,$user_sessionID)
{
    if($user_CSRF==$_COOKIE['csrf_token'] && $user_sessionID==session_id()) 
    {
       header( "Location:other/success.html" );
        echo'<script>alert($name)';
        apc_delete('CSRF_token');
        
    }
    else
    {
        header( "Location:other/error.html" ); 
        echo"cookie : ".$_COOKIE[csrf_token];
        echo"user : ".$user_CSRF;
    }
}

?>
