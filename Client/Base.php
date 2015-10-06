<?php
namespace WvpnClient\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Message\RequestInterface;
use WvpnClient\Exception as Exception;

Abstract class Base extends GuzzleClient
{
    /**
     * Webservice error code
     */
    const ENTITY_NOT_FOUND           = '404';
    const ENTITY_ERROR               = '420';
    const ENTITY_ALREADY_EXIST       = '421';
    const ENTITY_CREATED             = '201';

    function __construct( array $config = [] ){
        parent::__construct( $config );
    }

    /**
     * http get method
     */
    public function get($id = null, $options = [])
    {
        return $response =  parent::get( $id, $options );
    }  

    /**
     * http post method
     */
    public function post($id = null, array $options = [])
    {
        return $response =  parent::post( $id, $options );
        // check if is statusCode 201
    }  

    /**
     * http put method
     */
    public function put($id = null, array $options = [])
    {
        return $response =  parent::put( $id, $options );
    }  

    /**
     * http delete method
     */
    public function delete($id = null, array $options = [])
    {
        return $response =  parent::delete( $id, $options);
    }  

    /**
     * Override this function in the child class for specified check
     */
    protected function errorCodeCheck( $e )
    {
       $status = $e->getResponse()->getStatusCode();
       $reason = $e->getResponse()->getReasonPhrase();
       Switch( $status ){
            case self::ENTITY_NOT_FOUND:
                throw new Exception\EntityNotFoundException(__CLASS__." status: [$status], reason: [$reason] - Entity not found Exception");
                break;
            case self::ENTITY_ALREADY_EXIST:
                throw new Exception\EntityAlreadyExsitException(__CLASS__." status: [$status], reason: [$reason] - Entity already exist Exception");
                break;
       }
    }

    /**
     *  GuzzleHttp\Client send override
     */
    public function send( RequestInterface $request )
    {
        try{
            return  parent::send( $request );
        }catch( \Exception $e ){
            $this->errorCodeCheck( $e );
            throw $e;
        }

    }

}
