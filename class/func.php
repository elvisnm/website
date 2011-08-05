<?php
class Func{
	/**
	* Método que retona o nome da página atual
	*/
	public function getUrl(){
		$URL = explode('/', $_SERVER['REQUEST_URI']);
		if (count($URL) > 5){
			$url = $URL[count($URL) - 4] . "/" . $URL[count($URL) - 3] . "/" . $URL[count($URL) - 2] . "/" . $URL[count($URL) - 1];
		} elseif (count($URL) > 4){
			$url = $URL[count($URL) - 3] . "/" . $URL[count($URL) - 2] . "/" . $URL[count($URL) - 1];
		} elseif (count($URL) > 3){
			$url = $URL[count($URL) - 2] . "/" . $URL[count($URL) - 1];
		} else {
			$url = $URL[count($URL) - 1];
		}
		return $url;
	}

	/*
	* Método que verifica e deConvert caracteres especiais em um objeto
	*/
	public function htmlspecialcharsObject($object){
		if(!is_object($object)) return false;
		foreach(get_object_vars($object) as $key=>$val){
			if(is_array($object->$key)){
				$object->$key = Func::htmlspecialcharsArray($object->$key);
			} else if (is_object($object->$key)){
				$object->$key = Func::htmlspecialcharsObject($object->$key);
			} else {
				if (ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $object->$key)) {
					$object->$key=Func::deConvertData($object->$key);
				} else {
				$object->$key=htmlspecialchars($val);
				$object->$key=nl2br($val);
				}
			}
		}
		return $object;
	}
	
	/*
	* Método uqe verifica e deConvert caracteres especiais em um Array
	*/
	public function htmlspecialcharsArray($array){
		if(!is_array($array)) return false;
		foreach($array as $key => $value){
			if(is_array($value)){
				$array[$key] = Func::htmlspecialcharsArray($value);
			} else if (is_object($value)){
				$array[$key] = Func::htmlspecialcharsObject($value);
			} else {
				if (ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $array[$key])) {
					$array[$key]=Func::deConvertData($array[$key]);
				} else {
				$array[$key]=htmlspecialchars($value);
				$array[$key]=nl2br($value);
				}
			}
		}
		return $array;
	}
		
}
?>