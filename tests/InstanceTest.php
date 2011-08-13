<?php

class InstanceTest extends PHPUnit_Framework_TestCase {

   public function testKohanaConfigPass() {
      $bitly = Bitly::instance();
   }

   public function testManualConfigPass() {
      $config = array(
	    'login' => 'login',
	    'api_key' => 'api_key',
	    );
      $bitly = Bitly::instance($config);
      $this->assertEquals('login', $bitly->get_login());
      $this->assertEquals('api_key', $bitly->get_api_key());
   }

   /**
    *  @expectedException   Bitly_Exception
    */
   public function testManualConfigBlankLogin() {
      $config = array(
	    'login' => '',
	    'api_key' => 'api_key',
	    );
      $bitly = Bitly::instance($config);
   }

   /**
    *  @expectedException   Bitly_Exception
    */
   public function testManualConfigNullLogin() {
      $config = array(
	    'api_key' => 'api_key',
	    );
      $bitly = Bitly::instance($config);
   }

   /**
    *  @expectedException   Bitly_Exception
    */
   public function testManualConfigBlankAPIKey() {
      $config = array(
	    'login' => 'login',
	    'api_key' => '',
	    );
      $bitly = Bitly::instance($config);
   }

   /**
    *  @expectedException   Bitly_Exception
    */
   public function testManualConfigNullAPIKey() {
      $config = array(
	    'login' => 'login',
	    );
      $bitly = Bitly::instance($config);
   }

}
