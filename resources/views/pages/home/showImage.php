<?php

$db = new MySQLi('localhost', 'root', 'losmillos', 'DEvent');

if ($db->connect_errno) {
    echo 'Connection to database failed: '. $db->connect_error;
    exit();
}

if (isset($_GET['id'])) {

$id = $db->real_escape_string($_GET['id']);

$query = "SELECT `foto` FROM evento WHERE `idEvento` = '$id'";

$result = $db->query($query);

while($row = mysqli_fetch_array($result)) {
    $imageData = $row['foto'];
    header("Content-type:image/jpeg");
    echo $imageData;
}
echo '<img src="showImage.php?id=' . htmlspecialchars($_GET["id"]) . '"border ="0" height="250" width="250" />';
}
?>
