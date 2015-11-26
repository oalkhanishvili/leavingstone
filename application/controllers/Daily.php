<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
  
class Daily extends CI_Controller {  
  public function __construct() {  
        parent:: __construct();  
        $this->load->helper("url");  
        $this->load->model('MDaily');  
  $this->load->helper('form');  
    }  
   
  public function index(){  
    $data['query'] = $this->MDaily->getAll();  
    $this->load->view('daily/input',$data);  
  }  
   
  public function submit(){  
    if ($this->input->post('ajax')){  
      if ($this->input->post('id')){  
        $this->MDaily->update();  
        $data['query'] = $this->MDaily->getAll();  
        $this->load->view('daily/show',$data);  
      }else{  
        $this->MDaily->save();  
        $data['query'] = $this->MDaily->getAll();  
        $this->load->view('daily/show',$data);  
      }  
    }  
  }  
   
  public function delete(){  
    $id = $this->input->post('id');  
    $this->db->delete('daily', array('id' => $id));  
    $data['query'] = $this->MDaily->getAll();  
    $this->load->view('daily/show',$data);  
  }  
}  