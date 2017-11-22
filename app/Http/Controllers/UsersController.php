<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use DB;
use Illuminate\Routing\Controller as BaseController;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Función que verifica el usuario en el web service
    public function check(Request $request) {
        // Tomamos los usuarios del formulario
        $usuario = $request->input('usuario');
        $password = $request->input('password');

        // Creamos la petición a la url con los datos del formulario
        $url = "https://artashadow.000webhostapp.com/index.php/login";
        $curl = curl_init($url);
        $curl_post = array(
            'nombre' => $usuario,
            'contra' => $password
        );

        // Se colocan las propiedades de la petición
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post);

        // Realizamos la petición y la parseamos
        $response = curl_exec($curl);
        $person = json_decode($response);

        // Verificamos la petición
        if (isset($person[0]->tipo)) {
            session_start();
            $_SESSION['id_tipo'] = $person[0]->tipo;
            $_SESSION['nombre'] = $usuario;
            return redirect("/");
        } else {
            return redirect()->route('login', ['error' => "Usuario o constraseña no validos"]);
        }
    }

    // Retorna e login con un error de autentificación 
    public function login($error = "") {
    	return view("login", ['error' => $error]);
	}

    // Muestra los usuarios activos
    public function showG(){
        // Verificamos si se inicio sesión
        session_start();
        if (!isset($_SESSION['id_tipo'])) {
            return redirect("/login");
        }

        // Realizamos la consulta al web service y verificamos si se realizó con éxito
        $url = "https://artashadow.000webhostapp.com/index.php/usuariosActivos";
        if (($response = file_get_contents($url)) !== null) {
            $res = json_decode($response);
            return view("usuarios_activos", ['response' => $res]);
        }
        return redirect("/");
    }

    // Muestra las partidas terminadas
    public function showPT() {
        // Verificamos si se inicio sesión
        session_start();
        if (!isset($_SESSION['id_tipo'])) {
            return redirect("/login");
        }

        // Realizamos la consulta al web service y verificmos si se realizó con éxito
        $url = "https://artashadow.000webhostapp.com/index.php/partidasTerminadas";
        if (($response = file_get_contents($url)) !== null) {
            $res = json_decode($response);
            return view("partidas_terminadas", ['response' => $res]);
        }
        return redirect("/");
    }

    // Muestra el score
    public function showScore() {
        // Realizamos la consulta al web service y verificamos si se realizó con éxito
        $url = "https://artashadow.000webhostapp.com/index.php/scoresConNombreTrampa";
        if (($response = file_get_contents($url)) !== null) {
            $res = json_decode($response);
            return view('score', ['response' => $res]);
        }
        
        return redirect("/");
    }
}
