<!DOCTYPE HTML>
<html lang="es">
     <head>
    
    
<?php require_once 'config/global.php';?> 
    
        <meta charset="utf-8"/>
        <title>Busqueda - aDocument 2015</title>
   
        		
		

       
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
    <body>
 
 
       <?php include("view/modulos/head.php"); ?>
     
       
       <?php include("view/modulos/menu.php"); ?>
     
      
	
     
      
    
     <hr/>  	
	  <form id="formularioPrincipal" action="<?php echo $helper->url("BuscadorBanco","index"); ?>" method="post" class="form-horizontal">
    
    	<div class="row">
		  <div class="col-sm-4 col-md-4">
		  	 
			  <div class="col-sm-8 col-md-8">
		  	 		<input type="text" name="identificacion_cliente" value="" placeholder="Identificacion del Cliente" class="form-control"    maxlength="13"/> 
		  	  </div>
		  	  <div class="col-sm-4 col-md-4">
		  	  		 <input type="submit" value="Buscar" class="btn btn-success"/>
		  	  </div>
		  	  
			

		      
		  </div>
	  	  <div class="col-sm-4 col-md-4">
		  	  
		  </div>
	
		  <div class="col-sm-4 col-md-4">
		  	  
		  </div>
	
		</div>
    
     </form>  

    
    
    	<section class="col-sm-12" >
    	
    	<div class="panel panel-primary">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Cuentas Banco Territorial</div>
		  <div class="panel-body">
		    <p> Aqui se muestran las cuentas de Ahorro / Corriente que el banco tiene relacionadas a este cliente</p>
		  </div>
		
		  <!-- Table -->
		  <table class="table">
	         <tr>
	    		<th>Id</th>
	    		<th>Numero Cuenta</th>
	    		<th>Identificacion</th>
	    		<th>Nombres Clientes</th>
	    		
	  		</tr>
            
			
	  		<?php if ($resultCuentas !="") { foreach($resultCuentas as $res) {?>
	        		<tr>
	                   <td> <?php echo $res->id_banco_cuentas; ?>  </td>
	                   <td> <?php echo $res->numero_banco_cuentas; ?>  </td>
		               <td> <?php echo $res->identificacion_banco_cuentas; ?>     </td> 
		               <td> <?php echo $res->nombres_banco_cuentas; ?>  </td>
		                       		 
		                     
		    
		                  
		    		</tr>
		  		
		           	  
		        <?php } ?>
	
    
	    		 	
 				<?php  }   else { ?>
		        <?php }  ?>
      	
      		</table>      		

		 </div>
	    
      	</section>       
 
 
 
 
 
 		<section class="col-sm-12" >
    	
		<div class="panel panel-primary">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Tarjetas Banco Territorial</div>
		  <div class="panel-body">
		    <p> Aqui se muestran las Tarjetas que el banco tiene registradas a este cliente</p>
		  </div>
		
		  <!-- Table -->
			<table class="table">
	         <tr>
	    		<th>Id</th>
	    		<th>Tipo de Tarjeta</th>
	    		<th>Numero Tarjeta</th>
	    		<th>Identificacion</th>
	    		<th>Nombres Clientes</th>
				<th>Estado</th>
	    		
	  		</tr>
            <?php// echo $resul  ?>
			<?php  $paginas =   0;  ?>
		    <?php  $registros = 0; ?>
	  		<?php if ($resultTarjetas !="") { foreach($resultTarjetas as $res) {?>
	        		<tr>
	                   <td> <?php echo $res->id_banco_tarjetas; ?>  </td>
	                   <td> <?php echo $res->tipo_banco_tarjetas; ?>  </td>
	                   <td> <?php echo $res->numero_banco_tarjetas; ?>  </td>
		               <td> <?php echo $res->identificacion_banco_tarjetas; ?>     </td> 
		               <td> <?php echo $res->nombres_banco_tarjetas; ?>  </td>
		               <td> <?php echo $res->status_banco_tarjetas; ?>  </td>      
		                  
		    		</tr>
		  		
		           	  
		        <?php } ?>
		    	
    			 	
 				<?php  }   else { ?>
		        <?php }  ?>
      	
      		</table>      		
			
		   </div>
		
      	</section>       
 
    
       </body>  
    </html>