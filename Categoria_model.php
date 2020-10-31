<?php

class Categoria_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias()
    {
        $this->db->select('*');
        $this->db->from('categorias');
        $this->db->order_by("nombrecat", "asc");        
        $query = $this->db->get();
        return $query->result();
    }
    /*mi version*/
    /*public function guardar($id=null,$nombrecat,$categoria_estado)
    {
        $data = array(
          'nombrecat'=> $nombrecat, 
          'categoria_estado'=> $categoria_estado  
        );
        if($id){
          $this->db->where('id',$id);
          $this->db->update('categorias',$data);   
        }else{
          $this->db->insert('categorias',$data);     
        } 
    }
    public function eliminar($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('categorias');
    }
    public function obtener_por_id($id)
    {
        $this->db->select('*');
        $this->db->from('categorias');
        $this->db->where('id', $id);        
        $query = $this->db->get();
        $resultado = $query->row();
        return $resultado;
    } 
    public function obtener_todos()
    {
        $this->db->select('*');
        $this->db->from('categorias');
        $this->db->order_by("nombrecat", "asc");         
        $query = $this->db->get();
        $resultado = $query->result();
        return $resultado;
    }*/ 
    public function insert_categoria($data)
    {
        $this->db->insert('categorias',$data); 
    }
    /*function to add egreso de Mario*/ 
    /*public function add_egreso($params)
    {
        $this->db->insert('egreso',$params);
        return $this->db->insert_id(); 
    }*/     
}