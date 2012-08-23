<?php
/**
* Modelo Módulo
*
* Modelo Módulo ...
*
* LICENSE: Licencia...
*
* @author     Gianino Cole
* @copyright  Copyright (c) 2012-2012 CloudMedia S.A.C
* @version    0.1
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mModulo extends CI_Model {
 
    /**
     * 
     */
    public function listar($pagina = 1)
    {
        $sql = 'SELECT * FROM modulo ORDER BY id DESC';
        $return = $this->db->paginar($sql, $pagina,10);
        $return['pagina'] = $pagina;
        return $return;
    }

    /**
     * @param int $id
     * @return text $data (Mensaje de error o satisfacción)
     * @todo unir con bd
     */
    public function eliminar($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('modulo');

        return $this->listar();
    }

    /**
     * @param int $id
     * @return text $data (Mensaje de error o satisfacción)
     * @todo determinar lógica
     */
    public function editar($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('modulo', $data); 
        return true;
    }

    public function validar()
    {
        $this->form_validation->set_rules('modulo', 'Usuario', 'required');
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

    /**
     * @param int $id
     * @return text $return (devuelve el usuario seleccionado, de no existir devuelve mensja de error)
     */
    public function ver($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('modulo');

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
     * @param array $data (obtiene los parametros para el insert)
     * @return text true
     */
    public function ingresar($data)
    {
        $this->db->insert('modulo',$data);
        return true;
    }

    public function verificar($user,$pass)
    {

        $this->db->where('modulo' , $usuario);
        $this->db->where('password' , MD5($password));
        $query = $this->db->get('modulo');

        if($query->num_rows() > 0)
        {
            $return['succes'] = 'Bienvenido '.$usuario;
        }
        else
        {
            $return['error'] = 'Error en los campos Usuario y/o contraseña';
        }

        return $return;        
    }


    /* OPERACIONES */

 
}

?>