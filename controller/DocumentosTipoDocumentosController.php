<?php

class DocumentosTipoDocumentosController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}



	public function index(){

		session_start();
		
		$documentos_legal = new DocumentosLegalModel();
		
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			$nombre_controladores = "Documentos";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $documentos_legal->getPermisosVer("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			if (!empty($resultPer))
			{
			
				$registrosTotales = 0;
				$hojasTotales = 0;
					
					// Categorias
				$categorias=new CategoriasModel();
				$resultCat=$categorias->getAll("nombre_categorias");
				
				
				$subcategorias=new SubCategoriasModel();
				$resultSub=$subcategorias->getAll("nombre_subcategorias");
				
				//Tipo de Documento
				$tipo_documentos=new TipoDocumentosModel();
				$columnas_td = " tipo_documentos.id_tipo_documentos, tipo_documentos.nombre_tipo_documentos";
				$tablas_td   = " public.documentos_legal, public.tipo_documentos";
				$where_td  = " tipo_documentos.id_tipo_documentos = documentos_legal.id_tipo_documentos GROUP BY tipo_documentos.nombre_tipo_documentos, tipo_documentos.id_tipo_documentos";
				$id_td = " tipo_documentos.nombre_tipo_documentos";
				$resultTip=$tipo_documentos->getCondiciones($columnas_td, $tablas_td, $where_td, $id_td);;
				
		         
				//documentos Legl
				
				
				$resultEdit = "";
				$resul = "";
		
				if (isset ($_GET["id_documentos_legal"])   )
				{
					$nombre_controladores = "Documentos";
					$id_rol= $_SESSION['id_rol'];
					$resultPer = $documentos_legal->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
					if (!empty($resultPer))
					{
						$_id_documentos_legal = $_GET["id_documentos_legal"];
						$resultEdit = $documentos_legal->getBy("id_documentos_legal = '$_id_documentos_legal'     ");
						
					}
					else
					{
						$this->view("Error",array(
								"resultado"=>"No tiene Permisos de Editar a Documentos"
					
						));
					
						exit();
					}
						
				}
		
				
					
				
				
				
				if (isset ($_POST["categorias"]) && isset ($_POST["subcategorias"]) && isset($_POST["tipo_documentos"]) && isset($_POST["fecha_documento_desde"]) && isset($_POST["fecha_documento_hasta"])  && isset($_POST["fecha_subida_desde"])  && isset($_POST["fecha_subida_hasta"])   )
				
				{
					
					///creo el array con los valores seleccionados
		
					
					$arraySel = "";
				  
					$columnas = "documentos_legal.id_documentos_legal,  documentos_legal.fecha_documentos_legal, categorias.nombre_categorias, subcategorias.nombre_subcategorias, tipo_documentos.nombre_tipo_documentos, cliente_proveedor.nombre_cliente_proveedor, cliente_proveedor.ruc_cliente_proveedor,carton_documentos.numero_carton_documentos, documentos_legal.paginas_documentos_legal, documentos_legal.fecha_desde_documentos_legal, documentos_legal.fecha_hasta_documentos_legal, documentos_legal.ramo_documentos_legal, documentos_legal.numero_poliza_documentos_legal, documentos_legal.ciudad_emision_documentos_legal, soat.cierre_ventas_soat,   documentos_legal.creado , tarjetas.numero_tarjetas, cuentas_bancarias.numero_cuentas_bancarias "; 
					$tablas   = "public.documentos_legal, public.categorias, public.subcategorias, public.tipo_documentos, public.carton_documentos, public.cliente_proveedor, public.soat, public.tarjetas, public.cuentas_bancarias";
					$where    = "categorias.id_categorias = subcategorias.id_categorias AND subcategorias.id_subcategorias = documentos_legal.id_subcategorias AND tipo_documentos.id_tipo_documentos = documentos_legal.id_tipo_documentos AND carton_documentos.id_carton_documentos = documentos_legal.id_carton_documentos AND cliente_proveedor.id_cliente_proveedor = documentos_legal.id_cliente_proveedor   AND documentos_legal.id_soat = soat.id_soat AND tarjetas.id_tarjetas = documentos_legal.id_tarjetas AND cuentas_bancarias.id_cuentas_bancarias = documentos_legal.id_cuentas_bancarias ";
					$id       = "documentos_legal.fecha_documentos_legal, carton_documentos.numero_carton_documentos";
					
					$documentos = new DocumentosLegalModel();
					$where_1 = "";
					$where_2 = "";
					$where_3 = "";
					$where_4 = "";
					$where_8 = "";
					$where_9 = "";
					$where_10 = "";
					$where_11 = "";
					$where_12 = "";
					$where_13 = "";
						
					
					
					$_id_categorias = $_POST["categorias"];
					$_id_subcategorias = $_POST["subcategorias"];
					$_id_tipo_documentos = $_POST["tipo_documentos"];
					$_year     = 	$_POST["year"];
					
					$_fecha_documento_desde = $_POST["fecha_documento_desde"];
					$_fecha_documento_hasta = $_POST["fecha_documento_hasta"];
					$_fecha_subida_desde = $_POST["fecha_subida_desde"];
					$_fecha_subida_hasta = $_POST["fecha_subida_hasta"];
						
		        	if ($_id_categorias > 0)
					{
		
						$where_1 =  " AND categorias.id_categorias = '$_id_categorias' ";
						
					}
					
					if ($_id_subcategorias > 0)
					{
					
						$where_2 = " AND subcategorias.id_subcategorias = '$_id_subcategorias' ";
					
					}
					if ($_id_tipo_documentos > 0)
					{
						
						$where_4 = " AND tipo_documentos.id_tipo_documentos = '$_id_tipo_documentos' ";
					}	
					if ($_fecha_documento_desde != "" && $_fecha_documento_hasta != "")
					{
						$where_8 = " AND documentos_legal.fecha_documentos_legal BETWEEN '$_fecha_documento_desde' AND '$_fecha_documento_hasta'  ";
					}
		
					if ($_fecha_subida_desde != "" && $_fecha_subida_hasta != "")
					{
						$where_9 = " AND documentos_legal.creado BETWEEN '$_fecha_subida_desde' AND '$_fecha_subida_hasta'  ";
					}
					
					
					$where_to  = $where . $where_1 . $where_2 . $where_3 . $where_4  . $where_8 . $where_9 . $where_10. $where_11. $where_12. $where_13;
					
					//Conseguimos todos los usuarios
					
					//$resul = $where_to;
					$resultSet=$documentos->getCondiciones($columnas ,$tablas ,$where_to, $id);
					
					foreach($resultSet as $res) 
					{
						$hojasTotales =  $hojasTotales + $res->paginas_documentos_legal;
						$registrosTotales = $registrosTotales + 1 ;
					}
					
			
				
				
				}
			
			
			
			
			else 
			{
			//$arraySel = array();
				$registrosTotales = 0;
				$hojasTotales = 0;
					
			
			$arraySel = "";
			$resultSet = "";
			}
		
		
			///aqui va la paginacion  ///
			$articulosTotales = 0;
			$paginasTotales = 0;
			$paginaActual = 0;
			
			if(isset($_POST["pagina"])){
				
				// en caso que haya datos, los casteamos a int
				$paginaActual = (int)$_POST["pagina"];
			}
				
			
			if ($resultSet != "")
			{
					
					foreach($resultSet as $res)
					{
						$articulosTotales = $articulosTotales + 1;
					}
						
						
					$articulosPorPagina = 50;
						
					$paginasTotales = ceil($articulosTotales / $articulosPorPagina);
				
						
					// el número de la página actual no puede ser menor a 0
					if($paginaActual < 1){
						$paginaActual = 1;
					}
					else if($paginaActual > $paginasTotales){ // tampoco mayor la cantidad de páginas totales
						$paginaActual = $paginasTotales;
					}
						
					// obtenemos cuál es el artículo inicial para la consulta
					$articuloInicial = ($paginaActual - 1) * $articulosPorPagina;
						
					//agregamos el limit
					$limit = " LIMIT   '$articulosPorPagina' OFFSET '$articuloInicial'";
						
					//volvemos a pedir el resultset con la pginacion
						
					$resultSet=$documentos->getCondicionesPag($columnas ,$tablas ,$where_to,  $id, $limit );
						
					
			
			}
			
			
			
			if (isset ($_POST["btnGuardar"])  && isset($_POST["id_documentos_legal"]) )
			{
					
			
			
				$nombre_controladores = "Documentos";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $documentos_legal->getPermisosEditar(" controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
				if (!empty($resultPer))
				{
			
			
			
					$resul = "";
			
			
					
					$columnas = "documentos_legal.id_documentos_legal,  documentos_legal.fecha_documentos_legal, categorias.nombre_categorias, subcategorias.nombre_subcategorias, tipo_documentos.nombre_tipo_documentos, cliente_proveedor.nombre_cliente_proveedor, cliente_proveedor.ruc_cliente_proveedor,carton_documentos.numero_carton_documentos, documentos_legal.paginas_documentos_legal, documentos_legal.fecha_desde_documentos_legal, documentos_legal.fecha_hasta_documentos_legal, documentos_legal.ramo_documentos_legal, documentos_legal.numero_poliza_documentos_legal, documentos_legal.ciudad_emision_documentos_legal, soat.cierre_ventas_soat,   documentos_legal.creado , tarjetas.numero_tarjetas, cuentas_bancarias.numero_cuentas_bancarias "; 
					$tablas   = "public.documentos_legal, public.categorias, public.subcategorias, public.tipo_documentos, public.carton_documentos, public.cliente_proveedor, public.soat, public.tarjetas, public.cuentas_bancarias";
					$where    = "categorias.id_categorias = subcategorias.id_categorias AND subcategorias.id_subcategorias = documentos_legal.id_subcategorias AND tipo_documentos.id_tipo_documentos = documentos_legal.id_tipo_documentos AND carton_documentos.id_carton_documentos = documentos_legal.id_carton_documentos AND cliente_proveedor.id_cliente_proveedor = documentos_legal.id_cliente_proveedor   AND documentos_legal.id_soat = soat.id_soat AND tarjetas.id_tarjetas = documentos_legal.id_tarjetas AND cuentas_bancarias.id_cuentas_bancarias = documentos_legal.id_cuentas_bancarias ";
					$id       = "documentos_legal.fecha_documentos_legal, carton_documentos.numero_carton_documentos";
					
					$_id_documentos_legal = $_POST["id_documentos_legal"];
					$_id_tipo_documentos = $_POST["tipo_documentos"];
			
					$_fecha_documento_desde = $_POST["fecha_documento_desde"];
					$_fecha_documento_hasta = $_POST["fecha_documento_hasta"];
					$_fecha_subida_desde = $_POST["fecha_subida_desde"];
					$_fecha_subida_hasta = $_POST["fecha_subida_hasta"];
					$_fecha_poliza_desde = $_POST["fecha_poliza_desde"];
					$_fecha_poliza_hasta = $_POST["fecha_poliza_hasta"];
			
			
						
					////guardamos en caso de que esten todos seleccionados
					if ( $_fecha_documento_desde != "" AND $_id_documentos_legal > 0 )
					{
			
							
			
						$colval = "id_documentos_legal = '$_id_documentos_legal', id_tipo_documentos = '$_id_tipo_documentos', fecha_documentos_legal = '$_fecha_documento_desde' , fecha_desde_documentos_legal = '$_fecha_poliza_desde', fecha_hasta_documentos_legal = '$_fecha_poliza_hasta' ";
						$tabla = "documentos_legal";
						$where_update = "id_documentos_legal = '$_id_documentos_legal' ";
			
						$documentos_legal=new DocumentosLegalModel();
			
						$documentos_legal->UpdateBy($colval, $tabla, $where_update);
			
							
					}
						
			
			
			
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Editar a Documentos"
		
					));
					exit();
			
				}
			
			
			
			}   ///termina if guardar
						
			
			
			
				$this->view("DocumentosTipoDocumentos",array(
						"resultCat"=>$resultCat, "resultSub"=>$resultSub, "resultTip"=>$resultTip, "resultSet"=>$resultSet, "arraySel"=>$arraySel, "resultEdit"=>$resultEdit, "resul"=>$resul  , "paginasTotales"=>$paginasTotales, "registrosTotales"=> $registrosTotales,"hojasTotales"=>$hojasTotales, "pagina_actual"=>$paginaActual
					 
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

	public function buscar()
	{
		require_once 'config/global.php';
	
		session_start();
	
		$documentos_legal = new DocumentosLegalModel();
	
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			$nombre_controladores = "Documentos";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $documentos_legal->getPermisosVer("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
	
			if (!empty($resultPer))
			{
				if (isset ($_POST["categorias"]) && isset ($_POST["subcategorias"]) && isset($_POST["tipo_documentos"]) && isset($_POST["fecha_documento_desde"]) && isset($_POST["fecha_documento_hasta"])  && isset($_POST["fecha_subida_desde"])  && isset($_POST["fecha_subida_hasta"])   )
				{
					
					///creo el array con los valores seleccionados
		
					
					$arraySel = "";
				    
					$columnas = "documentos_legal.id_documentos_legal,  documentos_legal.fecha_documentos_legal, categorias.nombre_categorias, subcategorias.nombre_subcategorias, tipo_documentos.nombre_tipo_documentos, cliente_proveedor.nombre_cliente_proveedor, cliente_proveedor.ruc_cliente_proveedor,carton_documentos.numero_carton_documentos, documentos_legal.paginas_documentos_legal, documentos_legal.fecha_desde_documentos_legal, documentos_legal.fecha_hasta_documentos_legal, documentos_legal.ramo_documentos_legal, documentos_legal.numero_poliza_documentos_legal, documentos_legal.ciudad_emision_documentos_legal, soat.cierre_ventas_soat,   documentos_legal.creado , tarjetas.numero_tarjetas, cuentas_bancarias.numero_cuentas_bancarias, lecturas.nombre_lecturas,
				    		documentos_legal.etapa_documentos_legal, 
							  documentos_legal.numero_documentos_legal, 
							  documentos_legal.numero_cheque_documento_legal, 
							  documentos_legal.nombre_emision_documentos_legal, 
							  documentos_legal.asunto_documentos_legal, 
							  documentos_legal.nombre_remitente_documentos_legal, 
							  documentos_legal.nombre_destinatario_documentos_legal, 
							  documentos_legal.numero_control_documentos_legal"; 
					$tablas   = "public.documentos_legal, public.categorias, public.subcategorias, public.tipo_documentos, public.carton_documentos, public.cliente_proveedor, public.soat, public.tarjetas, public.cuentas_bancarias, public.lecturas";
					$where    = "categorias.id_categorias = subcategorias.id_categorias AND subcategorias.id_subcategorias = documentos_legal.id_subcategorias AND tipo_documentos.id_tipo_documentos = documentos_legal.id_tipo_documentos AND carton_documentos.id_carton_documentos = documentos_legal.id_carton_documentos AND cliente_proveedor.id_cliente_proveedor = documentos_legal.id_cliente_proveedor   AND documentos_legal.id_soat = soat.id_soat AND tarjetas.id_tarjetas = documentos_legal.id_tarjetas AND cuentas_bancarias.id_cuentas_bancarias = documentos_legal.id_cuentas_bancarias AND documentos_legal.id_lecturas = lecturas.id_lecturas";
					$id       = "documentos_legal.fecha_documentos_legal, carton_documentos.numero_carton_documentos";
					
					
					$documentos = new DocumentosLegalModel();
					$where_1 = "";
					$where_2 = "";
					$where_3 = "";
					$where_4 = "";
					$where_8 = "";
					$where_9 = "";
					$where_10 = "";
					$where_11 = "";
					$where_12 = "";
					$where_13 = "";
						
					
					
					$_id_categorias = $_POST["categorias"];
					$_id_subcategorias = $_POST["subcategorias"];
					$_id_tipo_documentos = $_POST["tipo_documentos"];
					$_year     = 	$_POST["year"];
					
					$_fecha_documento_desde = $_POST["fecha_documento_desde"];
					$_fecha_documento_hasta = $_POST["fecha_documento_hasta"];
					$_fecha_subida_desde = $_POST["fecha_subida_desde"];
					$_fecha_subida_hasta = $_POST["fecha_subida_hasta"];
						
		        	if ($_id_categorias > 0)
					{
		
						$where_1 =  " AND categorias.id_categorias = '$_id_categorias' ";
						
					}
					
					if ($_id_subcategorias > 0)
					{
					
						$where_2 = " AND subcategorias.id_subcategorias = '$_id_subcategorias' ";
					
					}
					if ($_id_tipo_documentos > 0)
					{
						
						$where_4 = " AND tipo_documentos.id_tipo_documentos = '$_id_tipo_documentos' ";
					}	
					if ($_fecha_documento_desde != "" && $_fecha_documento_hasta != "")
					{
						$where_8 = " AND documentos_legal.fecha_documentos_legal BETWEEN '$_fecha_documento_desde' AND '$_fecha_documento_hasta'  ";
					}
		
					if ($_fecha_subida_desde != "" && $_fecha_subida_hasta != "")
					{
						$where_9 = " AND documentos_legal.creado BETWEEN '$_fecha_subida_desde' AND '$_fecha_subida_hasta'  ";
					}
					
					
					$where_to  = $where . $where_1 . $where_2 . $where_3 . $where_4  . $where_8 . $where_9 . $where_10. $where_11. $where_12. $where_13;
					
	
					//$resul = $where_to;
					//$resultSet=$documentos->getCondiciones($columnas ,$tablas ,$where_to, $id);
					$resultSet=$documentos->getCantidad("*", $tablas, $where_to);
						
					$html="";
					$cantidadResult=0;
						
					$cantidadResult=(int)$resultSet[0]->total;
						
					$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
						
					if($action == 'ajax')
					{
	
						$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	
						$per_page = 50; //la cantidad de registros que desea mostrar
						$adjacents  = 9; //brecha entre páginas después de varios adyacentes
						$offset = ($page - 1) * $per_page;
	
						$limit = " LIMIT   '$per_page' OFFSET '$offset'";
	
	
						$resultSet=$documentos->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
	
						$count_query   = $cantidadResult;
	
						$total_pages = ceil($cantidadResult/$per_page);
	
						if ($cantidadResult>0)
						{
							require_once 'view/modulos/Tabla.php';
						}else{
	
							$html.='<div class="alert alert-warning alert-dismissable">';
							$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
							$html.='</div>';
	
						}
	
						echo $html;
							
	
					}
						
	
				}
	
			}
		}
	}
	
	
	//<input type="button" id="btnBuscar" name="btnBuscar" value="Buscar" class="btn btn-warning " />
	
	public function paginate($reload, $page, $tpages, $adjacents) {
	
		$prevlabel = "&lsaquo; Prev";
		$nextlabel = "Next &rsaquo;";
		$out = '<ul class="pagination pagination-large">';
	
		// previous label
	
		if($page==1) {
			$out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
		} else if($page==2) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_DocumentosTipoDoc(1)'>$prevlabel</a></span></li>";
		}else {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_DocumentosTipoDoc(".($page-1).")'>$prevlabel</a></span></li>";
	
		}
	
		// first label
		if($page>($adjacents+1)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_DocumentosTipoDoc(1)'>1</a></li>";
		}
		// interval
		if($page>($adjacents+2)) {
			$out.= "<li><a>...</a></li>";
		}
	
		// pages
	
		$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
		$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
		for($i=$pmin; $i<=$pmax; $i++) {
			if($i==$page) {
				$out.= "<li class='active'><a>$i</a></li>";
			}else if($i==1) {
				$out.= "<li><a href='javascript:void(0);' onclick='load_DocumentosTipoDoc(1)'>$i</a></li>";
			}else {
				$out.= "<li><a href='javascript:void(0);' onclick='load_DocumentosTipoDoc(".$i.")'>$i</a></li>";
			}
		}
	
		// interval
	
		if($page<($tpages-$adjacents-1)) {
			$out.= "<li><a>...</a></li>";
		}
	
		// last
	
		if($page<($tpages-$adjacents)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_DocumentosTipoDoc($tpages)'>$tpages</a></li>";
		}
	
		// next
	
		if($page<$tpages) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_DocumentosTipoDoc(".($page+1).")'>$nextlabel</a></span></li>";
		}else {
			$out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
		}
	
		$out.= "</ul>";
		return $out;
	}
		


		
	
	
	
}

?>