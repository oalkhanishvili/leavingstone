<?php  
class MDaily extends CI_Model {  
  function getAll(){  
    $this->db->select('*');  
    $this->db->from('amanati');  
    $this->db->limit(50);  
    $this->db->order_by('id','ASC');  
    $query = $this->db->get();  
   
    return $query->result();
  }
   
  function get($id){  
    $query = $this->db->getwhere('amanati',array('id'=>$id));  
    return $query->row_array();  
  }  
   
  function save(){  
    $amanati = $this->input->post('amanati');  
    $kodi = $this->input->post('kodi');  
    $saxeli = $this->input->post('saxeli');  
    $data = array(  
      'amanati'=>$amanati,  
      'kodi'=>$kodi,  
      'saxeli'=>$saxeli 
    );  
    $this->db->insert('daily',$data);  
  }  
   
  function update(){  
    $id   = $this->input->post('id');
    $amanati = $this->input->post('amanati');  
    $kodi = $this->input->post('kodi');  
    $saxeli = $this->input->post('saxeli');  
    $data = array(  
      'amanati'=>$amanati,  
      'kodi'=>$kodi,  
      'saxeli'=>$saxeli  
    );  
    $this->db->where('id',$id);  
    $this->db->update('amanati',$data);  
  }  
   
}  