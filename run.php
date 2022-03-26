<?php
function acakc($panjang)
{
    $karakter= 'abcdefghijklmnopqrstuvwxyz1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}

function angka($panjang)
{
    $karakter= 'abcdefghijklmnopqrstuvwxyz1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
print_r("\n[ BAKMITOPIA ACCOUNT CREATOR ]");
   $urlz = "https://namey.muffinlabs.com/name.json?count=2&type=male&with_surname=false&frequency=rare";
   $curl1 = curl_init($urlz);
   curl_setopt($curl1, CURLOPT_URL, $urlz);
   curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);

   $headersz = array(
      "Accept: application/json",
   );
   curl_setopt($curl1, CURLOPT_HTTPHEADER, $headersz);
   curl_setopt($curl1, CURLOPT_SSL_VERIFYHOST, false);
   curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, false);
   $respz = curl_exec($curl1);
   curl_close($curl1);
   $jsonz = json_decode($respz, true);


   $namadpn = $jsonz[0];
   $namablk = $jsonz[1];
   $fullname = $namadpn.' '.$namablk;
   $email = $namadpn.(rand(1, 99)).'@kitabikin.link';
   //$domen = '@1secmail.org';
   //$nohp = '8125'.(rand(1000000, 20000000));
echo "\n Nomer Hp ex(8xxxxxxxx) : ";
$nope = trim(fgets(STDIN));
print_r('[ MENCOBA MEMBUAT AKUN DENGAN NOMER '.$nope.' ]'.PHP_EOL);
$url = "https://loyalty.kawn.co.id/api/v1/register/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"account_id":2,"email":"'.$email.'","handphone":"+62'.$nope.'","name":"'.$fullname.'","password":"Gaskan123#"}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);


$url = "https://loyalty.kawn.co.id/api/v1/otp/request/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"account_id":2,"handphone":"+62'.$nope.'"}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo "[ SUKSES MENGIRIM OTP ]\n";
echo " OTP: ";
$otp = trim(fgets(STDIN));
$url = "https://loyalty.kawn.co.id/api/v1/account/phone-number/verify/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"account_id":2,"handphone":"+62'.$nope.'","token":"'.$otp.'"}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
if (strpos($resp, 'Terima Kasih!')) {
  print_r("[ SUKSES ] $nope | $email | $fullname\n[ AKUN TERSIMPAN DI acc.txt ]");
  file_put_contents('acc.txt', $fullname.'|'.$email.'|'.$nope.'|Gaskan123#'.PHP_EOL, FILE_APPEND);
} else {
   print_r("[ GAGAL MENDAFTAR ]");
}

?>
