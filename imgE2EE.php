<html>
<head><title>Picture</title></head>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="600000000" />
        <input type="file" name="users_image"/>
        <input type="submit" text="Upload">
    </form>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$image = file_get_contents($_FILES['users_image']['tmp_name']);
	//encrypt
	$cipher = "aes-256-cbc";
	$ivlen = openssl_cipher_iv_length($cipher);
	$iv = openssl_random_pseudo_bytes($ivlen);
	$key = openssl_random_pseudo_bytes(256);
	$ciphertext = openssl_encrypt($image, $cipher, $key, $options = 0, $iv);
/*	//add to DB
$mysqli = mysqli_connect("localhost", "testu", "", "test");
$query = "INSERT INTO blobtbl(pics) VALUES (\"" . addslashes($ciphertext) . "\")";
$mysqli->query($query);
$id = mysqli_insert_id($mysqli);

//retrieve from DB
$sql = "SELECT * FROM blobtbl WHERE id = $id";
$res = $mysqli->query($sql);
$row = mysqli_fetch_assoc($res);
$newciphertext = $row['pics'];

//decrpyt and display
$img = openssl_decrypt($newciphertext, $cipher, $key, $options = 0, $iv);*/
	$img = openssl_decrypt($ciphertext, $cipher, $key, $options = 0, $iv);
	
	echo '<img src="data:image/jpeg;base64,' . base64_encode($img) . '"/>';

}
?>
</body>
</html>