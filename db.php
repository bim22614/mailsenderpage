<?php


$servername = "localhost";
$username = "rinsert";
$password = "root";

//$link = mysqli_connect("localhost", "rinsert", "root");

$link = mysqli_connect($servername, $username, $password);

if($link){
  echo "conect";
}


header('Location: http://mail.bim-cv.live/index.html?success=true');
$db_selected = mysqli_select_db($link, 'mails');


$var_mail = $_POST['email'];
$var_ip = $_POST['ip'];
$var_mask = $_POST['mask'];
//echo $var_mail;

$sql = "INSERT INTO mails (mail) VALUES ('$var_mail')";

mysqli_query($link, $sql);




$old_path = getcwd();
chdir('/home/ubuntu');
$output = shell_exec(`curl -X POST http://52.204.141.215:8080/job/mail/build --user bim:117799b22b54caf2127a188736a0a50d6c --data-urlencode json='{'parameter': [{"name":"mail", "value":"$var_mail"}, {"name":"ip", "value":"$var_ip"}, {"name":"mask", "value":"$var_mask"}]}'`);

chdir($old_path);
echo "<pre>$output</pre>";





?>
