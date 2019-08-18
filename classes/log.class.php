<?php
class log{		
	public function report_to_file($name, $desc){		
		$time=time();
		$date=date('d-y-h:i:s', $time);
		if(!file_exists(REPORTS_DIR.'/'.$name)) mkdir(REPORTS_DIR.'/'.$name);
		$filename='report_'.$date.'.txt';
		$fullname=REPORTS_DIR.'/'.$name.'/'.$filename;
		$handle = fopen($fullname, "w+");
		fwrite($handle, $desc);
		fclose($handle);
		return $fullname;		
	}
}

?>