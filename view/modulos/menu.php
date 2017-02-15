<?php require_once 'config/global.php';?> 

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">  <p> <strong> <?php echo CLIENTE?>  </strong>  </p>
</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?controller=Usuarios&action=loguear"><span class="glyphicon glyphicon-home" ><?php echo " Inicio" ;?></span> <span class="sr-only">(current)</span></a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-modal-window" ><?php echo " Administración" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
        	<li><a href="index.php?controller=Categorias&action=index">Categorias</a>
		    </li>
			<li><a href="index.php?controller=SubCategorias&action=index">Subcategorias</a>
			</li>
			<li><a href="index.php?controller=TiposDocumentos&action=index">Tipos de Documentos</a>
			</li>
			<li><a href="index.php?controller=CartonDocumentos&action=index">Cartones de Documentos</a>
			</li>
			<li><a href="index.php?controller=ClienteProveedor&action=index">Clientes / Proveedores</a>
			</li>
			<li role="separator" class="divider"></li>
			
        	<li><a href="index.php?controller=Usuarios&action=index">Usuarios</a>
		    </li>
			<li><a href="index.php?controller=Roles&action=index">Roles de Usuario</a>
			</li>
			<li><a href="index.php?controller=PermisosRoles&action=index">Permisos Roles</a>
			</li>
		    <li><a href="index.php?controller=RegistroCartonDocumentos&action=index">Registro de Cartones</a>
			</li>
		
	          
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file" ><?php echo " Busquedas" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
			<li><a href="index.php?controller=Documentos&action=index">Busqueda de Documentos</a>
			</li>
			<li><a href="index.php?controller=DocumentosClienteProveedor&action=index">Busqueda Categorias + Cliente / Proveedor</a>
			</li>
			<li><a href="index.php?controller=DocumentosTipoDocumentos&action=index">Busqueda Categorias + Tipo Documentos</a>
			</li>
	        <li><a href="index.php?controller=DocumentosCartonDocumentos&action=index">Busqueda Categorias + Carton Documentos</a>
			</li>
			<li><a href="index.php?controller=DocumentosNumeroCredito&action=index">Busqueda Categorias + Numero de Credito</a>
			</li>
			
			
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-print	" ><?php echo " Informes" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
        	<li><a href="index.php?controller=Categorias&action=ReporteTotal" target="blank">TOTAL - Documentos por Categorías</a>
			</li>
			<li><a href="index.php?controller=SubCategorias&action=ReporteTotal" target="blank">TOTAL - Documentos por SubCategorías</a>
			</li>
			
			<li><a href="index.php?controller=Categorias&action=ReporteTotal1" target="blank">ETAPA I - Documentos por Categorías</a>
			</li>
			<li><a href="index.php?controller=SubCategorias&action=ReporteTotal1" target="blank">ETAPA I - Documentos por SubCategorías </a>
			</li>
			
			<li><a href="index.php?controller=Categorias&action=ReporteTotal2" target="blank">ETAPA II - Documentos por Categorías</a>
			</li>
			<li><a href="index.php?controller=SubCategorias&action=ReporteTotal2" target="blank">ETAPA II - Documentos por SubCategorías</a>
			</li>
			
			<li><a href="index.php?controller=Documentos&action=BuscaxCarton" >Documentos por Cartón</a>
			</li>
			
			<li><a href="index.php?controller=Documentos&action=BuscaxCartonTarjetas" >Documentos por Cartón Tarjetas</a>
			</li>
			<li role="separator" class="divider"></li>
			
			<li><a href="index.php?controller=CartonDocumentos&action=ReporteTotal" >TOTAL - Listado de Cartones Registrados</a>
			</li>
			<li><a href="index.php?controller=CartonDocumentos&action=ReporteTotal1" >ETAPA I - Listado de Cartones Registrados</a>
			</li>
			<li><a href="index.php?controller=CartonDocumentos&action=ReporteTotal2" >ETAPA 2 - Listado de Cartones Registrados</a>
			</li>
			
			
	        <li role="separator" class="divider"></li>
           <li><a href="index.php?controller=ErroresImportacion&action=index" target="blank">Errores de Importación</a>
		    </li>
		
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-modal-window" ><?php echo " Utilitarios" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?controller=CartonImpreso&action=index">Impresión de Etiqueta de Cartón</a>
			</li>
			<li><a href="index.php?controller=Documentos&action=ActualizarDocumentos">Actualizar Documentos</a>
			</li>
			<li><a href="index.php?controller=BuscadorBanco&action=index">Buscador en Base del Banco</a>
			</li>
		  </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-modal-window" ><?php echo " Control" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?controller=CartonDocumentos&action=cierre">Cierre de Cartones</a>
			</li>
			<li><a href="index.php?controller=ProduccionMaquinas&action=index">Produccion Maquinas</a>
			</li>
		  </ul>
        </li>
        
        
        
      </ul>
      
      	<form class="navbar-form navbar-right" role="search"    action="<?php echo $helper->url("Documentos","Buscador");?>"  method="post" >
  		
			  		<div class="input-group">
					  <div class="input-group-addon">
					      		<select id="criterio_etapa" style="font-size:90%;"   name="criterio_etapa" class="form-control">
									<option value="0"  > --TODOS--</option>
									<option value="1"  >Etapa I</option>
									<option value="2"  >Etapa II</option>
								</select>
						
							<input type="text" class="form-control" name="contenido_busqueda" id="criterio_busqueda" placeholder="texto a buscar">
							<select id="criterio_busqueda" name="criterio_busqueda" style="font-size:90%;" class="form-control">
										<option value="0"  > --TODOS--</option>
										<option value="1"  >Ruc Cliente/Proveedor</option>
										<option value="2"  >Nombre Cliente/Proveedor</option>
										<option value="3"  >Número Carton</option>
										<option value="4"  >Número de Tarjeta</option>
										<option value="5"  >Número de Documento</option>
										<option value="6"  >Ciudad Emisión</option>
										<option value="7"  >Tipo de Documento</option>
										<option value="8"  >Nombre Emision</option>
										<option value="10"  >Número de Cheque</option>
										<option value="11"  >Id Documento - Solo Numeros</option>
										<option value="12"  >Asunto</option>
										<option value="13"  >Nombre Remitente</option>
										<option value="14"  >Nombre Destinatario</option>
										<option value="15"  >Numero de Control</option>
										
							 </select>
							
							
							<button type="submit"  style="font-size:90%;"  name="btn_buscar" class="btn btn-default"><span class="glyphicon glyphicon-search	" ><?php echo " Buscar" ;?> </span></button>	
							
					  </div>
					  	
					</div>
			  		
			  		
			  		
			  		
			  		
			      </form>
		
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>