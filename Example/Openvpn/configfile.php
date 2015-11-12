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
 * Create
 * Exception 201 status code
 */
$account = 'client15';
$server = 'ca3';

try{
    echo "</br>======= Get Client Config =========<br/>";
    $response = $openvpn->getClientConfig( $account, $server );

    echo "Status: [{$response->getStatusCode()}], Reason: [{$response->getReasonPhrase()}]";
    var_dump($response->json());
}catch( WvpnClient\Exception\EntityAlreadyExsitException $e ){
    echo "Account already exsit ". $e->getMessage();
}
catch( GuzzleHttp\Exception\ClientException $e){
    echo "ErrorCode: [{$e->getCode()}] Message: [{$e->getMessage()}]";
}





