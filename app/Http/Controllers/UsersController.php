<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    define('DB_SERVER', 'localhost:3036');
    define('DBUSERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'database');
    $BD = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


    public function index()
    {
    	session_start();
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    		// Enviamos el usuario y contraseña;
    		$username = mysql_real_escape_string($DB, $_POST['usuario']);
    		$password = mysql_real_escape_string($DB, $_POST['password']);
    		$SQL = "SELECT id FROM users WHERE username = '".$username."' AND password = '".$password."'";
    		$result = mysqli_query($BD, $SQL);
    		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    		$active = $row['active'];
    		$count = mysqli_num_rows($result);

    		// Si se encontro usuario y contraseña. count debe ser 1

    		if ($count == 1) {
    			session_register("username");
    			$_SESSION['login_user'] = $username;
    			return view("usuarios_activos");
    			
    		} else {
    			return view("login", ['mensaje'=>"Usuario o Contraseña invalidos"]);
    		}
    }

    public function login() {
    	return view("login");
    
	}
