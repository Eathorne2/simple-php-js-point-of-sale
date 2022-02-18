<?php 


/**
 * sales class
 */
class Sale extends Model
{
	
	protected $table = "sales";

	protected $allowed_columns = [

				'barcode',
				'receipt_no',
				'user_id',
				'description',
				'qty',
				'amount',
				'total',
				'date',
			];


 	public function validate($data, $id = null)
	{
		$errors = [];

			//check description
			if(empty($data['description']))
			{
				$errors['description'] = "Sale description is required";
			}else
			if(!preg_match('/[a-zA-Z0-9 _\-\&\(\)]+/', $data['description']))
			{
				$errors['description'] = "Only letters allowed in description";
			}

			//check qty
			if(empty($data['qty']))
			{
				$errors['qty'] = "Sale quantity is required";
			}else
			if(!preg_match('/^[0-9]+$/', $data['qty']))
			{
				$errors['qty'] = "quantity must be a number";
			}

			//check amount
			if(empty($data['amount']))
			{
				$errors['amount'] = "Sale amount is required";
			}else
			if(!preg_match('/^[0-9.]+$/', $data['amount']))
			{
				$errors['amount'] = "amount must be a number";
			}
  
			
		return $errors;
	}
 

}