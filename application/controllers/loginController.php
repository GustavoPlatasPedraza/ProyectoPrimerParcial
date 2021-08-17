<?php
class loginController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper("url"); //url permite accesar a los controladores de una manera mas practica
        $this->load->helper("cookie");
        $this->load->model("login");
        date_default_timezone_set('America/Monterrey');
    }

    public function index(){
        $this->load->view("login/index");
    }

    public function validarLogin(){
        $data = $this->input->post();
        $res = $this->login->getPass($data["correo"]); //verifica que existe el correo
        if($res == ""){
            $this->session->set_flashdata('message','error');
            redirect(base_url());
            
        }else{
            $pass = $res['password'];
            //$pass_encriptada = password_hash($data["contra"],PASSWORD_DEFAULT);
            if(password_verify($data["contra"],$pass)){
                if(!isset($_SESSION["id"])){
                    session_start();
                    $_SESSION["id"] = $res["id"];
                    $_SESSION["tipo"] = $res["tipo_usuario"];
                    $_SESSION["id_persona"] = $res["id_persona"];
                    redirect(base_url("inicio"));
                }else{
                    redirect(base_url("inicio"));
                    }
            }else{
                $this->session->set_flashdata('message','verify');
                redirect(base_url());
               }
                $this->session->set_flashdata('message','');
            }
        }
    
    

    public function inicio(){
        $this->load->view("inicio/index");
    }

    public function adminPersonas(){
        $res = $this->login->adminPersonas();
        $_SESSION["personas"]= $res;
        $this->load->view("inicio/personas/personas");
    }

    public function editPersona($id){
        $res = $this->login->getInfo("personas",$id);
        $_SESSION["datosEditPersonas"]= $res;
        $this->load->view("inicio/personas/editPersona");
    }

    public function actInfoPersonas(){
        $data = $this->input->post();
        try{
            $res = $this->login->actInfoPersonas($data);
            redirect(base_url("adminPersonas"));
        }catch(Exception $error){
            echo $error;
        }
        print_r($data);
    }

    public function deletePersonas($id){
        $this->session->set_flashdata("id_delete",$id);
        $this->session->set_flashdata('message','borrar');
        $this->load->view("inicio/personas/personas");
    }

    public function confirmDelete(){
        $id = $_POST["id"];
        $res = $this->login->delete("personas",$id);
        echo $res;
    }

    public function addPersona(){
        $this->load->view("inicio/personas/addPersona");
    }

    public function insert($tabla){
        $data = $this->input->post();
        $data["fecha_registro"] = date("Y-m-d");
        $data["hora_registro"] = date("H:i:s");
        $data["estado"] = 1;
        $res = $this->login->insert($data,$tabla);
        $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata('message','errorInsert');
        redirect(base_url("inicio"));
    }

    public function logout(){
        session_destroy();
        redirect(base_url());
    }

    public function cambiarPass(){
        $this->load->view("inicio/cambiarPass");
    }

    public function updatePass(){
        $post = $this->input->post();
        if($post["contra"]== $post["conf"]){
            $data = array(
                "password" => password_hash($post["contra"],PASSWORD_DEFAULT)
            );
            $res = $this->login->update($data,$_SESSION["id"],"login");
            $res == "nice" ? $this->session->set_flashdata('message','cambioAct'):$this->session->set_flashdata('message','errorAct');
            redirect(base_url("cambiarPass"));
        }else{
            $this->session->set_flashdata('message','PassIncorrectas');
            redirect(base_url("cambiarPass"));
        }
    }

    

    //apartado de departamentos

    public function departamentos(){
        $res = $this->login->departamentos();
        $_SESSION["departamentos"]= $res;
        $this->load->view("inicio/departamentos/departamentos");
    }

    public function editDepartamento($id){
        $res = $this->login->getInfo("departamentos",$id);
        $_SESSION["datosEditDepartamentos"]= $res;
        $this->load->view("inicio/departamentos/editDepartamento");
    }

    public function actInfoDepartamentos(){
        $data = $this->input->post();
        try{
            $res = $this->login->actInfoDepartamentos($data);
            redirect(base_url("departamentos"));
        }catch(Exception $error){
            echo $error;
        }
        print_r($data);
    }

    public function deleteDepartamento($id){
        $this->session->set_flashdata("id_delete",$id);
        $this->session->set_flashdata('message','borrar');
        $this->load->view("inicio/departamentos/departamentos");
    }
    public function confirmDeleteDepartamento(){
        $id = $_POST["id"];
        $res = $this->login->deleteDepartamentos("departamentos",$id);
        echo $res;
    }

    public function addDepartamento(){
        $this->load->view("inicio/departamentos/addDepartamento");
    }
    public function deleteTrabajador($id){
        $this->session->set_flashdata("id_delete",$id);
        $this->session->set_flashdata('message','borrar');
        $this->load->view("inicio/trabajadores/trabajadores");
    }
    public function confirmDeleteTrabaajdores(){
        $id = $_POST["id"];
        $res = $this->login->deleteTrabajadores("trabajadores",$id);
        echo $res;
    }

    public function addTrabajador(){
        $res = $this->login->selectAlldepartamentos("departamentos");
        $data["departamentos"] = $res;
        $this->load->view("inicio/trabajadores/addtrabajador",$data);
    }

    public function insertTrabajador($tabla){
        $data = $this->input->post();
        $data["fecha_registro"] = date("Y-m-d");
        $data["hora_registro"] = date("H:i:s");
        $data["estado"] = 1;
        $res = $this->login->insert($data,$tabla);
        $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata('message','errorInsert');
        redirect(base_url("departamentos"));
    }


    
  
    public function adminUsuarios(){
        $res = $this->login->adminUsuarios();
        $_SESSION["usuarios"] = $res;
        $this->load->view("inicio/usuarios/usuarios");
    }

    public function editUsuario($id){
        $res = $this->login->getInfo("usuarios",$id);
        $_SESSION["datosEditUsuario"] = $res;
        $this->load->view("inicio/usuarios/editUsuario");
    }

    public function actInfoUsuarios(){
        $data = $this->input->post();
        try {
            $res = $this->login->actInfoUsuarios($data);
            redirect(base_url("adminUsuarios"));
        } catch (Exception $th) {
            echo $th;
        }
        print_r($data);
    }

    public function deleteUsuario($id){
        $this->session->set_flashdata("id_delete", $id);
        $this->session->set_flashdata('message','borrar');
        $this->load->view("inicio/usuarios/usuarios");
    }

    public function confirmDeleteUsuario(){
        $id = $_POST["id"];
        $res = $this->login->delete("usuarios",$id);
        echo $res;
    }

    public function addUsuario(){
        $res = $this->login->selectAllUsuarios("personas");
        $data["personas"] = $res;
        $this->load->view("inicio/usuarios/addUsuario",$data);
        //$this->load->view("inicio/personas/addUsuario");
    }

    public function insertUsuarios($tabla){
        $data = $this->input->post();
        $data["fecha_registro"] = date("Y-m-d");
        $data["hora_registro"] = date("H:i:s");
        $pass_encriptada = password_hash("123456789",PASSWORD_DEFAULT);
        $data["password"] = $pass_encriptada;
        $data["estado"] = 1;
        $res = $this->login->insertUsuario($data,$tabla);
        $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata("message","errorInsert");
        redirect(base_url("adminUsuarios"));
    }
    //Apartado de documentos

    public function adminDocumentos(){
        $res = $this->login->selectAll("documentos");
        $data["documentos"] = $res;
        $this->load->view("inicio/documentos/index",$data);
    }

    public function addDocumento(){
        $res = $this->login->selectAll("personas");
        $data["personas"] = $res;
        $this->load->view("inicio/documentos/addDocumento",$data);
    }

    public function editDocumento($id){
        $res = $this->login->getInfo("documentos",$id);
        $data["documento"] = $res;
        $res = $this->login->selectAll("personas");
        $_SESSION["personas"] = $res;
        $this->load->view("inicio/documentos/editDocumento",$data);

    }

    public function actInfo($tabla){
        $data = $this->input->post();
        $res = $this->login->actInfo($data,$tabla);
        $res == 1 ? $this->session->set_flashdata('message','cambioAct'):$this->session->set_flashdata('message','errorAct');
        if($_SESSION["tipo"] == 1){
            redirect(base_url("adminDocumentos"));
        }else{
            redirect(base_url("userDocumentos"));
        }
        
    }

    public function deleteDocumento($id){
        $this->session->set_flashdata("id_delete",$id);
        $this->session->set_flashdata('message','borrarDocumento');
        redirect(base_url("adminDocumentos"));
    }

    public function confirmDeleteDocumentos(){
        $id = $_POST["id"];
        $res = $this->login->delete("documentos",$id);
        echo $res;
    }

    public function userDocumentos(){
        $res = $this->login->selectAllCondition("documentos","id_persona",$_SESSION["id_persona"]);
        $data["documentos"] = $res;
        $this->load->view("inicio/documentos/userDocumentos",$data);
    }

    public function addDocumentoUser(){
        $this->load->view("inicio/documentos/addDocumentoUser");
    }

    public function editDocumentoUser($id){
        $res = $this->login->getInfo("documentos",$id);
        $data["documento"] = $res;
        $this->load->view("inicio/documentos/editDocumentoUser",$data);
    }

    //Apartado de documentos
}