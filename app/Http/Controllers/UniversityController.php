<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\University;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource./** */
    public function index() {
        $universities = University::withCount('faculties')->get();

        foreach ($universities as $univer) {
            $univer->fields_count = $univer->faculties->sum(function ($faculty) {
                return $faculty->fields->count();
            });

            $univer->groups_count = $univer->faculties->sum(function ($faculty) {
                return $faculty->fields->sum(function ($field) {
                    return $field->groups->count();
                });
            });

            $univer->students_count = $univer->faculties->sum(function ($faculty) {
                return $faculty->fields->sum(function ($field) {
                    return $field->groups->sum(function ($group) {
                        return $group->students->count();
                    });
                });
            });
        }

    return view('university.university', ['univers' => $universities]);    

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUniversityRequest $request)
    {
        $univer = new University();
        $univer->name = $request->name;
        $univer->save();
        return redirect('/')->with('success', 'New University created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(UpdateUniversityRequest $request, $id){
         $university = University::findOrFail($id);
         $university->name = $request->name;
         $university->save();
     
         return redirect()->back()->with('success', 'University updated successfully!');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        if($university){
            $university->delete();
            return redirect('/')->with('success',$university['name'] . ' deleted successfully');
        }
        return redirect('/')->with('error','Error While Deleting' . $university['name']);

    }
}
