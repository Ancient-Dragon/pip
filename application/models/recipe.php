<?php

class Recipe extends Model {

    public function get($url)
    {
        $url = $this->escapeString($url);
        $result = $this->query('SELECT * FROM pages WHERE url="'. $url .'"');
        return $result;
    }

}

?>
