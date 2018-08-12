<?php

class Model {

	private $connection;

	public function __construct()
	{
		global $config;

		$this->connection = new mysqli($config['db_host'], $config['db_username'], $config['db_password'], $config['db_name']);
	}

	public function escapeString($string)
	{
		return $this->connection->real_escape_string($string);
	}

	public function escapeArray($array)
	{
	    array_walk_recursive($array, function(&$v) {
	    	$this->connection->real_escape_string($v);
	    });
		return $array;
	}

	public function to_bool($val)
	{
	    return !!$val;
	}

	public function to_date($val)
	{
	    return date('Y-m-d', $val);
	}

	public function to_time($val)
	{
	    return date('H:i:s', $val);
	}

	public function to_datetime($val)
	{
	    return date('Y-m-d H:i:s', $val);
	}

	public function query($qry, $class, $expectedNoResults = 0)
	{

        $resource = $this->connection->query($qry);

        if ( !$resource ) die('Database Error: '.$this->connection->error);
        if($expectedNoResults === 1) {
            $resultObject = $resource->fetch_object($class);
            $resource->free();
            return $resultObject;
        } else {
            $resultObjects = array();
            while ($resource && $row = $resource->fetch_object($class)) {
                $resultObjects[] = $row;
            }
            $resource->free();
            return $resultObjects;
        }
	}

	public function execute($qry)
	{
		$exec = $this->connection->query($qry) or die('MySQL Error: '. $this->connection->error);
		return $exec;
	}

}
?>
