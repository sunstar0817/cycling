<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class CyclingController extends Controller
{
    public function index(Profile $profile)
    {
    return $profile->get();
    }
}
