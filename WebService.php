<?php
namespace WvpnClient;

class WebService
{
    public static function getServiceClient( $service, $config = null )
    {
        $factory = Factory::getInstance( $config );
        return $client = $factory->getServiceClient($service);
    }
}
