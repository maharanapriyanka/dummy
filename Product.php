<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Product extends REST_Controller {
	function __construct()

	{
		parent::__construct();
		$this->load->model('api_model'); 
		
	}

	/* 
    INSERT:POST REQUEST TYPE
    UPDATE:PUT REQUEST TYPE
    DELETE:DELETE REQUEST TYPE
    LIST:GET REQUEST TYPE
	*/
	//POST:<project_url>/index.php/controller name(product)/methodname(index is method name so not required to define)
    public function index_post(){
		//insert data method
    	$this->form_validation->set_rules('name', 'Name', 'trim'); 
    	$this->form_validation->set_rules('price', 'Price', 'trim'); 
    	if($this->form_validation->run() == FALSE)  
    	{
     /*  $data=json_decode(file_get_contents("php://input"));
    	$name=isset($data->name)?$data->name:"";
    	$price=isset($data->price)?$data->price:"";
    	if(!empty($name) && !empty($price)) */
    		$this->response(array
    			('status' => 400,
    				'message' => 'All fiels needed.',
    				"data"=>$data),
    			REST_Controller::HTTP_NOT_FOUND);
    }
    else{
        $name = $this->security->xss_clean($this->input->post('name'));
        $price=$this->input->post('price');
        $data=array(
          'name'=>$name,
          'price'=>$price
      );
        $res = $this->api_model->insertData('product', $data);
        if($res){
          $this->response(array
           ('status' => 400,
            'message' => 'data inserted.',
            "data"=>$data),
           REST_Controller::HTTP_OK);

      }
      else{
          $this->response(array
           ('status' => 400,
            'message' => 'Failed to insert data.',
            "data"=>$data),
           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

      }

  }
}
	//PUT:<project_url>/index.php/controller name(product)
public function index_put(){
		//updating data method
    $data=json_decode(file_get_contents("php://input"));
    if(isset($data->id) && isset($data->name) && isset($data->price))
    {
        $id=$data->id;
        $product_info=array(
            'name' =>$data->name,
            'price' =>$data->price
        );
        $result=$this->api_model->update_records($id,$product_info);
        if($result){
           $this->response(array
            ('status' => 1,
                'message' => 'data updated.',
                "data"=>$data),
            REST_Controller::HTTP_OK);

       }
       else{
         $this->response(array
            ('status' => 0,
                'message' => 'not updated.',
                "data"=>$data),
            REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
     }

 } else{
    $this->response(array
        ('status' => 0,
            'message' => 'all fields are needed.',
            "data"=>$data),
        REST_Controller::HTTP_NOT_FOUND);

}


}
	//DELETE:<project_url>/index.php/controller name(product)
public function index_delete(){
		//delete data method
   // $data=json_decode(file_get_contents("php://input"));
    //$id = $this->security->xss_clean($data->id);
    $id=$this->input->get('id');
    $deletedata= $this->api_model->delete($id);
    if($deletedata)
    {
        $this->response(array
            ('status' => 400,
                'message' => 'data has been deleted.',
                "data"=>$data),
            REST_Controller::HTTP_OK);

    }
    else{
       $this->response(array
        ('status' => 0,
            'message' => 'failed to delete.',
            "data"=>$data),
        REST_Controller::HTTP_NOT_FOUND);

   }

}
	//GET:<project_url>/index.php/controller name(product)
public function index_get(){
		//list data method
	$data=$this->api_model->get_product();
    	//print_r($query->result_array());
	if(count($data)>0)
	{
		$this->response(array
			('status' => 400,
				'message' => 'fetch success.',
				"data"=>$data),
			REST_Controller::HTTP_OK);
	}
	else{
		$this->response(array
			('status' => 400,
				'message' => 'Bad request.',
				"data"=>$data),
			REST_Controller::HTTP_NOT_FOUND);

	}



}


}

?>