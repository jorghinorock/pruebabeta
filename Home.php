<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->library(array('form_validation'));
    $this->load->model('categoria_model');
  }

  public function index()
  {     
    $categorias = $this->categoria_model->getCategorias();
    $data['categorias'] = $categorias;
    $this->load->view('prueba', $data);
  }

  //public function categorias($param='')
  public function fetchcategorias($param='')
  {
    $categorias = $this->categoria_model->getCategorias();    
    echo json_encode($categorias);
  }
  public function nuevac()
  {   
    $this->load->view('nuevac');
  }
  public function categorias()
  {   
    $this->load->view('categorias');
  }
  /*mi version*/
  /*public function guardarCategoria($param='')
  {
    $categorias = $this->categoria_model->guardar();    
    echo json_encode($categorias);
  }
  public function obtenerCategoriaId($param='')
  {
    $categorias = $this->categoria_model->obtener_por_id($param);    
    echo json_encode($categorias);
  }*/
  //adolfo
  public function add()
  {
    $data = array("nombrecat"=>$this->input->post('nombrecat',false));
    $this->categoria_model->insert_categoria($data);
    $data = "Categoria actualizada";
    header("Status: 200 OK"."\r\n");
    header("Content-Type: text/plain charset=UTF-8\r\n");
    header("Content-Length:".strval(strln($data))."\r\n");
    echo json_encode($data);
  } 
}