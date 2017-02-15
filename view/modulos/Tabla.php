
						
								<?php
						
						
									$html.='<div class="pull-left">';
							$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
							$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
							$html.='</div><br>';
							$html.='<section style="height:425px; overflow-y:scroll;">';
							$html.='<table class="table table-hover">';
							$html.='<thead>';
							$html.='<tr class="info">';
							$html.='<th><b>Id</b></th>';
							$html.='<th>Fecha del Documento</th>';
							$html.='<th>Categoria</th>';
							$html.='<th>Subcategoria</th>';
							$html.='<th>Tipo Documentos</th>';
							$html.='<th>RUC - CI </th>';
							$html.='<th>Cliente/Proveedor</th>';
							$html.='<th>Carton Documentos</th>';
							$html.='<th>Nombre Lecturas</th>';
							$html.='<th>Número Tarjetas</th>';
							$html.='<th>Etapa Documentos</th>';
							$html.='<th>Número Documentos</th>';
							$html.='<th>Número Cheque</th>';
							$html.='<th>Nombre Emisión</th>';
							$html.='<th>Asunto</th>';
							$html.='<th>Remitente</th>';
							$html.='<th>Destinatario</th>';
							$html.='<th>Número Control</th>';
							$html.='<th>Fecha de Subida</th>';
							$html.='<th></th>';
							$html.='<th></th>';
							$html.='</tr>';
							$html.='</thead>';
							$html.='<tbody>';
							foreach ($resultSet as $res)
							{
								//<td style="color:#000000;font-size:80%;"> <?php echo ;</td>
									
	
								$html.='<tr>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->id_documentos_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->fecha_documentos_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->nombre_categorias.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->nombre_subcategorias.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->nombre_tipo_documentos.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->ruc_cliente_proveedor.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->nombre_cliente_proveedor.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->numero_carton_documentos.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->nombre_lecturas.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->numero_tarjetas.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->etapa_documentos_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->numero_documentos_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->numero_cheque_documento_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->nombre_emision_documentos_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->asunto_documentos_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->nombre_remitente_documentos_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->nombre_destinatario_documentos_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->numero_control_documentos_legal.'</td>';
								$html.='<td style="color:#000000;font-size:80%;">'.$res->creado.'</td>';
								$html.='<td><div class="right">';
						
									if ($_SESSION["tipo_usuario"]=="usuario_local") {
										$html.=' <a href="'.IP_EXT . $res->id_documentos_legal.'" class="btn btn-warning" target="blank">Ver</a>';
									} else {
										$html.=' <a href="'.IP_EXT . $res->id_documentos_legal.'" class="btn btn-warning" target="blank">Ver</a>';
									}
									$html.='</div></td>';
									$html.='<td><div class="right">';
						
									$html.='</div></td>';
						
								}
							$html.='</tbody>';
							$html.='</table>';
							$html.='</section>';
							$html.='<div class="table-pagination pull-right">';
							$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
							$html.='</div>';
							$html.='</section>';
						
							?>