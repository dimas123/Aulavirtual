<?php

class Modulo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('mModulo');
	}


	function index()
	{
		$data = $this->mModulo->listar();
		$this->load->view('modulos',$data);
	}

	function eliminar()
	{
		$id = $this->input->get('id');
		$data = $this->mModulo->eliminar($id);
		$this->load->view('modulos',$data);
	}

	function ver()
	{
		$id = $this->input->get('id');
		$data = $this->mModulo->ver($id);
		$this->load->view('medit',$data);
	}

	function editar()
	{

		$id = $this->input->post('id');
		$data = $this->mModulo->ver($id);
		$password = $data['resultado']['password'];
		if($this->input->post('contrasena') != '')
		{
			$password = MD5($this->input->post('contrasena'));
		}

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'bmp|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('imagen'))
		{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('uedit', $error);
		}
		else
		{
			$upload_data = $this->upload->data(); 
		}

		if(isset($upload_data) and $upload_data != '')
		{
			$data = array(
				'usuario' => $this->input->post('usuario'),
				'password' => $password,
				'nombre' => $this->input->post('nombre'),
				'ciudad' => $this->input->post('ciudad'),
				'distrito' => $this->input->post('distrito'),
				'foto' => 'uploads/'.$upload_data['file_name']
			);
		}
		else
		{
			$data = array(
				'usuario' => $this->input->post('usuario'),
				'password' => $password,
				'nombre' => $this->input->post('nombre'),
				'ciudad' => $this->input->post('ciudad'),
				'distrito' => $this->input->post('distrito')
			);
		}

		$this->mModulo->editar($id,$data);
		$this->index();
	}

	function validar()
	{
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('contrasena', 'Contraseña', 'required');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('ciudad', 'Ciudad', 'required');
		$this->form_validation->set_rules('distrito', 'Distrito', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function ingresar()
	{



		if(!$this->mModulo->validar())
		{
			$this->load->view('uform');
			return true;
		}
		else
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'bmp|jpg|png';
			$config['max_size']	= '1000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('imagen'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('uform', $error);
				return true;
			}
			else
			{
				$upload_data = $this->upload->data(); 
			}

			$data = array(
				'usuario' => $this->input->post('usuario'),
				'password' => MD5($this->input->post('contrasena')),
				'nombre' => $this->input->post('nombre'),
				'ciudad' => $this->input->post('ciudad'),
				'distrito' => $this->input->post('distrito'),
				'foto' => 'uploads/'.$upload_data['file_name']
			);

			$data = $this->mModulo->ingresar($data);
			$this->index();
		}



	}
	function verificar()
	{
		$usuario = $this->input->post('usuario');
        $password = $this->input->post('password');
		$data = $this->mModulo->verificar($usuario,$password);
		$this->load->view('modulos',$data);
	}

	function lista($cosa)
	{
		$data = $this->mModulo->listar($cosa);
		$this->load->view('modulos',$data);
	}

	function form()
	{
		$this->load->view('mform');
	}

	function validarUsuario()
	{
		$this->mModulo->validarUsuario();
	}

}

?>