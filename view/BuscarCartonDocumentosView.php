<!DOCTYPE HTML>
<html lang="es">
     <head>
        <meta charset="utf-8"/>
        <title>Cartones de Documentos - aDocument 2015</title>
   
       <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
                
            
        </style>
    </head>
      <body style="background-color: #F6FADE">
    
       <?php include("view/modulos/head.php"); ?>
       
       <?php include("view/modulos/menu.php"); ?>
  
    <div class="container">
      <div class="row" style="background-color: #FAFAFA;">
      
      <form action="<?php echo $helper->url("Documentos","BuscaxCarton"); ?>" method="post" class="col-lg-3">
            <h4 style="color:#ec971f;">Búsque da Contenido de Cartón de Documentoes</h4>
            <hr/>
            
            
		    Número: <input type="text" name="numero_carton_documentos" value="" class="form-control"/>
		    
		        
           <input type="submit" value="Buscar" class="btn btn-success"/>
  
    
  			<?php  $paginas =   0;  ?>
		    <?php  $registros = 0; ?>
		    <?php  $numero_carton_documentos = 0; ?>
	  		<?php if ($resultSet !="") { foreach($resultSet as $res) {?>
	        		
		                 <?php $numero_carton_documentos =  $res->numero_carton_documentos; ?>     
		    	       
		            		 <?php  $paginas = $paginas + $res->paginas_documentos_legal;  ?>
		                     <?php  $registros = $registros + 1 ; ?>
		        <?php } ?>
				   <table class="table">
				        <tr>
				    		<th>Resúmen del Cartón: <?php echo $numero_carton_documentos  ?>    </th>
				  		</tr>
			    		<tr>
			    			<td> <p class="text-justify">  <strong> Se encontraton <?php echo $registros?> documentos, los cuales contienen un total de <?php echo $paginas ?> páginas.  </strong> Recuerde revisar estos documentos antes de imprimir el reporte final </p> </td>
			    		</tr>
			    
			    
			     	</table>
  	
  	        
				<?php    }   else {?>
		        
		            
		        <?php }  ?>
            
  
         
       </form>
       
       
        <div class="col-lg-9">
            <h4 style="color:#ec971f;">Documentos Contenidos en este Cartón</h4>
            <hr/>
        </div>
       
        <section class="col-lg-9 usuario" style="height:400px;overflow-y:scroll;">
	    <table class="table">
	         <tr>
	    		<th  style="color:#456789;font-size:80%;" >Id</th>
	    		<th style="color:#456789;font-size:80%;" >Fecha del Documento</th>
	    		<th style="color:#456789;font-size:80%;">Subcategoria</th>
	    		<th style="color:#456789;font-size:80%;" >RUC Cliente</th>
	    		<th style="color:#456789;font-size:80%;" >Nombre Cliente</th>
				<th style="color:#456789;font-size:80%;" ># Documento</th>
	    		<th style="color:#456789;font-size:80%;" ># Cheque</th>
				<th style="color:#456789;font-size:80%;" ># Control</th>
				<th style="color:#456789;font-size:80%;" >Nombre Emision</th>
				<th style="color:#456789;font-size:80%;" >Nombre Remitente</th>
				<th style="color:#456789;font-size:80%;" >Páginas </th>
	    		
	    		<th></th>
	    		<th></th>
	    		
	  		</tr>
            
			<?php  $paginas =   0;  ?>
		    <?php  $registros = 0; ?>
		    <?php  $numero_carton_documentos = 0; ?>
	  		<?php if ($resultSet !="") { foreach($resultSet as $res) {?>
	        		<tr>
	                   <td style="color:#456789;font-size:80%;" > <?php echo $res->id_documentos_legal; ?>  </td>
	                   <td style="color:#456789;font-size:80%;" > <?php echo $res->fecha_documentos_legal; ?>  </td>
		               <td style="color:#456789;font-size:80%;" > <?php echo $res->nombre_subcategorias; ?>  </td>
		               <td style="color:#456789;font-size:80%;" > <?php echo $res->ruc_cliente_proveedor; ?>     </td>
		               <td style="color:#456789;font-size:80%;"> <?php echo $res->nombre_cliente_proveedor; ?>     </td>
		               <?php $numero_carton_documentos =  $res->numero_carton_documentos; ?>     
					   <td style="color:#456789;font-size:80%;" > <?php echo $res->numero_documentos_legal; ?>     </td> 	
					   <td style="color:#456789;font-size:80%;" > <?php echo $res->numero_cheque_documento_legal; ?>     </td> 	
						<td style="color:#456789;font-size:80%;" > <?php echo $res->nombre_emision_documentos_legal; ?>     </td> 	
						<td style="color:#456789;font-size:80%;" > <?php echo $res->nombre_remitente_documentos_legal; ?>     </td> 						   
					   <td style="color:#456789;font-size:80%;" > <?php echo $res->numero_control_documentos_legal; ?>     </td> 						   
					   
					   
					   
					   
		    	       <td style="color:#456789;font-size:80%;" > <?php echo $res->paginas_documentos_legal; ?>     </td>
		    	       
		            		 <?php  $paginas = $paginas + $res->paginas_documentos_legal;  ?>
		                     <?php  $registros = $registros + 1 ; ?>
		    
		                 <td>
			           		<div class="right">
			            
			                    <?php  if ($_SESSION["tipo_usuario"]=="usuario_local") {  ?>
			            		 	  <a href=" <?php echo IP_INT . $res->id_documentos_legal; ?>  " class="btn btn-warning" target="blank">Ver</a>
			            		 <?php } else {?>
			            		 	  <a href=" <?php echo IP_INT . $res->id_documentos_legal; ?>  " class="btn btn-warning" target="blank">Ver</a>
			            		 <?php }?>
			                      			                                </div>
			            
			                </div>
			            
			             </td>
			             <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("Documentos","index"); ?>&id_documentos_legal=<?php echo $res->id_documentos_legal; ?>" class="btn btn-info">Editar</a>
			            
			                </div>
			            
			             </td>
			             
		    		</tr>
		    		
		           	  
		        <?php } ?>

					<tr> 
				         <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("Documentos","ReportexCarton	"); ?>&numero_carton_documentos=<?php echo $numero_carton_documentos; ?>" class="btn btn-info">Imprimir Reporte</a>
			                </div>
			             </td>
			    
					</tr>	    
					
				<?php    }   else {?>
		        
		            
		        <?php }  ?>
            
       	</table>
         <hr>	    		

      </section>
	 <hr>	    		
<hr>	    				 
	  </div>
       </div>
  
         <footer class="col-lg-12">
           <?php include("view/modulos/footer.php"); ?>
        </footer>
     </body>  
    </html>    