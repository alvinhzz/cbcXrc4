<?php
include("crypto_RC4.php");
include("crypto_CBC.php");

$key       = $_POST['kunci'];
$plaintext;
$iv        = "A";
$file = $_FILES['inputFileEnkripsi']['tmp_name'];

$fp = fopen($file, 'rb');
$plaintext = fread($fp, filesize($file));
fclose($fp);

$time_start = microtime(true);

$cbc = new CBCencrypt($key, $plaintext, $iv);
$ciphertext1 = $cbc->Ciphertxt();

$rc4 = new rc4($key);
$ciphertext2 = $rc4->encrypt($ciphertext1);

$time_end = microtime(true);

// print_r("<pre>");
// var_dump($ciphertext1);
// print_r("<pre>");
// die;
// for ($i = 0 ; $i < strlen($ciphertext1) ; $i++) {
//     $x[$i] = ord($ciphertext1[$i]);
//     print_r($x[$i]);
//     print_r(" ");
// }
// die;

$plaintextCount = strlen($plaintext);
$ciphertextCount = strlen($ciphertext2);
$execute_time = number_format($time_end - $time_start, 4);

$file = "../downloadFile/ciphertext.txt";
$txt = fopen($file, "w") or die("Unable to open file!");
fwrite($txt, $ciphertext2);
fclose($txt);

header("location: ../v_enkripsi.php?time=".$execute_time."&plaintextCount=".$plaintextCount."&ciphertextCount=".$ciphertextCount);
?>