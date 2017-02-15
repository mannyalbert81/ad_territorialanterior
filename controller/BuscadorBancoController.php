<?php

class BuscadorBancoController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}



	public function index(){

		session_start();
		
		$documentos_legal = new DocumentosLegalModel();
		
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			$nombre_controladores = "BuscadorBanco";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $documentos_legal->getPermisosVer("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			if (!empty($resultPer))
			{
					
			   $banco_tarjetas = new BancoTarjetasModel();
			   $banco_cuentas = new BancoCuentasModel();
			   
				
			   $resultCuentas = "";
			   $resultTarjetas = "";
			   
				
		
				
				if (isset ($_POST["identificacion_cliente"])    )
				
				{
					
					$_identificacion = $_POST["identificacion_cliente"];
					
					//lenamos las cuentas
					$resultCuentas = $banco_cuentas->getBy(" identificacion_banco_cuentas = '$_identificacion'  ");
					
					//llnamos las tarjetas
					$resultTarjetas = $banco_tarjetas->getBy(" identificacion_banco_tarjetas = '$_identificacion'  ");
						
					
				
						
				}
			
				
				$this->view("BuscadorBanco",array(
						"resultCuentas"=>$resultCuentas, "resultTarjetas"=>$resultTarjetas
							
				));
				
				

			}
			else
			{
				$this->view("Error",array(
					"resultado"=>"No tiene Permisos de Acceso a Busqueda de Documentos 1 "
					));
					exit();
			}
				
		}
		else 
		{
				$this->view("ErrorSesion",array(
					"resultSet"=>""
						));
				
		}
	
	}
	
		
}

?>