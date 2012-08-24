<?php 
/**
* Modelo Curso
*
* Modelo Curso ...
*
* LICENSE: Licencia...
*
* @author     Gianino Cole
* @copyright  Copyright (c) 2012-2012 CloudMedia S.A.C
* @version    0.1
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mCurso extends CI_Controller {

	public function insertar()
	{
		$this->db->insert();
	}

	public function editar()
	{
		$this->db->set();
	}

	public function eliminar($id)
	{
        $this->db->where('id', $id);
        $query = $this->db->delete('curso');

        return $this->listar();
	}

	public function eliminarTodos()
	{
		$this->db->delete();
	}

    /**
     * @param int $id
     * @return text $return (devuelve el curso seleccionado, de no existir devuelve mensaje de error)
     */
    public function ver($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('curso');

        if( $query->num_rows() > 0 ) 
        {
            $return['resultado'] = $query->row_array();
        } 
        else 
        {
            $return['vacio'] = "No existe ese registro (-.-)'";
        }

        return $return;
    }

    /**
     * 
     */
    public function listar($pagina = 1)
    {
        $sql = 'SELECT * FROM curso ORDER BY id DESC';
        $return = $this->db->paginar($sql, $pagina,10);
        $return['pagina'] = $pagina;
        return $return;
    }
}