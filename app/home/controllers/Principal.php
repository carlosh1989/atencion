<?php
namespace App\home\controllers;

use App\Donante;
use App\Entrega;
use App\Laboratorio;
use App\Parroquia;
use App\Requerimientos;
use App\Solicitante;
use App\Solicitud;
use App\Tipo;
use App\home\models\PrincipalModel;
use Controller,View,Token,Session,Arr,Message,Redirect,Permission,Url;

class Principal extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(Session::isRegistered())
        {
            Redirect::to('auth/login');
        }
        else
        {
            $entregas = Entrega::orderBy('id', 'DESC')->where('portada',1)->get();
            //Arr($entregas);
            //View::ver('home/principal/index',compact('entregas')); 
            View(compact('entregas')); 
        }
    }

    public function consulta()
    {
        extract($_POST);

        if(isset($cedula) and $cedula)
        {
            $solicitante = Solicitante::where('cedula',$cedula)->first();

            if (!$solicitante) 
            {
                Redirect::send('home/principal/consulta','error','Solicitante no registrado en el sistema.');
            } 
            else 
            {

                $solicitud = Solicitud::where('solicitante_id',$solicitante->id)->first();  

                if(!$solicitud)
                {
                    Redirect::send('home/principal/consulta','error','No existe Solicitud.');
                } 
                else
                {
                    Message::send('info','Solicitud encontrada.');
                    View(compact('solicitud'));    
                }
            }
        }
        else
        {
            $solicitud = "";
            View(compact('solicitud'));
        }
    }

    public function solicitud()
    {
        extract($_POST);

        if(isset($tipo_solicitud_id) and $tipo_solicitud_id)
        {
            $tipo = Tipo::find($tipo_solicitud_id);
            $requerimientos = $tipo->requerimientos;
            //Arr($requerimientos);
        }
        else
        {
            $requerimientos = "";
        }
        
        View(compact('requerimientos'));
    }   
}