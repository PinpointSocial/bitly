<?php

class ShortenTest extends PHPUnit_Framework_TestCase {
      
   public function testShortenPass() {
      $url = 'http://www.google.com';
      $bitly = Bitly::instance();
      $short = $bitly->shorten($url);
   }

   public function testShortenInvalidCreds() {

   }


}
