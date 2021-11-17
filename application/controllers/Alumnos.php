<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/RestController.php';

class Alumnos extends RestController
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_alumnos');
    }
    
   public function listAlumnos_get()
   {
       # code...
       $dato= $this->Model_alumnos->listarAlumnos();
       $this->response($dato);
   }
   public function listAlumnosActivos_get()
   {
       # code...
       $dato= $this->Model_alumnos->listarActivos_alumnos();
       $this->response($dato);
   }
   public function listAlumnosInactivos_get()
   {
       # code...
       $dato= $this->Model_alumnos->listarInactivos_alumnos();
       $this->response($dato);
   }
   public function guardar_post()
  {
      # code...
    $dato = $this->Model_alumnos->guardaAlumnos();
    $this->response($dato);

  }
   
   public function loginAlumnos_post()
   {
       # code...
       $data = $this->Model_alumnos->loginAlumnos();
			if($data){
				$respuesta = array(
					'err' => false,
					'desc' => "Inicio de sección correcto.",
					'alumnos' => $data
				);
			}else{
				$respuesta = array(
					'err' => true,
					'desc' => "El usuario o código son incorrectos.",
					'alumnos' => null
				);
			}
			$this->response($respuesta);
   }

   public function filtroAlumnos_post()
   {
       # code...
       $data = $this->Model_alumnos->filtroCiAlumnos();
			if($data){
				$respuesta = array(
					'err' => false,
					'desc' => "Datos encontrados",
					'alumnos' => $data
				);
			}else{
				$respuesta = array(
					'err' => true,
					'desc' => "No se encontro datos",
					'alumnos' => null
				);
			}
			$this->response($respuesta);
   }
  
   
}



?>