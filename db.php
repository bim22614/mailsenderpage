<?php


$servername = "localhost";
$username = "root";
$password = "root";

//$link = mysqli_connect("localhost", "root", "root");

$link = mysqli_connect($servername, $username, $password);

if($link){
  echo "conect";
}


header('Location: http://100.27.10.116/index.html?success=true');
$db_selected = mysqli_select_db($link, 'mails');


$var_mail = $_POST['email'];
//echo $var_mail;

$sql = "INSERT INTO mails (mail) VALUES ('$var_mail')";

mysqli_query($link, $sql);




$old_path = getcwd();
chdir('/home/ubuntu');
$output = shell_exec(`curl -X POST http://54.210.90.102:8080/job/mail/build --user bim:117799b22b54caf2127a188736a0a50d6c --data-urlencode json='{'parameter': [{"name":"mail", "value":"$var_mail"}]}'`);

chdir($old_path);
echo "<pre>$output</pre>";





?>
