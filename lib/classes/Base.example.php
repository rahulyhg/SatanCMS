<?php
abstract class Base {
	function __construct(){
		// Site information
		$this->SITE = array();
		$this->SITE['DIR'] = "Directory to root of SatanCMS"; // Replace this with your setup values
		$this->SITE['URL'] = "URL to root of SatanCMS"; // Replace this with your setup values

		// Mysql information
		$this->MYSQL = array();
		$this->MYSQL['HOST'] = ""; // Replace this with your setup values
		$this->MYSQL['USER'] = ""; // Replace this with your setup values
		$this->MYSQL['PASS'] = ""; // Replace this with your setup values
		$this->MYSQL['DATABASE'] = ""; // Replace this with your setup values

		return true;
	}

	function replaceCurly($contents,$matches){
		global $mysqli;
		foreach($matches[0] as $match){
			$key = strtolower($match);
			$results = $mysqli->query("SELECT conf_value FROM config WHERE conf_key = '{$key}' LIMIT 1");
			if(!$results) {
			    throw new Exception("Database Error [{$mysqli->errno}] {$mysqli->error}");
			}
			$i = 0;
			while($row = $results->fetch_assoc()){ ++$i;
				$contents = str_replace("{{".$match."}}",$row["conf_value"],$contents);
			}
			if($i == 0){
				$contents = str_replace('{{'.$match.'}}','',$contents);
			}
		}
		return $contents;
	}

	function replaceSquares($contents,$matches){
		foreach($matches[0] as $match){
			$contents = str_replace("[[".$match."]]",$this->SITE["{$match}"],$contents);
		}
		return $contents;
	}

	function parse($file){
		ob_start();
		include $file;
		$contents = ob_get_clean();
		preg_match_all("/(?<={{)[^}}]*(?=}})/m",$contents,$curls);
		if(!empty($curls)){
			$contents = $this->replaceCurly($contents,$curls);
		}
		preg_match_all("/(?<=\[\[)[^\]\]]*(?=\]\])/m",$contents,$squares);
		if(!empty($squares)){
			$contents = $this->replaceSquares($contents,$squares);
		}
		return $contents;
	}

	function parseString($contents){
		preg_match_all("/(?<={{)[^}}]*(?=}})/m",$contents,$curls);
		if(!empty($curls)){
			$contents = $this->replaceCurly($contents,$curls);
		}
		preg_match_all("/(?=\[\[)[^\]\]]*(?=\]\])/m",$contents,$squares);
		if(!empty($squares)){
			$contents = $this->replaceSquares($contents,$squares);
		}
		return $contents;
	}

	function __destruct(){
		return true;
	}
}
?>