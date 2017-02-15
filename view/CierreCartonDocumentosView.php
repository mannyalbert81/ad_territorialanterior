<!DOCTYPE HTML>
<html lang="es">
     <head>
        <meta charset="utf-8"/>
        	
   
   
 
	 <script>
	
			$(document).ready(function(){
	
			    $("#ruc_cliente_proveedor").change(function() {
	
			    	///obtengo el id seleccionado
					var id_cliente_proveedor = $(this).val();
	
		               if(id_cliente_proveedor > 0)
		               {
	         		 		$('#nombre_cliente_proveedor').val( id_cliente_proveedor );//To select Blue	 
	         		   }
		               else
		               {
		            		$('#nombre_cliente_proveedor').val( 0 );//To select Blue
				       }
		               
				    });
	
			}); 
	
		</script>
			
			
	    <script>
	
			$(document).ready(function(){
	
			    $("#nombre_cliente_proveedor").change(function() {
	
		               
						///obtengo el id seleccionado
						var id_cliente_proveedor = $(this).val();
	
		               if(id_cliente_proveedor > 0)
	
		               {
	         		 		$('#ruc_cliente_proveedor').val( id_cliente_proveedor );//To select Blue	 
	         		   }
		               else
		               {
		            		$('#ruc_cliente_proveedor').val( 0 );//To select Blue
				       }
		               
				    });
	
			}); 
	
		</script>		
 
 
 
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
      
      <form action="<?php echo $helper->url("CartonDocumentos","Cerrar"); ?>" method="post" class="col-lg-12">
     
     	<br>
   
        <div class="col-lg-12 usuario">
        	<div class="row">
			  	<div class="col-xs-1 col-md-1">
		        	<h5>#</h5>
		        </div>
			  	<div class="col-xs-1 col-md-1">
		        	<h5>Estado</h5>
		        </div>
			
		    	  	<div class="col-xs-3 col-md-3">
		        	<h5>Estado</h5>
		        </div>
			    
		        <div class="col-xs-7 col-md-7">
		               <div class="alert alert-success" role="alert">
							<h4>Total de Cartones: <?php echo count($resultCar)  ;?> Abiertos: <?php echo $cartones_abiertos;?> Cerrados: <?php echo $cartones_cerrados;?></h4>
						</div>
		        		
		        </div>
			  </div>  
        
        </div>
  		 
        	
	
		<section class="col-lg-12 usuario" style="height:410px;overflow-y:scroll;">
				 <?php $registro = 1;?>
				  <?php foreach($resultCar as $res) {?>
					<div class="row" style="margin-top: 5px;">
						  	<div class="col-xs-1 col-md-1">
					        	 	<?php echo  $registro ;?>  
					        </div>
						  	
						  	<div class="col-xs-1 col-md-1">
					        	 	<?php if ($res->estado_carton_documentos == 'f') { ?>
					        	 		<a href="<?php echo $helper->url("CartonDocumentos","cerrar_carton"); ?>&id_carton_documentos=<?php echo $res->id_carton_documentos; ?>" class="btn btn-warning" ><img src="view/images/unlock.png" class="img-responsive" alt="Abierto" id="btnCerrar" name="btnCerrar"   ></a>
					        	 	<?php } else {?>
					        	 	
					        	 		<a href="<?php echo $helper->url("CartonDocumentos","abrir_carton"); ?>&id_carton_documentos=<?php echo $res->id_carton_documentos; ?>" class="btn btn-success" ><img src="view/images/lock.png" class="img-responsive" alt="Cerrado"  id="btnAbrir" name="btnAbrir" ></a>
					        	 	<?php }?>
					        	 	
					        	 	
					        	 	  
					        </div>
						    <div class="col-xs-2 col-md-2">
					        	<input type="text" name="destino_id[]" id="destino_id[]" class="form-control"   value="<?php echo $res->id_carton_documentos; ?>" readonly /> 
					        </div>
						    <div class="col-xs-7 col-md-7">
					        	<input type="text" name="destino_numero[]" id="destino_numero[]" class="form-control"   value="<?php echo $res->numero_carton_documentos;?>" readonly /> 
					        </div>
						    
					    </div>
					 <?php $registro ++?> 	
			        <?php } ?>
		            
		        
		  </section>
		 
              
  </form>
  
  <br>
  <br>
    </div>
    </div>
       
      
         <footer class="col-lg-12">
           <?php include("view/modulos/footer.php"); ?>
        </footer>
     </body>  
    </html>     