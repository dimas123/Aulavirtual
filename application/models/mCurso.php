<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mCurso extends CI_Controller {

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

	public function listar($pagina = 1)
    {
    	$sql = 'SELECT * FROM noticia ORDER BY id DESC';
        $data = $this->db->paginar($sql, $pagina,10);
        $data['pagina'] = $pagina;

        return $data;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */