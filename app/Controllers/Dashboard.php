<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function dashadmin()
    {
        return view('dashboard_administrador');
    }

    public function dashestu()
    {
        return view('dashboard_estudiante');
    }
}