<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiplefield extends CI_Controller {
	public function __construct() {
		parent::__construct();

	}

	public function index()
	{
		$this->load->view('morecustomer');
	}
	
	
	function morefield()
	{
		$name=$this->input->post('addname');
		$contact=$this->input->post('contact');
		$state=$this->input->post('state');
		$genders=$this->input->post('gender');
		$check=$this->input->post('check');
		$check_field=implode($check);
		//echo $check_field;
		for($i=0; $i<count($name); $i++)
		{
			//echo $name[$i] .'<br>';
			$_FILES['images']['name'] = $_FILES['image']['name'][$i];
			$_FILES['images']['type'] = $_FILES['image']['type'][$i];
			$_FILES['images']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
			$_FILES['images']['error'] = $_FILES['image']['error'][$i];
			$_FILES['images']['size'] = $_FILES['image']['size'][$i];

				 // File upload configuration 
			$config['upload_path'] = 'uploads/'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = '5000'; // max_size in kb
                    $config['file_name'] = $_FILES['image']['name'][$i];
                     // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 

                    // Upload file to server 
                    if($this->upload->do_upload('images')){ 
                        // Uploaded file data 
                    	$fileData = $this->upload->data(); 
                    	$datas[$i]['image'] = $fileData['file_name']; 
                    }

                    $data[] =[
                    	'name' =>$name[$i],
                    	'contact' =>$contact[$i],
                    	'state' =>$state[$i],
                    	'gender' =>$genders[$i],
                    	'check_field' =>implode(',',$check),
                    	'image' =>$datas[$i]['image'],
                    ];
                }
		// insert batch
                $this->db->insert_batch('morefield',$data);
                //echo $this->addmorefield();
                echo "Data Inserted Successfully";

            }
            function addmorefield()
            {
            	$data = array();

            	if(!empty($_FILES['image']['name'])){
            		$filesCount = count(array_filter($_FILES['image']['name']));
            		for($i = 0; $i < $filesCount; $i++){
            			$_FILES['images']['name'] = $_FILES['image']['name'][$i];
            			$_FILES['images']['type'] = $_FILES['image']['type'][$i];
            			$_FILES['images']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
            			$_FILES['images']['error'] = $_FILES['image']['error'][$i];
            			$_FILES['images']['size'] = $_FILES['image']['size'][$i];

				 // File upload configuration 
            			$config['upload_path'] = 'uploads/'; 
            			$config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = '5000'; // max_size in kb
                    $config['file_name'] = $_FILES['image']['name'][$i];
                     // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 

                    // Upload file to server 
                    if($this->upload->do_upload('images')){ 
                        // Uploaded file data 
                    	$fileData = $this->upload->data(); 
                    	$datas[$i]['image'] = $fileData['file_name']; 
                    }
                } 
                if(!empty($datas)){ 
                	$insert = $this->db->insert_batch(' morefield',$datas);
                	echo "image uploaded";
                	
                }
                else{
                	echo "not uploaded";
                }
            }
        } 
    }


