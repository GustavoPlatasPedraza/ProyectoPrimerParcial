<?php
class login extends CI_Model{
    public function __construct(){
        parent::__construct();
        date_default_timezone_set("America/Mexico_City");
    }

    public function IniciarSesion($correo,$pass){
        $this->db->select("*");
        $this->db->from("usuarios");
        $this->db->where("correo",$correo); //correo == "correo"
        $this->db->where("password",$pass);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getPass($correo){
        $this->db->select("password,id,tipo_usuario");
        $this->db->select("password,id,tipo_usuario,id_persona");
        $this->db->from("usuarios");
        $this->db->where("correo",$correo);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function adminPersonas(){
        $this->db->select("*");
        $this->db->from("personas");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getInfo($tabla,$id){
        $this->db->select("*");
        $this->db->from($tabla);
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function actInfoPersonas($data){
        $dataAct = array(
            "nombre" => $data["nombre"],
            "ap_paterno" => $data["ap_paterno"],
            "ap_materno " => $data["ap_materno"]
        );
        $this->db->update('personas', $dataAct, array('id' =>$data["id"]));
    }
    public function delete($tabla,$id){
        try{
            $this->db->delete($tabla, array('id' => $id));
            return "nice";
        }catch(Exception $error){
            return $error;
        }
    }

    public function insert($data,$tabla){
        try{
            $this->db->insert($tabla,$data);
            return "nice";
        }catch(Exception $error){
            return $error;
        }
    }

    public function update($data,$id,$tabla){
        try {
            $this->db->update($tabla,$data, array('id' => $id));
            return "nice";
        } catch (Exception $error) {
            return $error;
        }
    }

 public function trabajadores(){
        $this->db->select("*");
        $this->db->from("trabajadores");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function actInfoTrabaajdores($data){
        $dataAct = array(
            "id_departamento" => $data["id_departamento"],
            "puesto" => $data["puesto"],
            "estado " => $data["estado"]
        );
        $this->db->update('trabajadores', $dataAct, array('id' =>$data["id"]));
    }


    //apartado de departamento

    public function departamentos(){
        $this->db->select("*");
        $this->db->from("departamentos");
        $query = $this->db->get();
        return $query->result_array();
}

public function actInfoDepartamentos($data){
    $dataAct = array(
        "nombre_departamento" => $data["nombre_departamento"]
    
    );
    $this->db->update('departamentos', $dataAct, array('id' =>$data["id"]));
}

public function deleteDepartamentos($tabla,$id){
    try{
        $this->db->delete($tabla, array('id' => $id));
        return "nice";
    }catch(Exception $error){
        return $error;
    }
}



    public function selectAlldepartamentos(){
        $this->db->select("*");
        $this->db->from("departamentos");    
        $query = $this->db->get();
        return $query->result_array();
    }   
    public function adminUsuarios(){
        $this->db->select("*");
        $this->db->from("usuarios");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function actInfoUsuarios($data){
        $dataAct = array(
            "n_usuario" => $data["n_usuario"],
            "tipo_usuario" => $data["tipo_usuario"]
        );
        $this->db->update('usuarios',$dataAct,array('id' => $data["id"]));
    }

    public function selectAllUsuarios(){
        $this->db->select("*");
        $this->db->from("personas");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertUsuario($data, $tabla){
        try {
            $this->db->insert($tabla,$data);
            return "nice";
        } catch (Exception $th) {
            return $th;
        }
    }
    //Apartado de docuemntos
    public function selectAll($tabla){ //Esta funcion la puede usar cualquiera si es el caso
        $this->db->select("*");
        $this->db->from($tabla);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function actInfo($data,$tabla){
        try{
            $this->db->update($tabla, $data, array('id' =>$data["id"]));
            return true;
        }catch(Exception $error){
            return $error;
        }
    }
    public function selectAllCondition($tabla,$columna,$valor){
        $this->db->select("*");
        $this->db->from($tabla);
        $this->db->where($columna,$valor);
        $query = $this->db->get();
        return $query->result_array();
    }
    //Apartado de documentos
}