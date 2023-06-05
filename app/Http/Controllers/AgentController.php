<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::all();
        return $agents;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fName' => ['required', 'max:255'],
            'lName'=>['required', 'max:255'],
            'email'=>['required'],
            'phone'=>['required', 'numeric'],
            'age'=>['required'],
            'gender'=>['required'],
            'biography'=>['required'],
            'facebook'=>['required'],
            'tweeter'=>['required'],
            'linkedin'=>['required'],
            'instagram'=>['required'],
            'dob'=>['required'],
            'image'=>['image', 'max:40280']
        ]);
        $agent = new Agent();
        $agent->fName = $request->fName;
        $agent->lName = $request->lName;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->age = $request->age;
        $agent->gender = $request->gender;
        $agent->biography = $request->biography;
        $agent->facebook = $request->facebook;
        $agent->tweeter = $request->tweeter;
        $agent->linkedin = $request->linkedin;
        $agent->instagram = $request->instagram;
        $agent->dob = $request->dob;

        $image = $request->file('image')->store('public/images');
        $image = str_replace('public/', '', $image);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('storage/app/images', $fileName);
            $agent->image = $fileName;
        }else{
            return $request;
            $agent->image = '';
        }

        $agent->save();
        return "Saved Successfylly";


    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
