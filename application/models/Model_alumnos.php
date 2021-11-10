<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Model_alumnos extends CI_Model
{
    public $id; //no
    public $password; //ci
    public $nombre; //post
    public $sexo; //post
    public $grado; //1
    public $salon; //1
    public $tipo; //post
    public $fecha; //post
    public $doc; //post
    public $ci;  //post
    public $direccion; //post
    public $telefono; //post
    public $estado;  //no
    public $matricula; //no
    public $unidad_educativa; //post
    public $titulo; //no
    public $rol; //no
    public $gestion; //no
    public $intentos; //no
    public $correo; //post
    public $extencion; //post
    public $ruta; //no
    
    function gestionG()
    {
        $fecha = "";
        $registro = date('m');
        if($registro >= 7){
            $fecha = "II-2021";
        }else{
            $fecha = "I-2021";
        }
        return $fecha;
        # code...
    }
    public function guardaAlumnos()
    {
        $estado_code = array();
        $registro = new DateTime("now", new DateTimeZone('America/La_Paz'));
		$registro = $registro->format('Y-m-d');
        if(isset($_POST["txtNombre"])){
            $this->password = $_POST["txtCi"];
            $this->nombre = $_POST["txtNombre"];
            $this->sexo = $_POST["txtSexo"];
            $this->grado = 1;
            $this->salon = 1;
            $this->tipo = $_POST["txtTipo"];
            $this->fecha = $_POST["txtFechaNacimiento"];
            $this->doc = $_POST["txtDeposito"];
            $this->ci = $_POST["txtCi"];
            $this->direccion = $_POST["txtDireccion"];
            $this->telefono = $_POST["txtTelefono"];
            $this->estado = "s";
            $this->matricula = $registro;
            $this->unidad_educativa = $_POST["txtUnidad"];
            $this->titulo = "si";
            $this->rol = 3;
            $this->gestion = $this->gestionG();
            $this->intentos = 0;
            $this->correo = $_POST["txtCorreo"];
            $this->extencion = $_POST["txtExtension"];
            $this->ruta = null;
            //para guardar
            $insertado = $this->db->insert('alumnos', $this);
             $estado_code = array("http"=>http_response_code(201),
                                "estado"=>"ok");
			//return $this->db->save_queries;
            return $estado_code;
        }else{
            return $estado_code = array("http"=>http_response_code(500),
                                "estado"=>"mall");
        }

        # code...
    }

    public function loginAlumnos()
    {
        # code...
        $this->correo = $_POST['correo'];
        $this->password = $_POST['password'];
        $this->db->select('*');
        $array = array('correo' => $this->correo, 'password' => $this->password);
        $this->db->where($array);
        $query = $this->db->get('alumnos');
        return $query->custom_row_object(0,'Model_alumnos');

    }

    public function filtroCiAlumnos()
    {
        # code...
        $this->ci = $_POST['txtCiFiltro'];
        $this->db->select('*');
        //$array = array('ci' => $this->ci, 'nombre' => $this->ci);
        $this->db->where('ci =', $this->ci);
        $this->db->or_where('nombre =', $this->ci);
        $query = $this->db->get('alumnos');
        return $query->custom_row_object(0,'Model_alumnos');

    }
    public function listarActivos_alumnos()
    {
        $respuestaTotal = array();
        $respuestaTotalAlumnos = array();
        $activos = array();
        $inactivos = array();
        //$grado = $_POST[];
        $grado = 1;
        # code...
        $this->db->select('*');
        $array = array('grado' => $grado);
        $this->db->where($array);
        $query = $this->db->get('alumnos');
        //return $query->result();
        $respuesta = $query->result();
        foreach ($respuesta as $respuestas) {
            # code...
            if($respuestas->estado == "s"){
                $activos []  = array('nombre' => $respuestas->nombre,
                                    'direccion' => $respuestas->direccion);
            }
            if($respuestas->estado == "n"){
                $inactivos []  = array('nombre' => $respuestas->nombre,
                                    'estado' => $respuestas->estado);
            }
            // $respuestaTotalAlumnos [] =  array('nombre' => $respuestas->nombre ,
            //                             'grado' => $respuestas->grado);
        }
        $respuestaTotal  = array('activos' => $activos,
                                'inactivo' => $inactivos);
        return $activos;
    }

    public function listarInactivos_alumnos()
    {
        $respuestaTotal = array();
        $respuestaTotalAlumnos = array();
        $activos = array();
        $inactivos = array();
        //$grado = $_POST[];
        $grado = 1;
        # code...
        $this->db->select('*');
        $array = array('grado' => $grado);
        $this->db->where($array);
        $query = $this->db->get('alumnos');
        //return $query->result();
        $respuesta = $query->result();
        foreach ($respuesta as $respuestas) {
            # code...
            if($respuestas->estado == "s"){
                $activos []  = array('nombre' => $respuestas->nombre,
                                    'direccion' => $respuestas->direccion);
            }
            if($respuestas->estado == "n"){
                $inactivos []  = array('nombre' => $respuestas->nombre,
                                    'estado' => $respuestas->estado);
            }
            // $respuestaTotalAlumnos [] =  array('nombre' => $respuestas->nombre ,
            //                             'grado' => $respuestas->grado);
        }
        $respuestaTotal  = array('activos' => $activos,
                                'inactivo' => $inactivos);
        return $inactivos;
    }

    public function listarAlumnos()
    {
        $respuestaTotal = array();
        $respuestaTotalAlumnos = array();
        $activos = array();
        $inactivos = array();
        //$grado = $_POST[];
        $grado = 1;
        # code...
        $this->db->select('*');
        $array = array('grado' => $grado);
        $this->db->where($array);
        $query = $this->db->get('alumnos');
        //return $query->result();
        $respuesta = $query->result();
        foreach ($respuesta as $respuestas) {
            # code...
            
            $respuestaTotalAlumnos [] =  array('nombre' => $respuestas->nombre,
                                        'grado' => $respuestas->grado,
                                    'fechaNaciemto' => $respuestas->fecha);
        }
       
        return $respuestaTotalAlumnos;
    }
    
   
}


?>