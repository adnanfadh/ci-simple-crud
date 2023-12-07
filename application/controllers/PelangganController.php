<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class PelangganController extends CI_Controller {
 
    function __construct(){
        parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('PelangganModel'); 
		$this->load->model('AuthModel');
		// if(!$this->AuthModel->current_user()){
		// 	redirect('AuthController/login');
		// }
    }
 
    public function index()
    {
        $this->load->view('pelangganIndex'); 
    }
 
    function ambilData(){
        $data = $this->PelangganModel->getData(); 
        echo json_encode($data); 
    }
 
    function ambilDataById(){
        $id = $this->input->post('id'); 
        $data = $this->PelangganModel->getDataById($id); 
        echo json_encode($data); 
    }
 
    function hapusData(){
        $id = $this->input->post('id');
        $data = $this->PelangganModel->deleteData($id);
        echo json_encode($data); 
    }
 
    function tambahData(){

		$rules = $this->PelangganModel->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$array = array(
				'error'   => true,
				'name_error' => form_error('nama'),
				'email_error' => form_error('tempatLahir'),
				'subject_error' => form_error('alamat'),
				'message_error' => form_error('umur')
			   );
			echo json_encode($array);
		}

        $nama       = $this->input->post('nama'); 
        $tempatLahir     = $this->input->post('tempatLahir'); 
        $alamat     = $this->input->post('alamat'); 
        $umur       = $this->input->post('umur');
 
        $data = ['nama' => $nama, 'tempatLahir' => $tempatLahir , 'alamat' => $alamat, 'umur' => $umur];
        $data = $this->PelangganModel->insertData($data);
        echo json_encode($data); 
    }
 
    function perbaruiData(){
        $id    = $this->input->post('id');
        $nama       = $this->input->post('nama'); 
        $tempatLahir     = $this->input->post('tempatLahir'); 
        $alamat     = $this->input->post('alamat'); 
        $umur       = $this->input->post('umur'); 
 
        $data = ['nama' => $nama, 'tempatLahir' => $tempatLahir , 'alamat' => $alamat, 'umur' => $umur]; 
        $data = $this->PelangganModel->updateData($id,$data);
         
        echo json_encode($data); 
    }
}
