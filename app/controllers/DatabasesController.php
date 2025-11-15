<?php

namespace App\Controllers;

class DatabasesController extends Controller
{
    public function index()
    {
        response()->render('database');
    }
}
