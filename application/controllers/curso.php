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
		$data = $this->mCurso->listar();
		$this->load->view('cursos',$data);
	}

	public function lista($pagina)
	{
		$this->mCurso->lista($pagina);
	}

	public function editar()
	{
		/*comentario2*/
		$this->mCurso->editar();
	}

	public function eliminar()
	{
		$id = $this->input->get('id');
		$data = $this->mCurso->eliminar($id);
		$this->load->view('cursos',$data);
	}

	public function ver()
	{
		$id = $this->input->get('id');
		$data = $this->mCurso->ver($id);
		$this->load->view('cedit',$data);
	}

	public function listar()
	{
		$data = $this->mCurso->listar();
		$this->load->view('curso',$data);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */