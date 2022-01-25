<?php 

defined("ABSPATH") ? "":die();

//capture ajax data
$raw_data = file_get_contents("php://input");
if(!empty($raw_data))
{

	$OBJ = json_decode($raw_data,true);
	if(is_array($OBJ))
	{
		if($OBJ['data_type'] == "search")
		{

			$productClass = new Product();

			if(!empty($OBJ['text']))
			{
				//search
				$barcode = $OBJ['text'];
				$text = "%".$OBJ['text']."%";
				$query = "select * from products where description like :find || barcode = :barcode limit 10";
				$rows = $productClass->query($query,['find'=>$text,'barcode'=>$barcode]);

			}else{
				//get all
				$rows = $productClass->getAll();
			}
			
			if($rows){

				foreach ($rows as $key => $row) {
					
					$rows[$key]['description'] = strtoupper($row['description']);
					$rows[$key]['image'] = crop($row['image']);
				}

				$info['data_type'] = "search";
				$info['data'] = $rows;
				
				echo json_encode($info);

			}

		}
	}

}

