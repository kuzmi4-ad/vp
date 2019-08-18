<?php
class request{
	private $url, $headers, $post;
	
	public function set_header($key, $row){
		$this->headers[$key]=$key.': '.$row;
	}
	public function set_post($str){
		$this->post=$str;
		$this->set_header('Content-Length', strlen($this->post));		
	}
	public function set_url($str){
		$this->url=$str;
	}		
	public function set_basic_headers($world, $cookie){
		$this->headers=array();
		$headers = array(
			'Host'=>$world.'.voyna-plemyon.ru',
			'User-Agent'=>$world.'.voyna-plemyon.ru',
			'Accept'=>'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
			'Accept-Language'=>'ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
			'Accept-Encoding'=>'gzip, deflate, br',
			'Cookie'=>$cookie,
			'Connection'=>'keep-alive',
			'Upgrade-Insecure-Requests'=>'1',
			'Content-Type'=>'application/x-www-form-urlencoded; charset=UTF-8',
		);
		
		foreach($headers as $key=>$row){
			$this->set_header($key, $row);
		}
	}
	public function send_request(){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->url);
		if($this->post){
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $this->post);
		}	
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);	
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
		$out = curl_exec($curl);	
		$response = gzinflate(substr($out,10));	
		curl_close($curl);
		return json_decode($response, true);
	}	
}

?>