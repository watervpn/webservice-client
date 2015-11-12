<?php
/**
 * refer: http://guzzle3.readthedocs.org/http-client/response.html
 */
// path to composer autoloader
require '../../../vendor/autoload.php';  
// path to wvpnclient autoloader
require '../../Autoloader.php';


// Init wvpn webservice client
$openvpn = WvpnClient\WebService::getServiceClient( 'openvpn' );

$time     = date("Y-m-d");
$account  = $_GET['account'];
$server   = $_GET['server'];
$filename = "{$server}_{$time}.ovpn";

$response = $openvpn->getClientConfig( $account, $server, $downloadable=true, $filename );
//var_dump($response->json());

