<?php

namespace App\Http\Controllers;
use App\Models\Service;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function fetchServices()
        {
            $services = Service::all();
                return response()->json($services);

        }
}