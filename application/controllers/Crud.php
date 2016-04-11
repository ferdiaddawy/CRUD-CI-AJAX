<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud extends CI_Controller {


	function __construct() {
        parent::__construct();
        $this->load->model('m_crud');
    }
    
    public function index() {
        
        $this->template->content->view('content');
        $this->template->publish();
    }

    public function get_all()
	{
		 $data = $this->m_crud->getAll();
		 $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_data_id()
	{
		 $id   = $_POST['id'];
		 $data = $this->m_crud->getDataId($id);
		 $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function delete()
	{
		 $id   = $_POST['id'];
		 $data = $this->m_crud->delete('tbl_latihan', 'id', $id);
	}

	public function save()
	{

		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		 $id 	   	= $_POST['txtid'];
		 $nama    	= $_POST['txtnama'];
		 $email 	= $_POST['txtemail'];
		 $telp 	   	= $_POST['txthp'];


		 

		 if ( ! $this->upload->do_upload('txtfoto')){

		 		$data = array('nama' 		=> $nama, 
		 			   'email' 			=> $email,
		 			   'telp' 			=> $telp);

			 if ($id > 0)
			 {
			 	$query 	= $this->m_crud->update('tbl_latihan', $data, 'id', $id);
			 }
			 else
			 {
			 	$query 	= $this->m_crud->insert('tbl_latihan', $data);
			 }
		 }else{
			array('upload_data' => $this->upload->data());

			$file = $this->upload->data('file_name');

		 	$data = array('nama' 		=> $nama, 
		 			   'email' 			=> $email,
		 			   'telp' 			=> $telp,
		 			   'foto' 			=> $file);

			 if ($id > 0)
			 {
			 	$query 	= $this->m_crud->update('tbl_latihan', $data, 'id', $id);
			 }
			 else
			 {
			 	$query 	= $this->m_crud->insert('tbl_latihan', $data);
			 }
		 }
	}
}