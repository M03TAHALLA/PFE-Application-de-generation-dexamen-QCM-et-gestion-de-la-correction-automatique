<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function runScript()
    {
        $command = '"C:/Users/TAHALLA MOHAMMED/AppData/Local/Programs/Python/Python311/python.exe" c:/xampp/htdocs/QCMProject/app/Console/Pyhton/main_programme.py';
        shell_exec($command);
        
    }
}
