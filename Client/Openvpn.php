<?php
namespace WvpnClient\Client;
use WvpnClient\Exception as Exception;

class Openvpn extends Base
{
   /*private function getAccountUriPrefix(){
       return 'account';
   }*/

   /**
    * Openvpn 
    */
   public function getClientConfig( $account, $server, $downloadable = false, $filename = 'wpvn.opvn',  $async = false )
   {
        $data = ['account' => $account, 'server' => $server];
        $options = ['json' => $data];
        $options['future'] = $async;

        $response = $this->post( 'getClientConfig', $options );
        if( !$downloadable ){
            return $response;
        }
        else{
            $response = $response->json();
            $file = $response['config'];
            //header ( "Content-Type: text/plain" );
            header ( "Content-Type: application/ovpn" );
            header ('Content-Disposition: attachment; filename="' . $filename . '"');
            echo $file;
        }
   }

   public function getClientParams( $account, $async = false )
   {
        /*$options['future'] = $async;
        return $this->get( 'getClientParams', $options );*/
   }

   public function setClientParams( $account, $params, $async = false )
   {
        /*$options['future'] = $async;
        return $this->post( 'setClientParams', $options );
        return $this->get( $this->getAccountUriPrefix().'/'.$user, $options );*/
   }

   public function test( $user )
   {
       return $this->get( 'apple' );
   }


}

?>
