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

    public function check(Request $request) {
        $usuario = $request->input('usuario');
        $password = $request->input('password');

        $checkLogin = DB::table('usuario')->where(['nombre'=>$usuario, 'contra'=>$password, 'tipo' => 1])->get();
        if (count($checkLogin) > 0) {
            session_start();
            $_SESSION['id_tipo'] = 1;
            $_SESSION['nombre'] = $usuario;
            return redirect("/");
        } else {
            return redirect()->route('login', ['error' => "Usuario o constraseña no validos"]);
        }
    }

    public function login($error = "") {
    	return view("login", ['error' => $error]);
	}

    public function showG(){
        session_start();
        if (!isset($_SESSION['id_tipo'])) {
            return redirect("/login");
        }
        return view("usuarios_activos");
    }

    public function showPT() {
        session_start();
        if (!isset($_SESSION['id_tipo'])) {
            return redirect("/login");
        }
        return view("partidas_terminadas");

    }

    public function showScore() {
        return view("score");
    }

    private function tablaUsuariosActivos() {

    }

    private functions tablaPartidasTerminadas() {

    }

    private function tablaScore() {

    }
}
