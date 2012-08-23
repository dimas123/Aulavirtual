<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mUsuario extends CI_Controller {


	public function index()
	{
		$this->load->view('usuario');
	}

	public function insertar()
	{
		$this->db->insert();
	}

	public function editar()
	{
		$this->db->set();
	}

	public function eliminar()
	{
		$this->db->delete();
	}

	public function eliminarTodos()
	{
		$this->db->delete();
	}

	public function ver()
	{
		$this->db->get();

	}

	public function listar()
	{
		$this->db->get();

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */