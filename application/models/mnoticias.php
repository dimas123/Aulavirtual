<?php

class mnoticias extends CI_Model {

    public function obtenerTodos($limit = 0) {


        $this->db->order_by('fecha','DESC');
        if($limit != 0)
        {
            $query = $this->db->get('noticia',$limit,0); 
        }
        else
        {
            $query = $this->db->get('noticia');           
        }

 
        if( $query->num_rows() > 0 ) 
		{
            $data['result'] = $query->result();
        } 
		else 
		{
        	$data['vacio'] = "No existen registros (-.-)'";
        }

        return $data;
 
    }

    public function obtenerPublicados() {
 
        $this->db->where('estado',1);
        $query = $this->db->get('noticia');
 
        if( $query->num_rows() > 0 ) 
        {
            return $query->result();
        } 
        else 
        {
            $data['vacio'] = "No existen registros (-.-)'";
        }

        return $data;
 
    }

    public function ingresar($data) {


        $this->db->insert('noticia',$data);

    }

    public function editar($id,$data) {

        $this->db->where('id', $id);
        $this->db->update('noticia', $data); 

        $this->lista();
    }

    public function adetalle($id){

        $this->db->where('id', $id);
        $query = $this->db->get('noticia');

        if( $query->num_rows() > 0 ) 
        {
            $data['resultado'] = $query->row_array();
        } 
        else 
        {
            $data['vacio'] = "No existe ese registro (-.-)'";
        }

        return $data;
        
    }

    public function wdetalle($id){

        $this->db->where('id', $id);
        $query = $this->db->get('noticia');

        if( $query->num_rows() > 0 ) 
        {
            $data['resultado'] = $query->row_array();
        } 
        else 
        {
            $data['vacio'] = "No existe ese registro (-.-)'";
        }

        return $data;
    }

    public function eliminar($id){

        $this->db->where('id', $id);
        $query = $this->db->delete('noticia');

        $this->lista();
    }


    function obtenerVotos($pagina = 1,$tipo = 1)
    {
        if($tipo == 2)
        {
            $sql = 'SELECT * FROM noticia WHERE estado = 1 ORDER BY id DESC';
        }
        else
        {
            $sql = 'SELECT * FROM noticia ORDER BY id DESC';
        }
        
        return $this->db->get_list($sql, $pagina,10);
    }

    function lista($pagina = 1)
    {
        $data = $this->obtenerVotos($pagina);
        $data['pagina'] = $pagina;
        $this->load->view('anoticias', $data);
    }


    function listaweb($pagina = 1)
    {
        $data = $this->obtenerVotos($pagina,2);
        $data['pagina'] = $pagina;
        $this->load->view('wnoticias', $data);
    }
 
}

?>