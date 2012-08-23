<?php

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mUsuario');
	}


	function index()
	{
		$data = $this->mUsuario->listar();
		$this->load->view('usuarios',$data);
	}

	function eliminar()
	{
		$id = $this->input->get('id');
		$data = $this->mUsuario->eliminar($id);
		$this->load->view('usuarios',$data);
	}

	function ver()
	{
		$id = $this->input->get('id');
		$data = $this->mUsuario->ver($id);
		$this->load->view('uedit',$data);
	}

	function editar()
	{
		$id = $this->input->get('id');
		$data = $this->mUsuario->editar($id);
		$this->load->view('ueditar',$data);
	}
	function ingresar()
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

		$data = $this->mUsuario->ingresar($data);
		$this->index();

	}
	function verificar()
	{
		$usuario = $this->input->post('usuario');
        $password = $this->input->post('password');
		$data = $this->mUsuario->verificar($usuario,$password);
		$this->load->view('usuarios',$data);
	}

	function lista($cosa)
	{
		$data = $this->mUsuario->listar($cosa);
		$this->load->view('usuarios',$data);
	}

	function form()
	{
		$this->load->view('uform');
	}

	function validarUsuario()
	{
		$this->mUsuario->validarUsuario();
	}

}

?>