<?php session_start(); ?> 
@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Panel de Control
                </div>
                @if(!isset($_SESSION['id_tipo']))
                    <a href="{{ route('login') }}" class="btn butt">Usuarios Activos</a>
                    <a href="{{ route('login') }}" class="btn butt">Partidas Terminadas</a>
                @else
                    <a href="{{route('usuariosActivos')}}" class="btn butt">Usuarios Activos</a>
                    <a href="{{ route('partidasTerminadas') }}" class="btn butt">Partidas Terminadas</a>
                @endif
                <a href="{{ route('score') }}" class="btn butt">Score</a>
            </div>
        </div>
@endsection

@section('boton')
        @if(isset($_SESSION['id_tipo']))
            <a href="{{ route('cerrarSesion') }}" class="btn botonCerrar">Cerrar Sesión</a>
        @endif
@endsection