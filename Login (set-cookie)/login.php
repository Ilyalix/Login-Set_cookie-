<?php

$phone = $_GET["PHONE"];
$email = $_GET["EMAIL"];
$Token = $_GET["Token"];

$link = mysqli_connect('localhost','root','12345','test') or die('error connect: ' . mysqli_error());
//подключение к серверу
echo "OK connect";

mysqli_select_db($link,'test') or die('Не удалось выбрать базу данных');
//выбор базы данных

$query = "SELECT * FROM logininfo where Email like '%".$email."%'";

$result = mysqli_query($link,$query) or die('Запрос не удался: ');

$row = mysqli_fetch_array($result);



if ($row[2] == $phone) {

	$query2 = "UPDATE logininfo set Token='.$Token.' WHERE Email like '%".$email."%'";

	$result2 = mysqli_query($link,$query2) or die('Запрос не удался: ');

	echo "True";
}else {
	echo "false";
}
mysqli_close($link);
?>