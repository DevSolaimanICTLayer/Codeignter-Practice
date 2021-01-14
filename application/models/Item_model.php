<?php
class Item_model extends CI_Model {


public function get_all_categories()
{
    $query = $this->db->get('category')->result();
    return $query;
  
}
public function save_item($data)
{
    $insert=$this->db->insert('products',$data);
    

}

// Update record
function updateItem($id,$field,$value){

    // Update
    $data=array($field => $value);
    $this->db->where('id',$id);
    $this->db->update('products',$data);
  }


  // For Editable datatables
public function get_all_items()
{
    $column = array("id", "product_name", "product_attr", "product_price");

   
		$query = $this->db->get('products')->result();		
        // if ( isset($_GET['reply_id'], $_GET['reply_user'])
		if(!empty($this->input->post("search")) && !empty($this->input->post("value")))
		{
		$query .= '
		WHERE product_name LIKE "%'.$this->input->post(["search"]["value"]).'%" 
		OR product_attr LIKE "%'.$this->input->post(["search"]["value"]).'%" 
		OR product_price LIKE "%'.$this->input->post(["search"]["value"]).'%" 
		';
		}
        
		if(!empty($this->input->post("order")))
		{
		$query .= $this->db->order_by .$column[$this->input->post(['order']['0']['column'])].' '.$this->input->post(['order']['0']['dir']).' ';
		}
		else
		{
        
		$query .= 'orderby';
       
		}
		$query1 = '';

		if($_POST["length"] != -1)
		{
		$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$statement =$query;
		
	
		

		$number_filter_row = $query;
		echo "<pre>";
		print_r($number_filter_row);
		exit;
		$statement =$query . $query1;

		$statement->execute();

		$result = $statement->fetchAll();

		$data = array();

		foreach($result as $row)
		{
		$sub_array = array();
		$sub_array[] = $row['id'];
		$sub_array[] = $row['first_name'];
		$sub_array[] = $row['last_name'];
		$sub_array[] = $row['gender'];
		$data[] = $sub_array;
		}

		function count_all_data()
		{
		$query = "SELECT * FROM tbl_sample";
		$statement =$query;
		$statement->execute();
		return $statement->rowCount();
		}

		$output = array(
		'draw'   => intval($_POST['draw']),
		'recordsTotal' => count_all_data(),
		'recordsFiltered' => $number_filter_row,
		'data'   => $data
		);

		echo json_encode($output);
}

}



?>