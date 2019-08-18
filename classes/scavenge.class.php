<?php
class scavenge extends vp{	
	private $cookie;
	private $log;	
	private $weight_rate;
	public function __construct($server, $security){		
		parent::__construct($server, $security);
		$this->log = new log();	
		$this->weight_rate = 1;
	}
	public function set_cookie($cookie){
		$this->cookie = $cookie;
	}
	public function set_weight($weight_rate){
		$this->weight_rate = $weight_rate;
	}
	public function get_units_weight(){
		return array(
			'light'=>(80 * $this->weight_rate),
			'spear'=>(25 * $this->weight_rate),
			'sword'=>(15 * $this->weight_rate),
			'axe'=>(10 * $this->weight_rate),
			'knight'=>(100 * $this->weight_rate),
		);
	}
	public function scavenge_cycle($village, $squad_mode, $unit_params){		
		$temp=md5(serialize(func_get_args()));
		$scavenge_time_file=TEMP_DIR.'/time_'.$temp.'.txt';
		$scavenge_time=(file_exists($scavenge_time_file)) ? (int)file_get_contents($scavenge_time_file) : 0;
		$scavenge_error_file=TEMP_DIR.'/error_'.$temp.'.txt';
		
		if(file_exists($scavenge_error_file)){
			return $this->log->report_to_file('scavenge', "ошибка запуска: $village, $squad_mode");	
		}
		
		$request = new request();
		$request->set_basic_headers($this->server, $this->cookie);
		if(time() > $scavenge_time){			
			//run scavenge
			$scavenge_units=array();
			foreach($unit_params as $name=>$count){	
				if(!$count){
					if(!empty($units[$name])) $count=$units[$name];
					else continue;
				}	
				$scavenge_units[$name]=$count;				
			}
			if(count($scavenge_units)){
				$request->set_header('Referer', 'https://'.$this->server.'.voyna-plemyon.ru/game.php?village='.$village.'&screen=place&mode=scavenge');
				$carry_max=0;
				$weight=$this->get_units_weight();
				foreach($unit_params as $key=>$row) $carry_max+=round($weight[$key]*$row);
				$post=array(
					'squad_requests'=>array(
						array(
							'village_id'=>$village,
							'candidate_squad'=>array(
								'unit_counts'=>$unit_params,
								'carry_max'=>$carry_max,
								
							),
							'option_id'=>$squad_mode,
							'use_premium'=>'false',					
						)
					)
				);
				$request->set_post(http_build_query($post));	
				$request->set_url('https://'.$this->server.'.voyna-plemyon.ru/game.php?village='.$village.'&screen=scavenge_api&ajaxaction=send_squads&h='.$this->security.'&client_time='.time());
				
				$responce=$request->send_request();			
				$return_time=$responce['villages'][$village]['options'][$squad_mode]['scavenging_squad']['return_time'];				
				if($return_time){
					file_put_contents($scavenge_time_file, $return_time);
					$report=$this->log->report_to_file('scavenge', 'Добыча ресурсов, окончание '.date('d-m-y h:i:s', $return_time));		
				} 
				else{				
					file_put_contents($scavenge_error_file, '1');
				}
			}
			else {
				return $this->log->report_to_file('scavenge', 'Добыча ресурсов, пустой массив параметров');		
			}
		}		
	}	
}