<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function __construct(){
        $this->middleware('auth:editor');

    }
    public function index(){

        return view('editor.editor_home');
    }

}
