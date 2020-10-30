<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Product extends REST_Controller {
	function __construct()

	{
		parent::__construct();
		$this->load->model('api_model'); 
    $this->load->library('form_validation');

  }

	/* 
    INSERT:POST REQUEST TYPE
    UPDATE:PUT REQUEST TYPE
    DELETE:DELETE REQUEST TYPE
    LIST:GET REQUEST TYPE
	*/
	//get:<project_url>/index.php/controller name(product)/methodname(index is method name so not required to define)
    public function index(){


      $data = $this->api_model->fetch_all();
      echo json_encode($data->result_array());
      
    }
	//PUT:<project_url>/index.php/controller name(product)
    function fetch_single()
    {
      if($this->input->post('id'))
      {
       $data = $this->api_model->fetch_single_user($this->input->post('id'));
       foreach($data as $row)
       {
        $output['full_name'] = $row["name"];
        $output['price'] = $row["price"];
      }
      echo json_encode($output);
    }
  }
  public function index_put(){
		//updating data method
    $this->form_validation->set_rules("full_name", "Enter Name", "required");
    $this->form_validation->set_rules("price", "Enter Price", "required");
    $array = array();
    if($this->form_validation->run())
    {
     $data = array(
      'name' => trim($this->input->post('full_name')),
      'price'  => trim($this->input->post('price'))
    );
     $this->api_model->update_api($this->input->post('id'), $data);
     $array = array(
      'success'  => true
    );
   }
   else
   {
     $array = array(
      'error'    => true,
      'full_name' => form_error('full_name'),
      'price_error' => form_error('price')
    );
   }
   echo json_encode($array, true);
 }



	//DELETE:<project_url>/index.php/controller name(product)
 public function index_delete(){
		//delete data method
   if($this->input->post('id'))
   {
     if($this->api_model->delete_single_user($this->input->post('id')))
     {
      $array = array(
       'success' => true
     );
    }
    else
    {
      $array = array(
       'error' => true
     );
    }
    echo json_encode($array);
  }
}


	//post:<project_url>/index.php/controller name(product)
public function index_insert(){
		//insert data method
 $this->form_validation->set_rules("full_name", "Enter Name", "required");
 $this->form_validation->set_rules("price", "Enter Price", "required");
 $array = array();
 if($this->form_validation->run())
 {
   $data = array(
    'name' => trim($this->input->post('full_name')),
    'price'  => trim($this->input->post('price'))
  );
   $this->api_model->insert_api($data);
   $array = array(
    'success'  => true
  );
 }
 else
 {
   $array = array(
    'error'    => true,
    'full_name' => form_error('full_name'),
    'price_error' => form_error('price')
  );
 }
 echo json_encode($array, true);
}


}




?>