<?php

class anoticias extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mNoticias');
	}

	function index()
	{
		$this->mNoticias->lista();
	}

	/*function listar()
	{
		$data['noticias'] = $this->mNoticias->obtenerTodos();
		//foreachealo
		$this->load->view('anoticias'.$data);
	}*/

	function lista($cosa)
	{
		$this->mNoticias->lista($cosa);
	}

	function editar()
	{
		$id = $this->input->post('id');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'bmp|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('imagen'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('anoticiasform', $error);
		}
		else
		{
			$upload_data = $this->upload->data(); 
		}

		$data = array(
			'titulo' => $this->input->post('titulo'),
            'resumen' => $this->input->post('resumen'),
            'contenido' => $this->input->post('contenido'),
            'estado' => $this->input->post('estado'),
            'imagen' => 'uploads/'.$upload_data['file_name']
		);

		$this->mNoticias->editar($id,$data);
		
	}

	function ver()
	{
		$id = $this->input->get('id');

		$data = $this->mNoticias->adetalle($id);
		$this->load->view('anoticiaseditar', $data);
	}

	function form()
	{
		$this->load->view('anoticiasform');
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
			$this->load->view('anoticiasform', $error);
		}
		else
		{
			$upload_data = $this->upload->data(); 
		}

		$data = array(

            'titulo' => $this->input->post('titulo'),
            'resumen' => $this->input->post('resumen'),
            'contenido' => $this->input->post('contenido'),
            'estado' => $this->input->post('estado'),
           	'imagen' => 'uploads/'.$upload_data['file_name']

        );

        $this->mNoticias->ingresar($data);
       	$this->mNoticias->lista();
	}

	function eliminar()
	{
		$id = $this->input->get('id');
		$this->mNoticias->eliminar($id);
	}

	function do_upload()
	{
		die('zxczxc');

	}
}

?>