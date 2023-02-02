<?php


$servername = "localhost";
$username = "root";
$password = "root";

//$link = mysqli_connect("localhost", "root", "root");

$link = mysqli_connect($servername, $username, $password);

if($link){
  echo "conect";
}


header('Location: http://34.207.221.63/index.html?success=true');
$db_selected = mysqli_select_db($link, 'mails');


$var_mail = $_POST['email'];
//echo $var_mail;

$sql = "INSERT INTO mails (mail) VALUES ('$var_mail')";

mysqli_query($link, $sql);




//$old_path = getcwd();
//chdir('/home/bim');
//$output = shell_exec(`curl -X POST http://192.168.1.103:8080/job/test3/build --user bim:116c5035514b90032549c76e7a9bf09204 --data-urlencode json='{'parameter': [{"name":"mail", "value":"$var_mail"}]}'`);

//chdir($old_path);
//echo "<pre>$output</pre>";





?>
