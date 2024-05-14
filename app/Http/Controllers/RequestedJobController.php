<?php

namespace App\Http\Controllers;

use App\Models\RequestedJob;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestedJobController extends Controller
{
    public function index(){
        $myRequestedJobs = RequestedJob::where("user_id",Auth()->user()->id)->get();
        $services = Service::all();
        return view("RequestedJobs.index",["jobs"=>$myRequestedJobs,"services"=>$services,"count"=>count($myRequestedJobs)]);
    }

    public function create($service_id){
        return view("RequestedJobs.create",["service_id"=>$service_id]);
    }

    public function store(){
        request()->validate([
            'description' => ['required', 'string', 'max:255'],
        ]);
        try {
            RequestedJob::create([
                "user_id"=>Auth()->user()->id,
                "service_id"=>request()->service_id,
                "description"=>request()->description,
            ]);
            return to_route("jobs.index");
        } catch (\Throwable $th) {
            return abort(510,"THERE IS A PROBLEM OCCURED!!");
        }
    }
}
