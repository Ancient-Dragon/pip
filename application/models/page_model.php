<?php

class Page_model extends Model {
	
	public function get($url)
	{
		$url = $this->escapeString($url);
		$result = $this->query('SELECT * FROM pages WHERE url="'. $url .'"', "Page_model");
		return $result;
	}

}

?>
