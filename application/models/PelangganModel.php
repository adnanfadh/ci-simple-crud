<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class PelangganModel extends CI_Model {

	public function rules()
	{
		return [
			[
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required'
			],
			[
				'field' => 'tempatLahir',
				'label' => 'Tempat Lahir',
				'rules' => 'required'
			],
			// [
			// 	'field' => 'tanggalLahir',
			// 	'label' => 'Tanggal Lahir',
			// 	'rules' => 'required'
			// ],
			[
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required'
			],
			[
				'field' => 'umur',
				'label' => 'Umur',
				'rules' => 'required'
			]
		];
	}
 
    function getData(){
        return $this->db->get('pelanggan')->result(); 
    }
 
    function getDataById($id){
        $this->db->where('id',$id); 
        return $this->db->get('pelanggan')->result(); 
    }
 
    function deleteData($id){
        $this->db->where('id',$id); 
        $this->db->delete('pelanggan'); 
    }
 
    function insertData($data){
        $this->db->insert('pelanggan',$data); 
    }
 
    function updateData($id,$data){
        $this->db->where('id',$id); 
        $this->db->update('pelanggan',$data); 
    }
}
?>
