<?php

abstract class Bitly_Core {
   
   protected $base_url = 'http://api.bitly.com/v3/';
   protected $login;
   protected $api_key;
   
   public static function instance($config = null, $config_type = 'default') {
      if($config == null) {
	 // Get from Kohana config
	 $config = Kohana::config('bitly')->$config_type;
      }
      // Check the config
      if(empty($config['login']) || empty($config['api_key'])){
	 throw new Bitly_Exception('Invalid Configuration Argument(s)');  
      }
      return new Bitly($config['login'], $config['api_key']);
   }

   public function __construct($login, $api_key) {
      $this->login = trim($login);
      $this->api_key = trim($api_key);
   }

   public function shorten($url) {
      $query = $this->base_url . 'shorten?login=' . $this->login . '&apiKey=' . $this->api_key . '&longUrl=' . urlencode($url) . '&format=json';
       $req = file_get_contents($query);
       $req = json_decode($req, TRUE);
       if($req['status_code'] != 200) {
	  		throw new Bitly_Exception($req['status_txt']);
       }
       return $req['data']['url'];
   }

   public function get_login() {
      return $this->login;
   }

   public function get_api_key() {
      return $this->api_key;
   }

}
