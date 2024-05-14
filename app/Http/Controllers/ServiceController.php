<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(){
        $categories = Category::all();
        $services = Service::all();
        return view("services.index",["services"=>$services,"categories"=>$categories,"count"=>count($services)]);
    }

}
