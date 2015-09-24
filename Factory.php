<?php
namespace WvpnClient;
require 'Autoloader.php';

class Factory 
{
    /**
     * @var Wvpnclient\Config Object
     */
    protected $config;

    /**
     * Abstract the constructor creation
     *
     * @param array $config
     * @return WvpnClient\Factory
     */
    public static function getInstance( $config = null ) 
    {
        return new Factory( new Config($config) );

        /*$client = new Client([
            'base_uri' => 'http://ws.watervpn.com/radius/account/',
            'auth' => ['watervpn', 'landmark5!'],
            'verify' => false,
            'headers' => [
                    'Accept'     => 'application/json',
                ]
        ]);
        return $client;*/
    }

    public function __construct( Config $config ) 
    {
        $this->config = $config;
    }

    /**
     * @return Wvpnclient\Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param String 
     * @return Wvpnclient\Client
     */
    public function getServiceClient( $service )
    {
        $clientConfig  = $this->config->getClientConfig();
        $serviceConfig = $this->config->getServiceConfig( $service );

        if(empty($serviceConfig) || empty($serviceConfig['url']) || empty($serviceConfig['class'])){
            throw new \Exception( "Invalid Service $service" );    
        }
        $className = $serviceConfig['class'];

        $options = [];
        $options['base_uri']    = $serviceConfig['url'];
        $options['auth']        = [ $serviceConfig['user'], $serviceConfig['passwd'] ];
        $options['verify']      = $clientConfig['ssl-verify'];
        $options['headers']     = $clientConfig['headers'];

        $instance = new $className( $options );
        /*if(!is_a($instance,'Client')) {
            throw new Exception("Invalid configuration $className is not WvpnClient\Client\Base");
        }*/
        return $instance;
                
    }

}
