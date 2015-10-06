<?php
namespace WvpnClient\Client;
use WvpnClient\Exception as Exception;

class Radius extends Base
{
   private function getAccountUriPrefix(){
       return 'account';
   }

   /**
    * Radius Account
    */
   public function createAccount( $user, array $data, $async = false )
   {
       $options = ['json' => $data];
       $options['future'] = $async;
       return $this->post( $this->getAccountUriPrefix().'/'.$user, $options );
   }

   public function getAccount( $user, $async = false )
   {
        $options['future'] = $async;
        return $this->get( $this->getAccountUriPrefix().'/'.$user, $options );
   }

   public function getAccounts( $user )
   {
        $options['future'] = $async;
        return $this->get( $this->getAccountUriPrefix(), $options );
   }

   public function updateAccount( $user, array $data, $async = false )
   {
       $options = ['json' => $data];
       $options['future'] = $async;
       return $this->put( $this->getAccountUriPrefix().'/'.$user, $options );
   }

   public function deleteAccount( $user, $async = false )
   {
       $options['future'] = $async;
       return $this->delete( $this->getAccountUriPrefix().'/'.$user, $options );
   }

   public function test( $user )
   {
       return $this->get( 'apple' );
   }


}

?>
