<?php
/**
 * Bitcoin ticker recorder for exchanges
* 
* @package intrd/bitcoin-tickerecorder
* @version master
* @tags bot, eggdrop, bitcoin
* @link http://github.com/intrd/bitcoin-tickerecorder
* @author intrd (Danilo Salles) - http://dann.com.br
* @copyright (CC-BY-SA-4.0) 2016, intrd
* @license Creative Commons Attribution-ShareAlike 4.0 - http://creativecommons.org/licenses/by-sa/4.0
* Dependencies: 
* - php >=5.3.0
* - intrd/php-common >=1.0.x-dev <dev-master
*** @docbloc 1.1 */

$conf["root"]=dirname(__FILE__)."/";
require_once ($conf["root"]. 'exchanges/okc/OKCoin/OKCoin.php');

$conf["data_path"]=$conf["root"]."DATA/";
if (!file_exists($conf["data_path"]."secrets.ini")) die("\r\n*** secrets.ini does no exist, request it w/ developers.\r\n");
$secrets = parse_ini_file($conf["data_path"]."secrets.ini", false);

function fwrite_a($path,$text){
  $file = fopen($path,"a");
  fwrite($file,$text);
  fclose($file);
  return true;
}

$client = new OKCoin(new OKCoin_ApiKeyAuthentication($secrets["API_KEY"], $secrets["SECRET_KEY"]));

$params = array('symbol' => 'btc_usd', 'contract_type' => 'this_week');
$result = $client -> tickerFutureApi($params);
$array = json_decode(json_encode($result), true);
$array = json_encode($array);

$buffer_file=$conf["data_path"]."buffer.json";
if(fwrite_a($buffer_file,$array."\r\n")){
	//echo "saved!";
}