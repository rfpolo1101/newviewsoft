
<?php require RUTA_APP . '/views/inicio/header.php';?>

<!--INICIO CONTENIDO-->
<?php  if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          echo $_SESSION["crear"];
      
    } ?>

<!--***************************************FROM**************************************-->
  <form action="<?php echo RUTA_URL ?>/aprendices/novedades/aplazamiento"  method="post" enctype="multipart/form-data" >

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-4 nov">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                  <div class="form-group">
                  Fecha Inicial  Aplazamiento
                    <label  for="fecha_inicial" class="sr-only" >Fecha Inicial Cambio Aplazamiento</label>
                      <div class="">
                      <input type="date" id="fecha_inicial" name="fecha_inicial" autocomplete="OFF" required="" placeholder="Fecha Inicial"  class="form-control" required="">
                      </div>
                  </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  Fecha Final Aplazamiento
                    <label  for="fecha_final" class="sr-only" >Fecha Final </label>
                      <div class="">
                      <input type="date" id="fecha_final" name="fecha_final" autocomplete="OFF" required="" placeholder="Fecha Final"  class="form-control" required="">
                      </div>
                  </div>
              </div>
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  Tiempo Estimado
                    <label  for="tiempo_estimado" class="sr-only" >Tiempo Estimado </label>
                      <div class="">
                      <input type="month" id="tiempo_estimado" name="tiempo_estimado" autocomplete="OFF" required="" placeholder="Tiempo Estimado"  class="form-control" required="">
                      </div>
                  </div>
              </div>
            </div>
      </div>
      

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 col-xs-7 clase" style="margin-top: 30px">
          <div  class="titulo">
          Aplazamiento
          </div><br>
          <div class="formulario form-group" >
                <div class="radio" style="padding-bottom: 30px;">                   
                  <div class="col-md-4 col-sm-4 col-xs-4">               
                          <input type="radio" name="tipo_documento" id="cedulac" value="CC" required="" >
                          <label for="cedulac">Cédula Ciudadania</label>
                  </div>                                         
                  <div class="col-md-4 col-sm-4 col-xs-4"> 
                          <input type="radio" name="tipo_documento" id="tarjeta" value="TI"  required="" >
                          <label for="tarjeta"  >Tarjeta Identidad</label>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">                
                          <input type="radio" name="tipo_documento" id="cedulae" value="CE" required="">
                          <label for="cedulae">Cédula Extranjería</label>
                  </div>
                </div>
          <div class="formulario form-group">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label  for="documento" class="sr-only" >Documento Aprendiz</label>
                      <div class="">
                      <input type="text" id="documento" name="documento" autocomplete="OFF" required="" placeholder="Documento Aprendiz"  class="form-control">
                      </div>
                  </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label  for="motivo" class="sr-only" >Motivo</label>
                      <div class="">
                      <textarea type="text" id="motivo" name="motivo" autocomplete="OFF" required="" placeholder="Motivo"  class="form-control" cols="10" rows="5" ></textarea>
                      </div>
                  </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label  for="respuesta" class="sr-only" >Respuesta</label>
                      <div class="">
                      <textarea type="text" id="respuesta" name="respuesta" autocomplete="OFF" required="" placeholder="Respuesta"  class="form-control" cols="10" rows="5" ></textarea>
                      </div>
                  </div>
              </div>
              
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label  for="acta" class="sr-only" >Acta</label>
                      <div class="input-group">
                        <span  class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
                        <input type="file" id="acta" name="acta" autocomplete="OFF" required="" placeholder="Acta"  class="form-control" required="">
                        </div>
                    </div>
              </div>
                <div class="aprobado form-group">
                  <div class="radio ">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <input type="radio" name="aprobado" id="aprobado" required="" value="1">
                            <label for="aprobado">Aprobado</label>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <input type="radio" name="aprobado" id="naprobado"  required="" value="2">
                            <label for="naprobado">No aprobado</label>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <input type="radio" name="aprobado" id="espera"  required="" value="3">
                            <label for="espera">Espera</label>
                    </div>
                  </div>
                </div>
            </div>
           <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xl-offset-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4" style=" padding-top: 35px; padding-bottom: 25px;">
              <input type="submit" name="enviar" id="enviar" value="Guardar"  class="btn btn-primary btn-block" >
            </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-1 col-xs-1" >
      </div>
    </div>
  </form>


<?php require RUTA_APP . "/views/inicio/footer.php";?>

