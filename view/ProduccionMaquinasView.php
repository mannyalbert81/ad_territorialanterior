<!DOCTYPE HTML>
<html lang="es">
     <head>
        <meta charset="utf-8"/>
        <title>Produccion Maquinas - aDocument 2015</title>
   
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		   
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		  <link rel="stylesheet" href="/resources/demos/style.css">
		
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 
 		
   
       <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
                
            
        </style>

       <script>

		$(document).ready(function(){

			
			
			$("#numero_carton_documentos").keyup(function() { 

				var $agregarcartones = $("#agregarcartones");
				

				if ($(this).val().length == 8)
				{
					
       		 	    	

       		 	    var valor_insertar = $(this).val();

       		 		var previousOption;
       		 	
       		 		$agregarcartones.append("<option value= " +valor_insertar +" >" + valor_insertar  + "</option>");
     		 	  
       		 	    if ($("#agregarcartones option").length > 0)
       		 	    { 

       		 		  	
       		     	$("#agregarcartones option").each(function(){
					
					
							if (this.text == previousOption) $(this).remove();
						    previousOption= this.text;

						    
         		    });

       		 	    }

				$("#agregarcartones option").each(function(){
					
				    $('#agregarcartones  option').prop('selected', true);
 		    	});    
       		     $(this).val("");
       		     $("#barra_contador").text("Cartones por Registrar: " + $("#agregarcartones option").length);
				}
				  
			}); 
		}); 

	</script>
       
        
    
       <script>

		$(document).ready(function(){

			
			
			$("#agregarcartones").click(function() {

			      // obtenemos el combo de categorias
                var $agregarcartones = $("#agregarcartones");
               
				///obtengo el id seleccionado
				var numero_cartones = $(this).val();

				
				if (numero_cartones != "")
				{
				    $(this).find("option[value=  '"+ $(this).val() +"' ]").remove();  

			    }               	               

				$("#agregarcartones option").each(function(){
					
				    $('#agregarcartones  option').prop('selected', true);
 		    	}); 

				$("#barra_contador").text("Cartones por Registrar: " + $("#agregarcartones option").length);
 		    });
		}); 

	</script>
       
        
    </head>
      <body style="background-color: #F6FADE">
    
       <?php include("view/modulos/head.php"); ?>
       
       <?php include("view/modulos/menu.php"); ?>
  
     <div class="container">
  
  	  <div class="row" style="background-color: #FAFAFA;">
    
    
      
        <section class="col-lg-4 usuario" >
        <table class="table table-hover">
	  		<h4 ><span class="label label-primary">DETALLE POR MAQUINAS</span> </h4>	
	         <tr>
	    		<th></th>
	    		<th>Maquina</th>
	    		<th>Subcategoria</th>
	    		<th>Subidos</th>
	    		
	    		
	  		</tr>
            	<?php $registro1 = 1;?>
	            <?php foreach($resultProd1 as $res) {?>
	        		<tr>
	        		    <td> <?php echo $registro1; ?>  </td>
	                   <td> <?php echo $res->nombre_produccion_maquinas; ?>  </td>
		               <td> <?php echo $res->nombre_subcategorias; ?>     </td>
		               <td> <?php echo $res->subidos_xml_produccion_maquinas; ?>     </td> 
		               <?php $registro1 = $registro1 + 1;?>
		               <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("ProduccionMaquinas","index"); ?>&nombre_produccion_maquinas=<?php echo $res->nombre_produccion_maquinas; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
			                </div>
			            
			             </td>
			             
		    		</tr>
		        <?php } ?>
            
            
       	</table>     
      </section>
  
  
  
  		
        <section class="col-lg-4 usuario" >
        <table class="table table-hover">
	  		<h4 ><span class="label label-success">PRODUCCION POR MAQUINAS</span> </h4>	
	         <tr>
	         	<th></th>
	    		<th>Maquina</th>
	    		<th>Subidos</th>
	    		
	    		
	  		</tr>
            	<?php $registro2 = 1;?>
            	
	            <?php foreach($resultProd2 as $res) {?>
	        		<tr>
	        		   <td> <?php echo $registro2; ?>  </td>
	                   <td> <?php echo $res->nombre_produccion_maquinas; ?>  </td>
		               <td> <?php echo $res->subidos_xml_produccion_maquinas; ?>     </td> 
		               <?php $registro2 = $registro2 + 1;?>
		               <td>
			           		
			            
			             </td>
			             
		    		</tr>
		        <?php } ?>
            
            
       	</table>
       	
       	<table class="table table-hover">
	  		<h4 ><span class="label label-success">LECTURAS POR MAQUINAS</span> </h4>
	         <tr>
	         	<th></th>
	    		<th>Maquina</th>
	    		<th>Lecturas</th>
	    		
	    		
	  		</tr>
            	<?php $registro22 = 1;?>
	            <?php foreach($resultProd22 as $res) {?>
	        		<tr>
	        		   <td> <?php echo $registro22; ?>  </td>
	                   <td> <?php echo $res->nombre_produccion_maquinas; ?>  </td>
		               <td> <?php echo $res->lecturas_subcategorias; ?>     </td> 
		               <?php $registro22 = $registro22 + 1 ;?>
		               <td>
			           </td>
			             
		    		</tr>
		        <?php } ?>
            
                 
      </section>
         
        <section class="col-lg-4 usuario" >
        <table class="table table-hover">
	  		<h4 ><span class="label label-info">PRODUCCION POR SUBCATEGORIAS</span> </h4>	
	         <tr>
	            <th></th>
	    		<th>Subcategorias</th>
	    		<th>Subidos</th>
	    		
	    		
	  		</tr>
            	<?php $registro3 = 1;?>
	            <?php foreach($resultProd3 as $res) {?>
	        		<tr>
	        			<td> <?php echo $registro3; ?>  </td>
	                   <td> <?php echo $res->nombre_subcategorias; ?>  </td>
		               <td> <?php echo $res->subidos_xml_produccion_maquinas; ?>     </td> 
		               <?php $registro3 = $registro3 + 1;?>
		               <td>
			           		
			            
			             </td>
			             
		    		</tr>
		        <?php } ?>
            
            
       	</table>
       	
       	
       	<table class="table table-hover">
	  		<h4 ><span class="label label-info">LECTURAS POR SUBCATEGORIAS</span> </h4>	
	         <tr>
	         	<th></th>
	    		<th>Subcategorias</th>
	    		<th>Lecturas</th>
	    		
	    		
	  		</tr>
            	<?php $registro33 = 1;?>
	            <?php foreach($resultProd33 as $res) {?>
	        		<tr>
	        			<td> <?php echo $registro33; ?>  </td>
	                   <td> <?php echo $res->nombre_subcategorias; ?>  </td>
		               <td> <?php echo $res->lecturas_subcategorias; ?>     </td> 
		               <?php $registro33 = $registro33 + 1; ?>
		               <td>
			           		
			            
			             </td>
			             
		    		</tr>
		        <?php } ?>
            
            
       	</table>
       	    </section>
       
  </div>
  </div>
  
       <hr>
        <footer class="col-lg-12">
           <?php include("view/modulos/footer.php"); ?>
        </footer>
        
     </body>  
    </html>                