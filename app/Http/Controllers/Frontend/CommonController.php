<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    protected $website = [];


    protected $viewPath = 'frontend';

    public function __construct()
    {

            $this->website['website'] = Website::first();

    }



}
