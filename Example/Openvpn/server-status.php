
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

/**
 * get VPN server status
 * Exception 200 status code
 */
$async = false;
$response = $openvpn->fetchServerStatusJob($async);
var_dump($response->json());

/**
 * get VPN server status
 * Exception 200 status code
 */
$host = 'ca1';
$response = $openvpn->getServerStatus($host);
var_dump($response->json());
