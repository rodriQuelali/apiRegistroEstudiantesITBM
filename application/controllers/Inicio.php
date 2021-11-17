<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/RestController.php';

class Inicio extends RestController
{
    public function index_get()
	{
		echo "Sistema API-2";
	}

	public function prueba_get()
	{
		echo "Prueba Sistema API-2";
	}
   
}