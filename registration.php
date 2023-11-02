<? php
mysql_connect=("your.hostaddress.com","username","password") or
die(mysql_error());// connect your database

mysql_select_db("myself") or die(mysql_error());

//if the form has been submitted...
if(isset($_POST['submit'])){
    if(!$_POST['username'] | !$_POST['pass']){ // make  sure you didnt leave any field blank
        die("You did not complete all the required fields");
    }
    if(!get_magic_quotes_gpc()){// check if username is in use
        $_POST['username']= addSlashes($_POST['username']);
    }
    $usercheck=$_POST['username'];
    $check=mysql_query(SELECT username FROM users WHERE username='$usercheck') or
    die(mysql_error());
    $check2=mysql_num-rows($check());

    if($check2 !=0){ // if the name exists its gives an error
        die(" Sorry username '.$_POST['username].' does not exist");
    }
    if($_POST['pass'] != $_POST['pass']){ // check whether the passwords match
        die("Sorry the password do not match");

    }
    // now let us encrypt our passwords using md5 function
    $_POST['pass']=md5($_POST['pass']);
    if(!get_magic_quotes_gpc()){
        $_POST['username']=addSlashes($_POST['username']);
        $_POST['pass']=addSlashes($_POST['pass']);
    }

    //inserting into database
    $insert= INSERT INTO USERS (username,password)  VALUES('".$_POST['username']."', '".$_POST['pass']."');
    $add_member=mysql_query($insert);
}
?>
<h1>Registered</h1>
<p>Thank you for  registering - you may now <a href="login.php">login</a></p>

