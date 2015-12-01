<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manager_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * User login model
	 * @param string $username
	 * @param string $password
	 * @return int || false
	 */
	public function admin_login($username, $password){
		$query = $this->db->select('id')
			->where('email', $username)
			->where('password', $password)
		->get('users');
		if ( $query->num_rows() > 0 ){
			$result = $query->row_array();
			return $result['id'];
		}else{
			return false;
		}
	}
	/**
	 * Counter for table rows
	 * @param string $table
	 * @return int
	 */
	public function count_table($table){
		$result = $this->db->count_all($table);
		return $result;
	}
	/**
	 * SELECT * Model
	 * @param string $table (Table name)
	 * @param string $fields (Fileds to select.default '*')
	 * @param int $key (key to order)
	 * @param int $order_by
	 * @param int $limit
	 * @param int $offset
	 * @return array || false
	 */
	public function selectAll($table, $fields = '*', $key='', $order_by = '', $limit = '', $offset = ''){
		$query = $this->db->select($fields)
			->order_by($key, $order_by)
			->get($table, $limit, $offset);
		if ( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $row ){
				$result[] = $row;
			}
			$result[0]['num'] = $query->num_rows();
			return $result;
		}
		return false;
	}
	/**
	 * SELECT * WHERE... Model
	 * @param string $table
	 * @param string $fields
	 * @param int $id
	 * @return array || false
	 */
	public function selectById($table,$fields='*', $id){
		$query = $this->db->select($fields)
			->where('id', $id)
			->get($table);
		if ( $query->num_rows() > 0 ){
			$result = $query->row_array();
			return $result;
		}
		return false;
	}
	/**
	 * SELECT last 8 added items
	 * @param string $table
	 * @return array || false
	 */
	public function selectLastAdded($table){
		$query  = $this->db->select($table.'.*,users.name_en')
			->order_by($table.'.id','desc')
			->join('users','users.id='.$table.'.user_id')
			->get($table, 8);

		if ( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $row ){
				$result[] = $row;
			}
			return $result;
		}
		return false;
	}
	/**
	 * Delete records
	 * @param string $table
	 * @param int $id
	 */
	public function delete_obj($table, $id){
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	/**
	 * SELECT 'Tasks' for User && sorting
	 * @param int $id (user_id)
	 * @param int $sort_by
	 * @param int $sort_order
	 * @return array || false
	 */
	public function selectMyTasks($id, $sort_by, $sort_order){
			$sort_order = ( $sort_order == 'desc' )?'desc':'asc';
			$sort_columns = array(
				'title','done',
				'create_date'
				);
			$sort_by = (in_array($sort_by, $sort_columns))?$sort_by:'id';
			$query = $this->db->select('tasks.*,projects.title as p_name')
				->where('tasks.user_id', $id)
				->join('projects','projects.id=tasks.project_id')->get('tasks');
			if ( $query->num_rows() > 0 ){
				foreach ($query->result_array() as $row) {
					$result[] = $row;
				}
				return $result;
			}
			return false;
	}
	/**
	 * SELECT * 'projects' AND join
	 * @return array || false
	 */
	public function selectAllProjects(){
		$query = $this->db->select('projects.*,users.id as u_id,users.name_en')
			->join('users','users.id=projects.user_id')->get('projects');
		if ( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $row ){
				$result[] = $row;
			}
			return $result;
		}
		return false;
	}
	/**
	 * SELECT detail 'projects'
	 * @param int $id
	 * @return array || false
	 */
	public function selectDetailProject($id){
		$query = $this->db->select('projects.*,users.name_en')
			->where('projects.id', $id)
			->join('users','users.id=projects.user_id')->get('projects');
		if ( $query->num_rows() > 0 ){
				$result = $query->row_array();
			return $result;
		}
		return false;
	}
	/**
	 * SELECT 'tasks' for project
	 * @param int $id
	 * @param int $sort_by
	 * @param int $sort_order
	 * @return array || false
	 */
	public function selectTasksById($id, $sort_by, $sort_order){
		$sort_order = ( $sort_order == 'desc' )?'desc':'asc';
		$sort_columns = array(
			'title','done',
			'create_date'
			);
		$sort_by = (in_array($sort_by, $sort_columns))?$sort_by:'id';
		$query = $this->db->select('tasks.*,users.name_en')
			->where('tasks.project_id', $id)
			->order_by($sort_by,$sort_order)
			->join('users','users.id=tasks.user_id')->get('tasks');
		if ( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $row ){
				$result[] = $row;
			}
			return $result;
		}
		return false;
	}
	/**
	 * SELECT 'tasks' for detail page
	 * @param int $id
	 * @return array || false
	 */
	public function selectDetailTask($id){
		$query = $this->db->select('tasks.*,users.name_en,projects.title as p_title')
			->where('tasks.id', $id)
			->join('users','users.id=tasks.user_id')
			->join('projects','projects.id=tasks.project_id')->get('tasks');
		if ( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $row ){
				$result[] = $row;
			}
			$query = $this->db->select('comments.*,users.name_en as user')->where('comments.task_id',$id)
			->join('users', 'users.id=comments.user_id')->get('comments');
			foreach ($query->result_array() as $row) {
				$result['comments'][] = $row;
			}
			return $result;
		}
		return false;
	}
	/**
	 * SELECT * 'users'
	 * @param int $limit
	 * @param int $start
	 * @return array || false
	 */
	public function select_all_users($limit, $start){
		$query = $this->db->select('*')
			->order_by('id', 'desc')
			->limit($limit, $start)
			->get('users');

		foreach ( $query->result_array() as $row ){
			$result[] = $row;
		}
		return $result;
	}
	/**
	 * Search for user criteria
	 * @return array || false
	 */
	public function search_user(){
		$match = $this->input->post('search');
		$query = $this->db->select('*')
			->like('name_en', $match)
			->or_like('email', $match)
			->get('users');

		if ( $query->num_rows() > 0 ){
						foreach ($query->result_array() as $row) {
								$data[] = $row;
						}
						return $data;
				}
				return false;
	}
}
