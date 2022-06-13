<?php

namespace App\Http\ChangePassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('ChangePassword.changepassword');
    }
}
