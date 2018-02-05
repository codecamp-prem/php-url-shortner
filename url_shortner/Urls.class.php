<?php
class Urls
{
	protected static $_connection = NULL;

	function __construct(){
		if(is_null(self::$_connection)){
		    self::$_connection = new mysqli("localhost","root","admin","db_short_urls");
		}
	}

	function test_connection(){
		if(!is_null(self::$_connection)){
		   echo 'connected';
		}
	}
	// Adding a URL
	protected function addShort(){
		$query = self::$_connection->prepare("INSERT INTO `urls` (`url`, `ip`) VALUES (?, ?)");
		$query->bind_param('ss', $link, $this->userIP);
		$query->execute();
		return $query->insert_id;
	}
	// Getting a URL
	protected function getShort($id){
		$query = self::$_connection->prepare("SELECT `url` FROM `urls` WHERE `id` = ?");
		$query->bind_param('i', $id);
		$query->execute();
		$query->bind_result($url);
		$query->fetch();
		return $url;
	}
	// Storing a hit
	protected function addHit($linkId){
		$query = self::$_connection->prepare("INSERT INTO `hits` (`url`, `ip`) VALUES (?, ?)");
		$query->bind_param('is', $linkId, $this->userIP);
		$query->execute();
		return TRUE;
	}
	
	// a method that will convert from an ID to a nice string, and one that will convert back.
	protected static function numToAlpha($num){
	    $return = "";
	    $alpha = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-_";
	    $n = floor($num/strlen($alpha));
	    if($n > 0)
	        $return .= numToAlpha($n);
	    $return .= $alpha[$num % strlen($alpha)];
	    return $return;
	}

	protected static function alphaToNum($s){
	    $alpha = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-_";
	    $return = 0;
	    $i = strlen($s);
	    $s = strrev($s);
	    while(isset($s[--$i])){
	        $return += strpos($alpha, $s[$i]) * pow(strlen($alpha), $i);
	    }
	    return $return;
	}

	protected function userIP(){
        $header = array_change_key_case(getallheaders(), CASE_LOWER);

        if (!empty($header['x-forwarded-for']))
        {
            $ip = $header['x-forwarded-for'];

            if (is_array($ip))
            {
                $ip = $ip[0];
            }

            if (strpos($ip, ',') !== false)
            {
                $ip = explode(',', $ip);
                $ip = $ip[0];
            }

            if (strlen($ip) > 15 && !empty($header['cf-pseudo-ipv4']))
            {
                $ip = $header['cf-pseudo-ipv4'];

                if (is_array($ip))
                {
                    $ip = $ip[0];
                }

                if (strpos($ip, ',') !== false)
                {
                    $ip = explode(',', $ip);
                    $ip = $ip[0];
                }
            }

            return $ip;
        }

        $ip = $_SERVER['REMOTE_ADDR'];

        return $ip;
    }

    protected static function get_url_protocol(){
		// To find out if url contains HTTPS or HTTP
		$isHttps = false;
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
		    $isHttps = true;
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
		    $isHttps = true;
		}
		$current_url_protocol = $isHttps ? 'https://' : 'http://';
		return $current_url_protocol;
	}
}