<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'loginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['validarLogin'] = 'loginController/validarLogin';
$route['inicio']= 'loginController/inicio';
$route['adminPersonas'] = 'loginController/adminPersonas';
$route['editPersona/(:any)'] = 'loginController/editPersona/$1';
$route['deletePersonas/(:any)'] = 'loginController/deletePersonas/$1';
$route['actInfoPersonas'] = 'loginController/actInfoPersonas';
$route['confirmDelete'] = 'loginController/confirmDelete';
$route['addPersona'] = 'loginController/addPersona';
$route['insert/(:any)'] = 'loginController/insert/$1';
$route['logout'] = 'loginController/logout';
$route['cambiarPass'] = 'loginController/cambiarPass';
$route['updatePass'] = 'loginController/updatePass';
$route['trabajadores'] = 'loginController/trabajadores';
$route['editTrabajador/(:any)'] = 'loginController/editTrabajador/$1';
$route['actInfoTrabaajdores'] = 'loginController/actInfoTrabaajdores';
$route['addTrabajador'] = 'loginController/addTrabajador';
$route['deleteTrabajador/(:any)'] = 'loginController/deleteTrabajador/$1';
$route['confirmDeleteTrabaajdores'] = 'loginController/confirmDeleteTrabaajdores';
$route['insertTrabajador/(:any)'] = 'loginController/insertTrabajador/$1';
=======
$route['deleteTrabajador/(:any)'] = 'loginController/deleteTrabajador/$1';

//apartado de departamentos
$route['cambiarPass'] = 'loginController/cambiarPass';
$route['updatePass'] = 'loginController/updatePass';
$route['departamentos'] = 'loginController/departamentos';
$route['editDepartamento/(:any)'] = 'loginController/editDepartamento/$1';
$route['actInfoDepartamentos'] = 'loginController/actInfoDepartamentos';
$route['deleteDepartamento/(:any)'] = 'loginController/deleteDepartamento/$1';
$route['insert/(:any)'] = 'loginController/insert/$1';
$route['addDepartamento'] = 'loginController/addDepartamento';
$route['confirmDelete'] = 'loginController/confirmDelete';
$route['prueba'] = 'loginController/prueba';
$route['confirmDeleteDepartamento'] = 'loginController/confirmDeleteDepartamento';
$route['insertDepartamentos/(:any)'] = 'loginController/insertDepartamentos/$1';
$route['addTrabajador'] = 'loginController/addTrabajador';
$route['deleteTrabajador/(:any)'] = 'loginController/deleteTrabajador/$1';
$route['confirmDeleteTrabaajdores'] = 'loginController/confirmDeleteTrabaajdores';
$route['insertTrabajador/(:any)'] = 'loginController/insertTrabajador/$1';
$route["adminUsuarios"] = 'loginController/adminUsuarios';
$route["editUsuario/(:any)"] = 'loginController/editUsuario/$1';
$route["actInfoUsuarios"] = "loginController/actInfoUsuarios";
$route["deleteUsuario/(:any)"] = "loginController/deleteUsuario/$1";
$route["confirmDeleteUsuario"] = "loginController/confirmDeleteUsuario";
$route["addUsuario"] = "loginController/addUsuario";
$route["insertUsuarios/(:any)"] = "loginController/insertUsuarios/$1";
//Apartado de documentos
$route["adminDocumentos"] = "loginController/adminDocumentos";
$route["addDocumento"] = "loginController/addDocumento";
$route["editDocumento/(:any)"] = "loginController/editDocumento/$1";
$route["actInfo/(:any)"] = "loginController/actInfo/$1";
$route["deleteDocumento/(:any)"] = "loginController/deleteDocumento/$1";
$route["confirmDeleteDocumentos"] = "loginController/confirmDeleteDocumentos";
//Apartado de documentos de usuario común
$route["userDocumentos"] = "loginController/userDocumentos";
$route["addDocumentoUser"] = "loginController/addDocumentoUser";
$route["editDocumentoUser/(:any)"] = "loginController/editDocumentoUser/$1";
