<?php
class excel_import_model extends CI_Model
{
	function insert($data)
	{
		$this->db->insert_batch('dabur_products', $data);
	}
}
