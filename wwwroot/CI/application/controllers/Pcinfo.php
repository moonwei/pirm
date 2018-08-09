<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pcinfo extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('departs_model');
			$this->load->model('m_pc');
			$this->load->model('m_post');
			
			$this->load->helper('url_helper');
			$this->load->library('session');
		}
		
		public function index()
		{
			$this->depart();
		}
		
		public function depart($did = null)
		{
			// $this->output->enable_profiler(TRUE);
			
			$data['departs'] = $this->departs_model->get_deps($did);
			
			if (empty($data['departs'])) {
				echo "no rec.";
			} else {
				$data['title'] = '部门信息:';
				
				$this->load->view('templates/header', $data);
				$this->load->view('pcinfo/depart', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		
		public function yes($did = null)
		{
			// $this->output->enable_profiler(TRUE);
			
			$data['departs'] = $this->departs_model->g($did);
			
			if (empty($data['departs'])) {
				echo "<?php header('location:depart.php')";
			} else {
				$data['title'] = '确认计算机终端信息: ';
				
				$this->load->view('templates/header', $data);
				$this->load->view('pcinfo/yes', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		
		public function add()
		{
			// $this->output->enable_profiler(TRUE);
			// $data['departs']=$this->departs_model->g($did);
			
			$pcjson = $this->input->post('pcjson');
			
			$data['title'] = '添加成功。';
			
			$data['result'] = $this->m_pc->set_pc($pcjson);
			
			$this->load->view('templates/header', $data);
			$this->load->view('pcinfo/suc', $data);
			$this->load->view('templates/footer', $data);

			
		}
		
		public function list_pc($did = null)
		{
			
			$data['pcs'] = $this->m_pc->list($did);
			$pccount = count($data['pcs']);
			$data['title'] = '本部门共有 ' . $pccount . ' 台计算机终端。';
			
			// $data['result']=$this->m_pc->set_pc($pcjson);
			
			$this->load->view('templates/header', $data);
			$this->load->view('pcinfo/list_pc', $data);
			$this->load->view('templates/footer', $data);
		}

//新分支可以选择岗位
		//
		public  function signin()
		{
			$data['title']='登录';
			$this->load->view('templates/header', $data);
			$this->load->view('pcinfo/signin.php', $data);
			$this->load->view('templates/footer', $data);
		}
		public function departs($page = 'departs')
		{
			// $this->output->enable_profiler(TRUE);
			if (!file_exists(APPPATH . 'views/pcinfo/' . $page . '.php')) {
				echo APPPATH . 'views/pcinfo/' . $page . '.php';
				echo "没有找到。";
				# code...
			}
			$data['title'] = '部门列表:';
			$data['departs'] = $this->departs_model->list();
			
			$this->load->view('templates/header', $data);
			$this->load->view('pcinfo/' . $page . '.php', $data);
			$this->load->view('templates/footer', $data);
			
		}
		
		public function postInDep($did = null)
		{
			// $this->output->enable_profiler(TRUE);
			
			$data['posts'] = $this->m_post->findByDid($did);
			$data['thisDep'] = $this->departs_model->g($did);
			
			$data['title'] = $data['thisDep']->name . '本部门共有 ' . count($data['posts']) . ' 个岗位。';
			
			// $data['result']=$this->m_pc->set_pc($pcjson);
			
			$this->load->view('templates/header', $data);
			$this->load->view('pcinfo/postInDep', $data);
			$this->load->view('templates/footer', $data);
		}
		
		public function sayyes($postSn = null)
		{
			// $this->output->enable_profiler(TRUE);
			
			$data['posts'] = $this->m_post->findBySn($postSn);
			
			if (empty($data['posts'])) {
				echo "<?php header('location:departs.php'); ?>";
			} else {
				$data['title'] = '确认计算机终端信息: ';
				
				$this->load->view('templates/header', $data);
				$this->load->view('pcinfo/sayyes', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		
		public function add2()
		{
			// $this->output->enable_profiler(TRUE);
			// $data['departs']=$this->departs_model->g($did);
			
			$pcjson = $this->input->post('pcjson');
			
			$data['title'] = '添加成功。';
			
			$data['result'] = $this->m_pc->set_pc($pcjson);
			
			$this->load->view('templates/header', $data);
			$this->load->view('pcinfo/suc', $data);
			$this->load->view('templates/footer', $data);
			
		}
		
		public function take_list($did = null)
		{
//			$this->output->enable_profiler(TRUE);
			
			$data['detail'] = $this->m_pc->detail($did);

			$pccount = count($data['detail']);
			$data['title'] = '本部门共有 ' . $pccount . ' 台计算机终端。';
			
			// $data['result']=$this->m_pc->set_pc($pcjson);
			
			$this->load->view('templates/header', $data);
			$this->load->view('pcinfo/list', $data);
			$this->load->view('templates/footer', $data);
		}
	}
