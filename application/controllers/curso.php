<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curso extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mCurso');
	}

	public function index()
	{
		$this->listar();
	}

	public function lista($pagina)
	{
		$this->mNoticias->lista($pagina);
	}

	public function editar()
	{
		/*comentario*/
		$this->mCurso->editar();
	}

	public function eliminar()
	{
		$this->mCurso->eliminar();
	}

	public function ver()
	{
		$this->mCurso->ver();
	}

	public function listar()
	{
		$data = $this->mCurso->listar();
		$this->load->view('curso',$data);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */