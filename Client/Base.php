<?php
namespace WvpnClient\Client;

use GuzzleHttp\Client as GuzzleClient;
use WvpnClient\Exception\EntityNotFoundException;

class Base extends GuzzleClient
{
    function __construct( array $config = [] ){
        parent::__construct( $config );
    }

    /**
     * http get method
     */
    public function get( $id )
    {
        $response =  parent::get( $id );
        // check header status
        // $this->checkResponse( $response );
        return $this->getContents( $response );
    }  

    /**
     * http post method
     */
    public function post( $id, array $data )
    {
        $response =  parent::post( $id, $data );
        return $this->getContents( $response );
    }  

    /**
     * http put method
     */
    public function put( $id, array $data )
    {
        $response =  parent::put( $id, $data );
        return $this->getContents( $response );
    }  

    /**
     * http delete method
     */
    public function delete( $id )
    {
        $response =  parent::delete( $id );
        return $this->getContents( $response );
    }  

    private function checkResponse()
    {
        //GuzzleHttp\Exception\ClientException
        //get status code
        // create own exception for 404(not found), 405(id exist)
        // delete GuzzleHttp\Exception\ClientException 422 id not exist

    }

    /**
     * Get response body content and decode base on response's contentType
     */
    private function getContents( $response )
    {
        $contentBody = $response->getBody()->getContents();
        $contentType = $response->getHeader('Content-Type');
        switch( $contentType ){
            case 'application/hal+json':
                return $this->decode('json', $contentBody);
                break;
            case 'text/xml':
                return $this->decode('xml', $contentBody);
                break;
            default:
                return $this->decode('json', $contentBody);
                break;
        }
    }

    /**
     *
     */
    private function decode( $method, $content )
    {
        Switch($method){
            case 'json':
                return json_decode($content);
                break;
            case 'xml' :
                 return simplexml_load_string($content);  
                break;
        }
    }

}
