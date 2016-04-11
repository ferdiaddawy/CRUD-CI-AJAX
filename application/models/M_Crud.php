<?php
class M_Crud extends CI_Model {

        public function getAll()
        {
                $query = $this->db->get('tbl_latihan');
                foreach ($query->result_array() as $row)
                {
                   $array = array();
                   $array['nama']  = $row['nama'];
                   $array['email'] = $row['email'];
                   $array['telp']  = $row['telp'];
                   $array['foto']  = '<img src="'.base_url().'assets/img/'.$row['foto'].'" width="100px">';
                   $array['aksi']  = '<a href="#" id="'.$row['id'].'" class="btn btn-info edit" data-toggle="modal" data-target="#myModal">Edit</a>
                                      <a href="#" id="'.$row['id'].'" class="btn btn-danger delete">Delete</a>';
                   $array1[] = $array;
                }

                return array("data" => $array1,);
        }

        public function getDataId($id)
        {
                $query 	= $this->db->query("SELECT * FROM tbl_latihan WHERE id = '$id'");
                $row 	= $query->row_array();
                if ($query->num_rows() > 0)
                {
                	$data = array();
                	$data['id'] 	= $row['id'];
                	$data['nama'] 	= $row['nama'];
                	$data['email'] 	= $row['email'];
                	$data['telp'] 	= $row['telp'];
                	return $data;
                }
                else
                {
                	$data = array();
                	$data['id'] 	= 0;
                	$data['nama'] 	= '';
                	$data['email'] 	= '';
                	$data['telp'] 	= '';
                	return $data;
                }
        }

		public function insert($tables,$data){
		    $this->db->insert($tables,$data);
		}

		public function update($tables,$data,$pk,$id){
		    $this->db->where($pk,$id);
		    $this->db->update($tables,$data);
		}

         public function delete($tables,$pk,$id){
            $this->db->where('id',$id);
            $this->db->delete('tbl_latihan');
        }

}
?>