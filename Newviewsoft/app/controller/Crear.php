<?php

class Crear extends Controlador
{
    //Metodo constructor para llamar las clases de los metodos
    public function __construct()
    {
        $this->crearModelos = $this->modelo("Create");
    }

    public function index()
    {
    }

    //Metodo para guardar distintos datos
    public function tipo($datos_ficha = 'xd')
    {
        session_start();

        //Si no existe noxiste ninguno de estos entra en el if
        if ($datos_ficha != 'jornada' && $datos_ficha != 'trimestre' && $datos_ficha != 'ciudad' && $datos_ficha != 'modalidad' && $datos_ficha != 'tipo_de_formacion' && $datos_ficha != 'programas_formacion') {
            $datos_ficha = 'xd';
        }

        //Si no existe ninguna de esta sessiones se devuelve a la vista error
        if (!isset($_SESSION['Administrador']) and !isset($_SESSION['Super_admin'])) {

            header("Location:" . RUTA_URL . "/inicio");

        //Si existe alguna de las sessiones entra en el else
        } else {

            //Se verifica si la llamada al metodo trae metodo post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                //Se guarda loq ue venga en el  array "datos"
                $datos = [

                    'campo' => $datos_ficha,
                    'dato' => $_POST["tipo"],

                ];

                //Se llama a los metodos correspondientes y se la pasa el array "datos"
                if ($this->crearModelos->tiposCrear($datos)) {

                    //Si retorna true se envia una alerta de correcto y se llama la vista
                    $_SESSION   ["crear"] = "<div align='center'><div class='correctos'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                <strong>Correcto:  </strong>El realizo el registro con exito</div></div>";

                    $this->vista('administrador/' . $datos_ficha);
                
                //Si retorna false
                } else {
                    //Si retorna true se envia una alerta de error y se llama la vista
                    $_SESSION   ["crear"] =  "<div align='center'><div class='errores'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                    <strong>Error:  </strong>Error al registrar intente de nuevo</div></div>";
                    $this->vista('administrador/' . $datos_ficha);
                }
            
            //Si no viene de un metodo post
            } else {
                //Se retorna a la vista correspondiente
                $this->vista('administrador/' . $datos_ficha);
            }
        }
    }

    /* Este metodo crea las fichas las cuales son para el administrador
    y super administrador para ello se colsultan sedes, ciudades etc.  etc. */
    public function ficha()
    {
        session_start();

        if (!isset($_SESSION['Administrador']) and !isset($_SESSION['Super_admin'])) {

            header("Location:" . RUTA_URL . "/inicio");

        } else {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $guardar = [

                    "ficha" => $_POST["ficha"],
                    "sede" => $_POST["sede"],
                    "jornada" => $_POST["jornada"],
                    "trimestre" => $_POST["trimestre"],
                    "modalidad" => $_POST["modalidad"],
                    "tipo_formacion" => $_POST["tipo_formacion"],
                    "programa_formacion" => $_POST["programa_formacion"],
                ];

                if ($this->crearModelos->ficha($guardar)) {

                    $_SESSION["crear"] = "<div align='center'><div class='correctos'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                    <strong>Correcto:  </strong>El registro se realizo con exito</div></div>";
    
                    $resul = $this->crearModelos->consulta();

                    $datos = $resul;

                    $this->vista("administrador/ficha", $datos);
                }else{
                    $_SESSION["crear"] =  "<div align='center'><div class='errores'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                    <strong>Error:  </strong>Error al registrar intente de nuevo</div></div>";

                    $resul = $this->crearModelos->consulta();

                    $datos = $resul;

                    $this->vista("administrador/ficha", $datos);
                }

            } else {
                $resul = $this->crearModelos->consulta();

                $datos = $resul;

                $this->vista("administrador/ficha", $datos);

            }
        }
    }

  
    /* Este metodo crea las sedes las cuales son para el administrador
    y super administrador para ello se colsultan ciudades y el ingreso del nombre
    de la sede */
    public function sede()
    {
        session_start();

        if (!isset($_SESSION['Administrador']) and !isset($_SESSION['Super_admin'])) {

            header("Location:" . RUTA_URL . "/inicio");

        } else {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $guardar = [

                    "sede" => trim($_POST["sede"]),
                    "ciudad" => trim($_POST["ciudad"]),
                ];

                if ($this->crearModelos->sede($guardar)) {

                    $_SESSION["crear"] = "<div align='center'><div class='correctos'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                    <strong>Correcto:  </strong>El registro se realizo con exito</div></div>";
                    $resul = $this->crearModelos->consulta();

                    $datos = $resul;

                    $this->vista("administrador/sede", $datos);
                } else {
                    $_SESSION   ["crear"] =  "<div align='center'><div class='errores'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                    <strong>Error:  </strong>Error al registrar intente de nuevo</div></div>";

                    $resul = $this->crearModelos->consulta();

                    $datos = $resul;

                    $this->vista("administrador/sede", $datos);}

            } else {
                $resul = $this->crearModelos->consulta();

                $datos = $resul;

                $this->vista("administrador/sede", $datos);

            }
        }
    }

    public function competencias(){
        session_start();
        if (!isset($_SESSION['Administrador']) and !isset($_SESSION['Super_admin'])) {
            header("Location:" . RUTA_URL . "/inicio");
        }else{

            if ($_SERVER["REQUEST_METHOD"] == "POST") { 

                $datos = [

                    "competencia" => $_POST["competencia"],
                    "trimestre_dia" => $_POST["trimestre_diurno"],
                    "trimestre_noche" => $_POST["trimestre_especial"],
                    "programa" => $_POST["programa_formacion"],
                ];

                if ($this->crearModelos->crearCompetencia($datos)){

                    $_SESSION["crear"] = "<div align='center'><div class='correctos'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                    <strong>Correcto:  </strong>El registro se realizo con exito</div></div>";
                    $resul = $this->crearModelos->consulta();
                    $datos = $resul;
           

                    $this->vista("administrador/competencias", $datos);

                }else{
                    $_SESSION   ["crear"] =  "<div align='center'><div class='errores'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                    <strong>Error:  </strong>Error al registrar intente de nuevo</div></div>";
                    $resul = $this->crearModelos->consulta();
                    $datos = $resul;
                     $this->vista("administrador/competencias", $datos);

                }


            }else{

                $resul = $this->crearModelos->consulta();
            $datos = $resul;

            $this->vista("administrador/competencias", $datos);
            }
            
        
        }
    }

    public function resultadoAprendizaje(){
        session_start();
        if (!isset($_SESSION['Administrador']) and !isset($_SESSION['Super_admin'])) {
            header("Location:" . RUTA_URL . "/inicio");
        }else{

            if ($_SERVER["REQUEST_METHOD"] == "POST") { 

                $datos = [

                    "resultado" => $_POST["resultado"],
                    "competencia" => $_POST["competencia"],
                ];

                if ($this->crearModelos->crearResultado($datos)){

                    $_SESSION["crear"] = "<div align='center'><div class='correctos'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                    <strong>Correcto:  </strong>El registro se realizo con exito</div></div>";
                    $resul = $this->crearModelos->consulta();
                    $datos = $resul;
           

                    $this->vista("administrador/resultadoAprendizaje", $datos);

                }else{
                    $_SESSION   ["crear"] =  "<div align='center'><div class='errores'><span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span>
                    <strong>Error:  </strong>Error al registrar intente de nuevo</div></div>";
                    $resul = $this->crearModelos->consulta();
                    $datos = $resul;
                    $this->vista("administrador/resultadoAprendizaje", $datos);

                }

            }else{

                $resul = $this->crearModelos->consulta();
            $datos = $resul;

            $this->vista("administrador/resultadoAprendizaje", $datos);
            }
            
        
        }
    }

}
