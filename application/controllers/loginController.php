<?php    
use Google\Service\Oauth2;
class loginController extends CI_Controller{
    public $google_client;
    public function __construct(){
        parent::__construct();
        $this->load->helper("url"); //url permite accesar a los controladores de una manera mas practica
        $this->load->helper("cookie");
        $this->load->model("login");
        date_default_timezone_set('America/Monterrey');
        include_once APPPATH  . "libraries/vendor/autoload.php";
        $this->google_client = new \Google_Client();
		$this->google_client->setClientId('629307595356-bi1jr98e13egohke6c7jhlj9o1oih4gt.apps.googleusercontent.com');
		$this->google_client->setClientSecret('SjsANMdspiuEFD4eqdytUmVg');
		$this->google_client->setRedirectUri(base_url().'/google_login');
		$this->google_client->addScope('email');
		$this->google_client->addScope('profile');
		$this->google_client->addScope('https://www.googleapis.com/auth/tasks');
		$this->google_client->addScope('https://www.googleapis.com/auth/tasks.readonly');
		$this->google_client->setAccessType('offline');
		$this->google_client->setApprovalPrompt('force');
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
    ////////////////////////////PERSONAS///////////////////////////////
    public function adminPersonas(){  //Vista
        $res = $this->login->adminPersonas();
        $_SESSION["personas"]= $res;
        if($this->session->flashdata('message') == 'borrar'){
            $this->session->set_flashdata("id_delete","");
            $this->session->set_flashdata('message','');
        }
        $this->load->view("inicio/personas/personas");
    }

    public function editPersona($id){
        $res = $this->login->getInfo("personas",$id);
        $_SESSION["datosEditPersonas"]= $res;
        $this->load->view("inicio/personas/editPersona");
    }

    public function actInfoPersonas(){
        $data = $this->input->post();
        $res = $this->login->actInfoPersonas($data);
        $res == "nice" ? $this->session->set_flashdata('message','cambioAct'):$this->session->set_flashdata('message','errorAct');
        redirect(base_url("adminPersonas"));
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
        if($tabla == "departamentos"){
            $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata('message','errorInsert'); 
            redirect(base_url("departamentos"));
        }else if($tabla == "documentos"){
            $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata('message','errorInsert'); 
            redirect(base_url("adminDocumentos"));
        }else if($tabla == "personas"){
            $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata('message','errorInsert'); 
            redirect(base_url("adminPersonas"));
        }
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

    

    //////////////////////DEPARTAMENTOS//////////////////////////////////
    public function departamentos(){
        $res = $this->login->departamentos();
        $_SESSION["departamentos"]= $res;
        if($this->session->flashdata('message') == 'borrarDepartamento'){
            $this->session->set_flashdata("id_delete","");
            $this->session->set_flashdata('message','');
        }
        $this->load->view("inicio/departamentos/departamentos");
    }

    public function editDepartamento($id){
        $res = $this->login->getInfo("departamentos",$id);
        $_SESSION["datosEditDepartamentos"]= $res;
        $this->load->view("inicio/departamentos/editDepartamento");
    }

    public function actInfoDepartamentos(){
        $data = $this->input->post();
        $res = $this->login->actInfoDepartamentos($data);
        $res == "nice" ? $this->session->set_flashdata('message','cambioAct'):$this->session->set_flashdata('message','errorAct');
        redirect(base_url("departamentos"));
    }

    public function deleteDepartamento($id){
        $this->session->set_flashdata("id_delete",$id);
        $this->session->set_flashdata('message','borrarDepartamento');
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

    /////////////////////////TRABAJADORES///////////////////////////////
    public function trabajadores(){
        $res = $this->login->trabajadores();
        $_SESSION["trabajadores"] = $res;
        if($this->session->flashdata('message') == 'borrarTrabajador'){
            $this->session->set_flashdata("id_delete","");
            $this->session->set_flashdata('message','');
        }
        $this->load->view("inicio/trabajadores/trabajadores");
    }

    public function deleteTrabajador($id){
        $this->session->set_flashdata("id_delete",$id);
        $this->session->set_flashdata('message','borrarTrabajador');
        $this->load->view("inicio/trabajadores/trabajadores");
    }

    public function confirmDeleteTrabaajdores(){
        $id = $_POST["id"];
        $res = $this->login->delete("trabajadores",$id);
        echo $res;
    }

    public function addTrabajador(){
        $res = $this->login->selectAlldepartamentos("departamentos");
        $data["departamentos"] = $res;
        
        $res2 = $this->login->selectAllUsuarios("personas");
        $data["personas"] = $res2;
        $this->load->view("inicio/trabajadores/addTrabajador",$data);
    }

    public function insertTrabajador($tabla){
        $data = $this->input->post();
        $data["fecha_registro"] = date("Y-m-d");
        $data["hora_registro"] = date("H:i:s");
        $data["estado"] = 1;
        $res = $this->login->insert($data,$tabla);
        $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata('message','errorInsert');
        redirect(base_url("trabajadores"));
    }
    
    public function editTrabajador($id){
        $res = $this->login->getInfo("trabajadores",$id);
        $_SESSION["datosEditTrabajadores"]= $res;
        $this->load->view("inicio/trabajadores/editTrabajador");
    }

    public function actInfoTrabaajdores(){
        $data = $this->input->post();
        $res = $this->login->actInfoTrabaajdores($data);
        $res == "nice" ? $this->session->set_flashdata('message','cambioAct'):$this->session->set_flashdata('message','errorAct');
        redirect(base_url("trabajadores"));
    }
    /////////////////////////////USUARIOS//////////////////////////////////
    public function adminUsuarios(){
        $res = $this->login->adminUsuarios();
        $_SESSION["usuarios"] = $res;
        if($this->session->flashdata('message') == 'borrarUsuario'){
            $this->session->set_flashdata("id_delete","");
            $this->session->set_flashdata('message','');
        }
        $this->load->view("inicio/usuarios/usuarios");
    }

    public function editUsuario($id){
        $res = $this->login->getInfo("usuarios",$id);
        $_SESSION["datosEditUsuario"] = $res;
        $this->load->view("inicio/usuarios/editUsuario");
    }

    public function actInfoUsuarios(){
        $data = $this->input->post();
        $data["tipo_usuario"] == "Admin" ? $data["tipo_usuario"] = 1:$data["tipo_usuario"] = 0;
        $res = $this->login->actInfoUsuarios($data);
        $res == "nice" ? $this->session->set_flashdata('message','cambioAct'):$this->session->set_flashdata('message','errorAct');
        redirect(base_url("adminUsuarios"));
    }

    public function deleteUsuario($id){
        $this->session->set_flashdata("id_delete", $id);
        $this->session->set_flashdata('message','borrarUsuario');
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
        $data["tipo_usuario"] == "Admin" ? $data["tipo_usuario"] = 1:$data["tipo_usuario"] = 0;
        $res = $this->login->insertUsuario($data,$tabla);
        $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata("message","errorInsert");
        redirect(base_url("adminUsuarios"));
    }

    ////////////////////////DOCUMENTOS////////////////////////////

    public function adminDocumentos(){
        $res = $this->login->selectAll("documentos");
        $_SESSION["documentos"] = $res;
        if($this->session->flashdata('message') == 'borrarDocumento'){
            $this->session->set_flashdata("id_delete","");
            $this->session->set_flashdata('message','');
        }
        $this->load->view("inicio/documentos/index");
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
        $this->load->view("inicio/documentos/index");
    }

    public function confirmDeleteDocumentos(){
        $id = $_POST["id"];
        $res = $this->login->delete("documentos",$id);
        echo $res;
    }

    /////////////////////USER DOCUMENTOS/////////////////
    
    public function userDocumentos(){
        $res = $this->login->selectAllCondition("documentos","id_persona",$_SESSION["id_persona"]);
        $_SESSION["documentos"] = $res;
        if($this->session->flashdata('message') == 'borrarDocumentoComun'){
            $this->session->set_flashdata("id_delete","");
            $this->session->set_flashdata('message','');
        }
        $this->load->view("inicio/documentos/userDocumentos");
    }

    public function addDocumentoUser(){
        $this->load->view("inicio/documentos/addDocumentoUser");
    }

    public function editDocumentoUser($id){
        $res = $this->login->getInfo("documentos",$id);
        $data["documento"] = $res;
        $this->load->view("inicio/documentos/editDocumentoUser",$data);
    }

    public function confirmDocumentoComun($id){
        $this->session->set_flashdata("id_delete",$id);
        $this->session->set_flashdata('message','borrarDocumentoComun');
        $this->load->view("inicio/documentos/userDocumentos");
    }

    public function deleteDocumentoComun(){
        $id = $_POST["id"];
        $res = $this->login->delete("documentos",$id);
        echo $res;
    }

    public function insertComun($tabla){
        $data = $this->input->post();
        $data["fecha_registro"] = date("Y-m-d");
        $data["hora_registro"] = date("H:i:s");
        $data["estado"] = 1;
        $res = $this->login->insert($data,$tabla);
        $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata('message','errorInsert');
        if($tabla == "documentos"){
            $res == "nice" ? $this->session->set_flashdata('message','success') : $this->session->set_flashdata('message','errorInsert'); 
            redirect(base_url("userDocumentos"));
        }
    }

    //////////////////////GOOGLE API////////////////////////////
    
    public function generar_url(){
		if(!isset($_SESSION['access_token'])){
			$code = $this->google_client->createAuthUrl();
            $_SESSION["code"] = $code;
			echo $code;
		}
	}

    public function google_login(){
		if(isset($_SESSION['google_user'])){
			$this->load->view('inicio/index');
		}else{
            
			//Obtener la URL por el metodo get
            $split = explode("/","$_SERVER[REQUEST_URI]");
			$code = $_SESSION["code"];
            $code = $_GET["code"];
			if($code){
				//generamos el token
				$token = $this->google_client->fetchAccessTokenWithAuthCode($code);
				if(!isset($token['error'])){
					//colocamos el token de acceso del cliente
					$this->google_client->setAccessToken($token);
					//Guardamos el token de acceso en una variable de sesion
					$_SESSION['token'] = $token;
					$_SESSION['access_token'] = $token["access_token"];

					//obtenemos la informacion del usuario
					$google_service = new \Google_Service_Oauth2($this->google_client);
					$gdata = $google_service->userinfo->get();
					//var_dump($gdata);
					$fecha = date("Y-m-d H:i:s");

					if($this->login->googleUserExists($gdata['id'])){
						//actualizamos
						$userData = [
							'first_name' => $gdata['givenName'],
							'last_name' => $gdata['family_name'],
							'email' => $gdata['email'],
							'profile_pic' => $gdata['picture'],
							'updated_at' => $fecha
						];
						$this->login->updateGoogleUser($userData,$gdata['id']);
						$_SESSION['google_user'] = $userData;
					}else{
						//insertamos un nuevo registro
						$userData = [
							'oauth_id' => $gdata['id'],
							'first_name' => $gdata['givenName'],
							'last_name' => $gdata['family_name'],
							'email' => $gdata['email'],
							'profile_pic' => $gdata['picture'],
							'updated_at' => $fecha
						];

						$res = $this->login->createGoogleUser($userData);
                        
                    }

					$_SESSION['google_user'] = $userData;

				}
                    session_start();
                    $_SESSION["id"] = "GoogleID";
                    $_SESSION["tipo"] = "2";
			}

			echo '<script>window.close();</script>';
		}

	}

    
}