<?php
namespace App\fundacion\controllers;

use App\fundacion\models\PrincipalModel;
use Controller,View,Token,Session,Arr,Message,Redirect;

class Principal extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		Redirect::to('fundacion/solicitantesFundacion');
    }
}