<?php

class Aprendiz
{
    private $db;
    private $documento;
    private $identificador;

    public function __construct()
    {
        $this->db = new Base();
    }

    public function documento($datos)
    {

        //Se convierten  y concatenan los tipos de documento y documento al codigo db
        if ($datos['tipo_documento'] == 'CC') {
            $this->identificador = 1;
            $this->documento = $datos['tipo_documento'] . $datos['documento'];
        }
        if ($datos['tipo_documento'] == 'TI') {
            $this->identificador = 2;
            $this->documento = $datos['tipo_documento'] . $datos['documento'];
        }
        if ($datos['tipo_documento'] == 'CE') {
            $this->identificador = 3;
            $this->documento = $datos['tipo_documento'] . $datos['documento'];
        }

    }

    /*Metodo el cual guarda los aprendices para ello primero consulta 
    para saber y ya existen*/
    public function crear($datos)
    {

        $this->db->query("SELECT dato.documento, permiso.id_documento FROM dato_persona as dato, permiso WHERE  dato.documento = ?
                                AND permiso.id_documento = ?");
        $this->db->bind(1, $this->documento);
        $this->db->bind(2, $this->documento);
        $this->db->execute();
        $cont = $this->db->rowCount();
        if ($cont == 0) {

            $this->db->query("INSERT INTO permiso VALUES (?)");
            $this->db->bind(1, $this->documento);
            $this->db->execute();
            $cont2 = $this->db->rowCount();
            if ($cont2 == 1) {

                $this->db->query("INSERT INTO dato_persona (documento, primer_nombre, segundo_nombre, primer_apellido,
                    segundo_apellido, correo, contrasena,fk_estado,fk_ficha,fk_tipo_documento) VALUES (:doc,:pnombre,:snombre,:papellido,
                    :sapellido,:mail,'Null','2',:fichas,:tdocumento )");

                //vincular los valores
                $this->db->bind(':doc', strip_tags($this->documento));
                $this->db->bind(':pnombre', strip_tags(ucwords(strtolower($datos['primer_nombre']))));
                $this->db->bind(':snombre', strip_tags(ucwords(strtolower($datos['segundo_nombre']))));
                $this->db->bind(':papellido', strip_tags(ucwords(strtolower($datos['primer_apellido']))));
                $this->db->bind('sapellido', strip_tags(ucwords(strtolower($datos['segundo_apellido']))));
                $this->db->bind(':mail', strip_tags($datos['correo']));
                $this->db->bind(':fichas', strip_tags($datos['ficha']));
                $this->db->bind(':tdocumento', strip_tags($this->identificador));
                $this->db->execute();
                $cont3 = $this->db->rowCount();

                $this->db->query("INSERT INTO rol  (fk_tipo_rol,fk_documento) VALUES ('1', ?)");
                $this->db->bind(1, strip_tags($this->documento));
                $this->db->execute();

                if ($cont3 == 1) {
                    return true;
                } else {

                    return false;
                }
            }

        } else {

            return false;
        }
    }

    /*Metodo el cual guarda los las novedades para ello primero consulta 
    para saber y ya existen*/
    public function tipoNovedades($datos)
    {

        $this->db->query("SELECT * FROM novedad WHERE fk_documento = ? AND fk_tipo_novedad = ?");
        $this->db->bind(1, $this->documento);
        $this->db->bind(2, $datos["novedad"]);
        $this->db->execute();
        $cont = $this->db->rowCount();
        if ($cont == 0) {

            $this->db->query("INSERT INTO novedad (fecha_inicio,fecha_fin,motivo,respuesta,documento_responsable,tiempo_estimado,tamano_acta,
             acta,fk_documento,fk_tipo_novedad, fk_tipo_respuesta) VALUES  (?,?,?,?,?,?,?,?,?,?,?)");


            $this->db->bind(1,  strip_tags($datos["fecha_inicio"]));
            $this->db->bind(2,  strip_tags($datos["fecha_fin"]));
            $this->db->bind(3,  strip_tags($datos["motivo"]));
            $this->db->bind(4,  strip_tags($datos["respuesta"]));
            $this->db->bind(5,  strip_tags($_SESSION["ddocumento"]));
            $this->db->bind(6,  strip_tags($datos["tiempo"]));
            $this->db->bind(7,  strip_tags($datos["tamaño"]));
            $this->db->bind(8,  strip_tags($datos["archivo"]));
            $this->db->bind(9, $this->documento);
            $this->db->bind(10, $datos["novedad"]);
            $this->db->bind(11, $datos["tipo_respuesta"]);
            
            $this->db->execute();
            $cont2 = $this->db->rowCount();
            if ($cont2 == 1) {

                return true;
            } else {
                return false;
            }
        }

    }
    /*Metodo el cual guarda las deserciones para ello primero consulta 
    para saber y ya existen*/
    public function tipoNovedad($datos)
    {

        $this->db->query("SELECT * FROM novedad WHERE fk_documento = ? AND fk_tipo_novedad = ?");
        $this->db->bind(1, $this->documento);
        $this->db->bind(2, $datos["novedad"]);
        $this->db->execute();
        $cont = $this->db->rowCount();
        if ($cont == 0) {

            $this->db->query("INSERT INTO novedad (fecha_inicio,fecha_fin,motivo,
            respuesta,fallas,documento_responsable,instructor_encargado,tamano_acta,
            acta,fk_documento,fk_tipo_novedad, fk_tipo_respuesta) VALUES  (?,?,?,?,?,?,?,?,?,?,?,?)");
            
            $this->db->bind(1,  strip_tags($datos["fecha_inicio"]));
            $this->db->bind(2,  strip_tags($datos["fecha_fin"]));
            $this->db->bind(3,  strip_tags($datos["motivo"]));
            $this->db->bind(4,  strip_tags($datos["respuesta"]));
            $this->db->bind(5,  strip_tags($datos["fallas"]));
            $this->db->bind(6,  strip_tags($_SESSION["ddocumento"]));
            $this->db->bind(7,  strip_tags($datos["documento_instructor"]));
            $this->db->bind(8,  strip_tags($datos["tamaño"]));
            $this->db->bind(9,  strip_tags($datos["archivo"]));
            $this->db->bind(10, $this->documento);
            $this->db->bind(11, strip_tags($datos["novedad"]));
            $this->db->bind(12, strip_tags($datos["tipo_respuesta"]));
            $this->db->execute();
            $cont2 = $this->db->rowCount();
            if ($cont2 == 1) {

                return true;
            } else {
                return false;
            }
        }

    }

    /*Metodo consulta todas las fichas en general*/
    public function consultaFicha()
    {
        $this->db->query("SELECT * FROM ficha WHERE codigo_ficha LIKE '%%' ");
        $this->db->execute();
        $respuesta = $this->db->objetos();
        return $respuesta;
    }

    public function consultarFichas($datos)
    {
        $this->db->query("SELECT * FROM ficha WHERE codigo_ficha = ? ");
        $this->db->bind(1, $datos["ficha"]);
        $this->db->execute();
        $respuesta = $this->db->assoc();
        return $respuesta;
    }

    public function registroHistorial($datos)
    {
        $fecha= strftime( "%Y-%m-%d");
        $this->db->query("INSERT INTO historial_aprendiz 
        (documento_aprendiz,fecha_historial,fk_sede_antigua,fk_jornada_antigua,fk_modalidad_antigua,
        fk_trimestre_antigua,fk_codigo_ficha) VALUES (?,?,?,?,?,?,?)");

        $this->db->bind(1, strip_tags($this->documento));
        $this->db->bind(2, $fecha);
        $this->db->bind(3, strip_tags($datos["fk_sede"]));
        $this->db->bind(4, strip_tags($datos["fk_jornada"]));
        $this->db->bind(5, strip_tags($datos["fk_modalidad"]));
        $this->db->bind(6, strip_tags($datos["fk_trimestre"]));
        $this->db->bind(7, strip_tags($datos["ficha"]));

        $this->db->execute();

        
    }
    
}
