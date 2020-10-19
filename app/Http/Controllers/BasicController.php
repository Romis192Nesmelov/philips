<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use Illuminate\Support\MessageBag;

class BasicController extends Controller
{
    protected $errors;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->errors = new MessageBag();
    }
}
