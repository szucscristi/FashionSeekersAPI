<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /*public function index()
    {
        return view('forms');
    }*/
    public function store(Request $request)
    {
    
       $form = new Form();
       $form-> Nume = $request->input('Nume');
       $form-> Prenume = $request->input('Prenume');
       $form-> Email = $request->input('Email');
       $form-> Telefon = $request->input('Telefon');
       $form-> Adresa = $request->input('Adresa');
       $form-> save();
       return true;
    }
}
