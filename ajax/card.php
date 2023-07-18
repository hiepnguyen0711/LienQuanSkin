<?php
//error_reporting(E_ALL^E_NOTICE);
//error_reporting(E_ERROR);


//Lấy thông tin từ Gamebank tại https://sv.gamebank.vn/user/tich-hop-the-cao
$merchant_id = '54527'; // interger
$api_user = "5b8902337c9a9"; // string
$api_password = "07acc7a523f4e79496cc69b036e76514"; // string

//Truyền dữ liệu thẻ
$pin = $_POST['pin']; // string
$seri = $_POST['seri']; // string

$price_guest = $_POST['price_guest']; // interger
$card_type = $_POST['card_type_id']; // interger
$note = $_POST['note'];


/**
 * Card_type = 1 => Viettel
 * Card_type = 2 => Mobiphone
 * Card_type = 3 => Vinaphone
 * Card_type = 4 => Gate
 * Card_type = 5 => VTC (vcoin)
 * Card_type = 6 => Vietnammobile
 * Card_type = 7 => Zing
 * Card_type = 8 => Bit
 * Card_type = 9 => Megacard
 * Card_type = 10 => Oncash
 
**/
/*
require_once '../securimage/securimage.php';
$securimage = new Securimage();

if ($securimage->check($captcha) == false) {
     echo json_encode(array('code' => 1, 'msg' => "Sai mã bảo mật"));
     exit();
}
*/
$return = cardCharging($seri,$pin,$card_type,$price_guest,$note,$merchant_id,$api_user,$api_password);

// nap the thanh cong
if($return['code'] === 0 && $return['info_card'] >= 10000) {
    echo json_encode(array('code' => 0, 'msg' => "Nạp thẻ thành công mệnh giá " .  $return['info_card']));
}
else {
    // get thong bao loi
    echo json_encode(array('code' => 1, 'msg' => $return['msg']));
}

function _isCurl()
{
	return function_exists('curl_version');
}

function cardCharging($seri,$pin,$card_type,$price_guest,$note,$merchant_id,$api_user,$api_password)
{
	if (_isCurl()) {
		$fields = array(
			'merchant_id' => $merchant_id,
			'pin' => $pin,
			'seri' => $seri,
			'price_guest' => $price_guest,
			'card_type' => $card_type,
			'note' => $note
		);
		$ch = curl_init("https://sv.gamebank.vn/api/card");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_USERPWD, $api_user . ":" . $api_password);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$result = curl_exec($ch);
		$result = json_decode($result);

		$return = array(
			'code' => $result->code,
			'msg' => $result->msg,
			'info_card' => $result->info_card,
			'transaction_id' => $result->transaction_id,
		);
		
	} else {
		//Trường hợp máy chủ chưa bật cURL
		$result =  file_get_contents("http://sv.gamebank.vn/api/card2?merchant_id=".$merchant_id."&api_user=".trim($api_user)."&api_password=".trim($api_password)."&pin=".trim($pin)."&seri=".trim($seri)."&card_type=".intval($card_type)."&price_guest=".$price_guest."&note=".urlencode($note)."");   
		$result = str_replace("\xEF\xBB\xBF",'',$result); 
		$result = json_decode($result);
		$return = array(
			'code' => $result->code,
			'msg' => $result->msg,
			'info_card' => $result->info_card,
			'transaction_id' => $result->transaction_id,
		);
	}
	return $return;
}
