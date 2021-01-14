<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message');
		$this->load->view('home');
	}
	public function add_item()
	{
		$data=array();
		$data['categories']=$this->Item_model->get_all_categories();		
		return	$this->load->view('backend/products/add',$data);
	}
	public function store()
	{
		$data=array();
		$data['product_name']=$this->input->post('product_name');
		$data['product_attr']=$this->input->post('product_attr');
		$data['category_id']=$this->input->post('category_id');
		$data['product_price']=$this->input->post('product_price');
		$data['product_created_at']=$this->input->post('product_created_at');
		$data['description']=$this->input->post('description');		
		$res=$this->Item_model->save_item($data);
		if($res==true)
			{
			$this->session->set_flashdata('success', 'Item Added Successfully !!');
			}
			else
			{
			$this->session->set_flashdata('error', "Something Went Wrong !!");
			}	
       return redirect('welcome/add_item','refresh');
	}

	public function products()
	{
		return	$this->load->view('backend/products/itemlist');	
	}


public function get_item_list()
{
	$draw = intval($this->input->get("draw"));
	$start = intval($this->input->get("start"));
	$length = intval($this->input->get("length"));
	$query = $this->db->get("products");
	$data = [];
	foreach($query->result() as $r) {
		 $data[] = array(
			  $r->product_id,
			  $r->product_name,			 
			  $r->product_attr,
			  $r->product_price
		 );
	}
	$result = array(
			 "draw" => $draw,
			   "recordsTotal" => $query->num_rows(),
			   "recordsFiltered" => $query->num_rows(),
			   "data" => $data
		  );


	echo json_encode($result);
	exit();
}

public function updateuser(){
	// POST values
	$id = $this->input->post('id');
	$field = $this->input->post('field');
	$value = $this->input->post('value');

	// Update records
	$this->Item_model->updateItem($id,$field,$value);

	echo 1;
	exit;
  }

//   Editable Datatable 


public function editabledatatable()
{
	return	$this->load->view('backend/products/editableitemlist');	
}


public function fetchitem()
{
	$data=array();
	$data['products']=$this->Item_model->get_all_items();	
		
}

}
