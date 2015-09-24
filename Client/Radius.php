<?php
namespace WvpnClient\Client;

class Radius extends Base
{
   private function getAccountUriPrefix(){
       return 'account';
   }

   // AccountDataVerfy( $data )
   // Account
   public function createAccount( $user, array $data )
   {
       $data = ['json' => $data];
       return $this->post( $this->getAccountUriPrefix().'/'.$user, $data );
   }

   public function getAccount( $user )
   {
      return $this->get( $this->getAccountUriPrefix().'/'.$user );
   }

   // Get All account
   public function getAccounts( $user )
   {
      return $this->get( $this->getAccountUriPrefix() );
   }

   public function updateAccount( $user, array $data )
   {
       $data = ['json' => $data];
       return $this->put( $this->getAccountUriPrefix().'/'.$user, $data );
   }

   public function deleteAccount( $user )
   {
       return $this->delete( $this->getAccountUriPrefix().'/'.$user );
   }

   public function test( $user )
   {
       return $this->get( 'apple' );
   }

   /*$request = $client->post('http://httpbin.org/post', array(), array(
           'custom_field' => 'my custom value',
               'file_field'   => '@/path/to/file.xml'
           ));*/

   /*$r = $client->put('http://httpbin.org/put', [
    'json' => ['foo' => 'bar']
    ]);*/

}

?>
