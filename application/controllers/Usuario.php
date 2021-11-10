<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Usuario extends REST_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_usuario');
    }
    
   public function list_get()
   {
       # code...
       $dato= $this->Model_usuario->listar_usuario();
       $this->response($dato);
   } 

  public function guardar_post()
  {
      # code...
    $dato = $this->Model_usuario->guardar_usuario();
    $this->response($dato);

  }
   
}



?>