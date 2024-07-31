<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DemoController extends Controller
{
    public function index(){
        Log::channel('custom')->info("Hello World on Custom File..!!");
    }
}
