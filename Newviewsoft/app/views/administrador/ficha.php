<?php require RUTA_APP . '/views/inicio/header.php'; ?>
<!--INICIO CONTENIDO-->
<?php  if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          echo $_SESSION["crear"];
      
    } ?>x
<form action="<?php echo RUTA_URL; ?>/crear/ficha"  method="post"> 
    <div class="col-md-12">
      <div class="col-md-3">
      </div>
   
      <div class="clase col-md-5">                               
          <div  class="titulo">
            Ficha 
          </div>          
            <div class="col-md-12" style="padding-top: 20px;">
              <div class="col-md-12 col-sm-12 col-xs-12">  
                  <div class="form-group">
                    <label  for="ficha" class="sr-only" >Ficha</label> 
                      <div class="">
                      <input type="text" id="ficha" name="ficha" autocomplete="OFF" required="" placeholder="Ficha"  class="form-control">
                      </div>  
                  </div>
              </div> 
            </div>
            <div class="col-md-12"> 
                <div class="col-md-6 col-sm-6 col-xs-6">  
                  <div class="form-group">
                   <label for="sede"  class="sr-only">Sede</label> 
                      <div class="">    

                       <select name="sede" id="sede" class="form-control" >
                      <option value="">Seleccione Sede</option>

                      <?php foreach($datos["sede"] as $datos1):
                            if($datos1->sede != "Null" ):
                      ?>

                        <option value="<?php echo $datos1->id_sede ?>"><?php echo $datos1->sede; ?></option>
            
                      <?php  endif; endforeach; ?> </select>    
                   
                      </div> 
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">  
                  <div class="form-group">
                   <label for="jornada"  class="sr-only">Jornada</label> 
                      <div class="">   
                      <select name="jornada" id="jornada" class="form-control" >
                      <option value="">Seleccione Jornada</option>

                      <?php foreach($datos["jornada"] as $datos1):
                            if($datos1->jornada != "Null"):
                      ?>

                         <option value="<?php echo $datos1->id_jornada ?>"><?php echo $datos1->jornada; ?></option>
            
                            <?php  endif; endforeach; ?> </select>   
                     
          
                      </div> 
                  </div> 
                </div>
            </div>
            <div class="col-md-12"> 
                <div class="col-md-6 col-sm-6 col-xs-6">  
                  <div class="form-group">
                   <label for="trimestre"  class="sr-only">Trimestre</label> 
                      <div class="">    

                       <select name="trimestre" id="trimestre" class="form-control" >
                      <option value="">Seleccione Trimestre</option>

                      <?php foreach($datos["trimestre"] as $datos1):
                            if($datos1->trimestre != "Null"):
                      ?>

                         <option value="<?php echo $datos1->id_trimestre ?>"><?php echo $datos1->trimestre; ?></option>
            
                            <?php  endif;  endforeach; ?> </select>    
                   
                      </div> 
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">  
                  <div class="form-group">
                   <label for="modalidad"  class="sr-only">Modalidad</label> 
                      <div class="">   
                      <select name="modalidad" id="modalidad" class="form-control" >
                      <option value="">Seleccione Modalidad</option>

                      <?php foreach($datos["modalidad"] as $datos1):
                            if($datos1->modalidad  != "Null"):
                      ?>

                         <option value="<?php echo $datos1->id_modalidad ?>"><?php echo $datos1->modalidad; ?></option>
            
                            <?php  endif; endforeach; ?> </select>   
                     
          
                      </div> 
                  </div> 
                </div>
            </div>
            <div class="col-md-12" >
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="form-group">
                   <label for="tipo_formacion"  class="sr-only">Tipo Formación</label> 
                      <div class="">    

                     <select name="tipo_formacion" id="tipo_formacion" class="form-control" >
                      <option value="">Seleccione Modalidad</option>

                      <?php foreach($datos["tipo_formacion"] as $datos1):
                            if($datos1->tipo_formacion  != "Null"):
                      ?>

                         <option value="<?php echo $datos1->id_tipo_de_formacion ?>"><?php echo $datos1->tipo_formacion; ?></option>
            
                            <?php  endif; endforeach; ?> </select>   
                   
                      </div> 
                </div> 
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                  <div class="form-group">
                   <label for="programa_formacion"  class="sr-only">Programa Formación</label> 
                      <div class="">   
                      <select name="programa_formacion" id="programa_formacion" class="form-control" >
                      <option value="">Seleccione Programa Formación</option>

                      <?php foreach($datos["programa_formacion"] as $datos1):
                            if($datos1->programa_formacion != "Null"):
                      ?>

                         <option value="<?php echo $datos1->id_programa_formacion ?>"><?php echo $datos1->programa_formacion; ?></option>
            
                            <?php  endif; endforeach; ?> </select>   
                     
          
                      </div> 
                  </div> 
              </div>
            </div>
            <div class="col-md-4 col-md-offset-4" style="padding-bottom: 25px;"> 
              <input type="submit" name="enviar" id="enviar" value="Guardar"  class="btn btn-primary btn-block" >
            </div>   
          </div>
          

        <div class="col-md-1">
        </div>

          <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked navbar-inverse" style="margin: 10px;">
               <li class="active"><a href="#"><span class="glyphicon glyphicon-globe"></span> BIENVENIDO</a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/sede/"> Sede</a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/ficha/">  Ficha</a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/tipo/jornada"> Jornada</a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/tipo/ciudad"> Ciudad</a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/tipo/modalidad"> Modalidad</a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/tipo/trimestre"> Trimestre</a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/competencias">Competencia</a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/tipo/tipo_de_formacion"> Tipo de Formación</a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/tipo/programas_formacion"> Programa Formación </a></li>
                <li><a href="<?php echo RUTA_URL; ?>/crear/resultadoAprendizaje">Resultado de Aprendizaje</a></li>
                <li class="divider"></li>
            </ul>
          </div>
      </div>
    </div>         
  </form>
<?php require RUTA_APP . "/views/inicio/footer.php"; ?>

