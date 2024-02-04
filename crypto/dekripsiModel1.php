<?php
include "crypto_CBC.php";
include "crypto_RC4.php";

$key = $_POST['kunci'];
$ciphertext;
$iv        = "A";
$file = $_FILES['inputFileDekripsi']['tmp_name'];
$fp = fopen($file, 'rb');
                  
// while (! feof($fp)) {
//     $ciphertext = fgets($fp);
// }
$ciphertext = fread($fp, filesize($file));
fclose($fp);


$time_start = microtime(true);

$rc4 =  new rc4($key);
$plaintext2 = $rc4->decrypt($ciphertext);

$cbc = new CBCdecrypt($key, $plaintext2, $iv);
$plaintext = $cbc->Plaintext();

$time_end = microtime(true);

// print_r("<pre>");
// var_dump($plaintext2);
// print_r("<pre>");

// for ($i = 0 ; $i < strlen($plaintext2) ; $i++) {
//     $x[$i] = ord($plaintext2[$i]);
//     print_r($x[$i]);
//     print_r(" ");
// }
// die;

$ciphertextCount = strlen($ciphertext);
$execute_time = number_format($time_end-$time_start, 4);
$plaintextCount = strlen($plaintext);

$file = "../downloadFile/plaintext.txt";
$txt = fopen($file, "w") or die("Unable to open file!");
fwrite($txt, $plaintext);
fclose($txt);

header("location: ../v_dekripsi.php?time=".$execute_time."&plaintextCount=".$plaintextCount."&ciphertextCount=".$ciphertextCount);
?>