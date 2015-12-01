<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manager extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('manager_model');
		if(!$this->session->has_userdata('logged') && $this->uri->segment(2)!='login'){
			redirect('manager/login');
		}
	}
	public function index(){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');
		$this->load->view('manager/top-menu' ,$data);
		$this->load->view('manager/side-navigation');
		$data['user_count'] = $this->manager_model->count_table('users');;
		$data['tasks_count'] = $this->manager_model->count_table('tasks');
		$data['last_tasks'] = $this->manager_model->selectLastAdded('tasks');
		$data['last_project'] = $this->manager_model->selectLastAdded('projects');
		$this->load->view('manager/index', $data);
		$this->load->view('manager/footer');
	}
	public function login(){
		$username=$this->input->post('email');
		$password=md5($this->input->post('password'));
		if ( $this->manager_model->admin_login($username, $password) == FALSE ){
			$this->load->view('manager/login-form');
		}else{
			$user_id = $this->manager_model->admin_login($username, $password);
			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('logged', $username);
			redirect('manager');
		}
	}
	public function logout(){
		$this->session->unset_userdata('logged');
		redirect('manager');
	}
	// projects page
	public function projects(){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');
		$data['users_list'] = $this->manager_model->selectAll('users','id,name_en');
		$data['projects_list'] = $this->manager_model->selectAllProjects();
		$this->load->view('manager/top-menu', $data);
		$this->load->view('manager/side-navigation');
		$this->load->view('manager/Projects', $data);
		$this->load->view('manager/footer');
	}
	public function detail_project($id){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');
		$data['users_list'] = $this->manager_model->selectAll('users');
		$data['project_list'] = $this->manager_model->selectDetailProject($id);
		$this->load->view('manager/top-menu', $data);
		$this->load->view('manager/side-navigation');
		$this->load->view('manager/Detail_project', $data);
		$this->load->view('manager/footer');
	}
	public function edit_project($id){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');
		$this->load->view('manager/top-menu', $data);
		$this->load->view('manager/side-navigation');
		$data['project_list'] = $this->manager_model->selectById('projects','*',$id);
		$this->load->view('manager/Edit_project', $data);
		$this->load->view('manager/footer');
	}
	public function update_project($id){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
			$time = $_POST['date'].' '.$_POST['clock'];
			$date = date('Y-m-d H:i:s',strtotime($time));
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'create_date' => $date
			);
			$this->db->where('id', $id);
			$this->db->update('Projects', $data);
			$_SESSION['message'] = 'ჩანაწერი განახლებულია';
			$this->session->mark_as_flash('message');
			redirect('manager/edit_project/'.$id);
		}
	}
	public function delete_project($id){
		$this->manager_model->delete_obj('projects', $id);
		$_SESSION['message'] = 'ჩანაწერი წაიშალა';
		$this->session->mark_as_flash('message');
		redirect ('manager/projects');
	}
		public function create_project(){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');
		$this->load->view('manager/top-menu' ,$data);
		$this->load->view('manager/side-navigation');
		$this->load->view('manager/Create_project');
		$this->load->view('manager/footer');
	}
	public function insert_project(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'user_id' => $this->session->userdata('user_id'),
			);
			$this->db->insert('Projects', $data);
			$_SESSION['message'] = 'ჩანაწერი დამატებულია';
			$this->session->mark_as_flash('message');
			redirect('manager/tasks/'.$this->db->insert_id());
		}
	}
	// end-projects page

	//tasks page
	public function my_tasks($sort_by='id', $sort_order='desc'){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		$id = $this->session->userdata('user_id');
		$data['tasks_list'] = $this->manager_model->selectMyTasks($id,$sort_by,$sort_order);
		$this->load->view('manager/top-menu', $data);
		$this->load->view('manager/side-navigation');
		$this->load->view('manager/My_tasks', $data);
		$this->load->view('manager/footer');
	}
	public function tasks($id,$sort_by='id', $sort_order='desc'){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');
		$data['project_id'] = $id;
		$data['project_title'] = $this->manager_model->selectById('projects','title',$id);
		$data['users_list'] = $this->manager_model->selectAll('users','id,name_en');
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		$data['tasks_list'] = $this->manager_model->selectTasksById($id,$sort_by,$sort_order);
		$this->load->view('manager/top-menu', $data);
		$this->load->view('manager/side-navigation');
		$this->load->view('manager/Tasks', $data);
		$this->load->view('manager/footer');
	}
	public function add_task(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
				$config['upload_path']    = './uploads/';
				$config['allowed_types'] 	= '*';
				$config['overwrite']      = true;

			$this->load->library('upload', $config);
			if ( !$this->upload->do_upload() && isset($_POST['userfile'])){
			$error = array( 'error' => $this->upload->display_errors() );
			  print_r( $error);
			}else{
				$data = array( 'upload_data' => $this->upload->data() );
				$array = array(
					'title' => $_POST['title'] ,
					'description' => $_POST['description'],
					'project_id' => $_POST['project_id'],
					'user_id' => $_POST['user_id'],
					'status'=> $_POST['status'],
					'attachment' => @$data['upload_data']['file_name'],
				);
				$this->db->insert('tasks', $array);
				$_SESSION['message'] =  'დავალება დამატებულია';
				$this->session->mark_as_flash('message');
				redirect('manager/tasks/'.$_POST['project_id']);
			}
		}
	}
	public function detail_task($id){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');
		$data['users_list'] = $this->manager_model->selectAll('users');
		$data['tasks_list'] = $this->manager_model->selectDetailTask($id);
		$this->load->view('manager/top-menu', $data);
		$this->load->view('manager/side-navigation');
		$this->load->view('manager/Detail_task', $data);
		$this->load->view('manager/footer');
	}
	public function edit_task($id){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');
		$this->load->view('manager/top-menu', $data);
		$this->load->view('manager/side-navigation');
		$data['users_list'] = $this->manager_model->selectAll('users');
		$data['task_list'] = $this->manager_model->selectById('tasks','*',$id);
		$this->load->view('manager/Edit_task', $data);
		$this->load->view('manager/footer');
	}
	public function update_task($id){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
			$time = $_POST['date'].' '.$_POST['clock'];
			$date = date('Y-m-d H:i:s',strtotime($time));
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'user_id' => $this->input->post('user'),
				'create_date' => $date
			);
			$this->db->where('id', $id);
			$this->db->update('tasks', $data);
			$_SESSION['message'] = 'ჩანაწერი განახლებულია';
			$this->session->mark_as_flash('message');
			redirect('manager/edit_task/'.$id);
		}
	}
	public function delete_task($id){
		$p_id = $this->db->select('project_id')->where('id',$id)->get('tasks')->row()->project_id;
		$this->manager_model->delete_obj('tasks', $id);
		$_SESSION['message'] = 'ჩანაწერი წაიშალა';
		$this->session->mark_as_flash('message');
		redirect ('manager/tasks/'.$p_id);
	}
	public function add_comment(){
		if ( isset($_POST['comment']) && !empty($_POST['comment']) ){
			$comment = $this->input->post('comment');
			$user_id = $this->session->userdata('user_id');
			$task_id = $this->input->post('task_id');
			$username = $this->db->select('name_en')->where('id', $user_id)->get('users')->row()->name_en;
			$data = array(
				'comment' => $comment,
				'user_id' => $user_id,
				'task_id' => $task_id,
			);
			$this->db->insert('comments', $data);
			$html = '<li>
					<div class="commenterImage">
						<p rel="tooltip" data-placement="right" data-original-title="'.$username.'">
							'.strtoupper($username[0]).'</p>
					</div>
					<div class="commentText">
							<p class="u-comment">'.$comment.'</p>';

			$html .=	'<span class="date sub-text">'.date('\o\n M jS, Y').'</span>
					</div>
			</li>';
			echo '{"status":1,"html":'.json_encode($html).'}';
		}else{
			echo '{"status":0}';
		}
	}
	public function file_upload(){
		if (empty($_FILES) || $_FILES["file"]["error"]) {
    	die('{"OK": 0,"error":'.json_encode($_FILES["file"]["error"]).'}');
		}
		$fileName = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/$fileName");
		$data = array(
			'attachment' => $fileName,
			'user_id' => $this->session->userdata('user_id'),
			'task_id' => $_POST['task_id']
		);
		$this->db->insert('comments', $data);
		$username = $this->db->select('name_en')->where('id', $this->session->userdata('user_id'))
		->get('users')->row()->name_en;
		$html = '<li>
				<div class="commenterImage">
					<p rel="tooltip" data-placement="right" data-original-title="'.$username.'">
						'.strtoupper($username[0]).'</p>
				</div>
				<div class="commentText">
				<p class="u-attachment"><i class="fa fa-link"></i>
				<a href="'.site_url('manager/file_download/'.$fileName).'">
				'.$fileName.'</a></p>';

		$html .=	'<span class="date sub-text">'.date('\o\n M jS, Y').'</span>
				</div>
		</li>';

		die('{"OK": 1,"html":'.json_encode($html).'}');
	}
	//end-tasks page

	public function file_download($name){
		$file = './uploads/'.$name;
		if ( file_exists($file) ){
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/force-download");
			header( "Content-Disposition: attachment; filename=".basename($file));
			header( "Content-Description: File Transfer");
			@readfile($file);
		}else{
			die('ფაილი სერვერიდან წაშლილია');
		}
	}
	public function done($id,$table){
		$key = $this->input->post('done');
		$data['done'] = $key;
		( $key == 1 ) ? $data['finish_date'] = date('Y-m-d H:i:s'):$data['finish_date'] = '';
		$this->db->where('id', $id);
		$this->db->update($table , $data);
		echo $this->db->last_query();
	}

	// users-page
	public function users_list(){
		$this->session->mark_as_flash('message');
		$this->load->library('pagination');
		$config['base_url'] = site_url('manager/user_list');
		$config['total_rows'] = $this->manager_model->count_table('users');
		$config['per_page'] = 50;
		$config["uri_segment"] = 3;

		//სტილები
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";



		$this->pagination->initialize($config);
	 	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	 	$data['users'] = $this->manager_model->select_all_users($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');

		$this->load->view('manager/top-menu' ,$data);
		$this->load->view('manager/side-navigation');
		$this->load->view('manager/users-table', $data);
		$this->load->view('manager/footer');
	}
	public function user_search(){
		$this->load->view('manager/header');
		$data['admin_name'] = $this->session->userdata('logged');

		$this->load->view('manager/top-menu' ,$data);
		$this->load->view('manager/side-navigation');
		if (! $this->manager_model->search_user() ){
			$data['error'] = 'ჩანაწერი არ მოიძებნა';
			$this->load->view('manager/search_user', $data);
		}else{
		$data['users'] = $this->manager_model->search_user();
		$this->load->view('manager/search_user', $data);
		}
		$this->load->view('manager/footer');
	}
}
