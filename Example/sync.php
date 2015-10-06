<?php
/**
 * refer: http://guzzle3.readthedocs.org/http-client/response.html
 */
// path to composer autoloader
require '../../vendor/autoload.php';  
// path to wvpnclient autoloader
require '../Autoloader.php';


// Init wvpn webservice client
$radius = WvpnClient\WebService::getServiceClient( 'radius' );

/**
 * Create
 * Exception 201 status code
 */
$id = "wvpntest1";
$data = [ 
    "id"        => $id,
    "passwd"    => "passwdchanged",
    "status"    => "1",
    "groups"    => ["pro"]
];
try{
    echo "</br>======= Create Account =========<br/>";
    $response = $radius->createAccount( $id, $data );

    echo "Status: [{$response->getStatusCode()}], Reason: [{$response->getReasonPhrase()}]";
    var_dump($response->json());
}catch( WvpnClient\Exception\EntityAlreadyExsitException $e ){
    echo "Account already exsit ". $e->getMessage();
}
catch( GuzzleHttp\Exception\ClientException $e){
    echo "ErrorCode: [{$e->getCode()}] Message: [{$e->getMessage()}]";
}

/**
 * Get
 * Exception 200 status code
 */
try{
    echo "<br/>======= Get Account =========<br/>";
    $response = $radius->getAccount( 'wvpntest1');

    echo "Status: [{$response->getStatusCode()}], Reason: [{$response->getReasonPhrase()}]";
    var_dump($response->json());
}catch( WvpnClient\Exception\EntityNotFoundException $e ){
    echo "Account Not found ". $e->getMessage();
}
catch( GuzzleHttp\Exception\ClientException $e){
    echo "ErrorCode: [{$e->getCode()}] Message: [{$e->getMessage()}]";
}

/**
 * Update
 * Exception 200 status code
 */
$data = [
    "passwd" =>"updateOtherPassword",
    "status" =>"0"
];
try{
    echo "<br/>======= Update Account =========<br/>";
    $response = $radius->updateAccount( 'wvpntest1', $data );

    echo "Status: [{$response->getStatusCode()}], Reason: [{$response->getReasonPhrase()}]";
    var_dump($response->json());
}catch( WvpnClient\Exception\EntityNotFoundException $e ){
    echo "Account not found ". $e->getMessage();
}
catch( GuzzleHttp\Exception\ClientException $e){
    echo "ErrorCode: [{$e->getCode()}] Message: [{$e->getMessage()}]";
}

/**
 * Delete
 * Exception 204 status code
 */
try{
    echo "<br/>======= Delete Account =========<br/>";
    $response = $radius->deleteAccount( 'wvpntest1' );

    echo "Status: [{$response->getStatusCode()}], Reason: [{$response->getReasonPhrase()}]";
    var_dump($response->json());
}catch( Exception\EntityNotFoundException $e ){
    echo "Account not found ". $e->getMessage();
}
catch( GuzzleHttp\Exception\ClientException $e){
    echo "ErrorCode: [{$e->getCode()}] Message: [{$e->getMessage()}]";
}



