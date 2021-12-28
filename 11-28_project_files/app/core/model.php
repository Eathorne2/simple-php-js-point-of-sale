<?php

/**
 * model class
 */
class Model extends Database
{


	protected function get_allowed_columns($data)
	{
 
 		if(!empty($this->allowed_columns)){
 			
			foreach ($data as $key => $value) {
				// code...
				if(!in_array($key, $this->allowed_columns))
				{
					unset($data[$key]);
				}
			}
		}

		return $data;
 	}

	public function insert($data)
	{

		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		
		$query = "insert into $this->table ";
		$query .= "(".implode(",", $keys) .") values ";
		$query .= "(:".implode(",:", $keys) .")";

		$db = new Database;
		$db->query($query,$clean_array);	

	}

	public function where($data)
	{

		$keys = array_keys($data);
		
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			// code...
			$query .= "$key = :$key && ";
		}

		$query = trim($query,"&& ");

		$db = new Database;
		return $db->query($query,$data);	

	}

}


