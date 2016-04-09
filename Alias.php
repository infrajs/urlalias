<?php
namespace infrajs\urlalias;
class Alias {
	public static $conf = array(
		'hard' => array( //Точное совпдаение адреса до параметров
			'urlalias-hard-test' => 'urlalias-hard-ok'
		),
		'part' => array( //Частичное совпадение от начала до параметров
			'urlalias-part-test' => 'urlalias-part-ok'
		)
	);
	public static function get($query) { //$query без get параметров
		$conf = static::$conf;
		foreach ($conf['hard'] as $search => $newquery) {
			if ($search == $query) return $newquery;
			if ($search.'/' == $query) return $newquery;
		}
		
		foreach ($conf['part'] as $search => $newquery) {
			$r = explode($search, $query, 2);
			if ($r[0] != '') continue;
			return $newquery.$r[1];
		}
	}
	public static function init() {
		$oquery = urldecode(substr($_SERVER['REQUEST_URI'], 1));
		$p = explode('?', $oquery, 2);
		$query = $p[0];
		$newurl = Alias::get($query);
		if ($newurl) {
			if (!empty($p[1])) $newurl .= '?'.$p[1];
			if ($newurl === $oquery) return;
			header('Location: /'.$newurl, true, 301);
			exit;
		}
	}
}