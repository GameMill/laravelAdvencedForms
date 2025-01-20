<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use CBSoftwareDev\Form\Form;
use CBSoftwareDev\Form\Input\TextInput;
use CBSoftwareDev\Form\Input\Textarea;
use Illuminate\Http\Request;

use function Laravel\Prompts\textarea;

class Project_Catagories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("categories",[ 'categories' => clock(catagory::all())]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("form", ["form" => $this->getFormCreate()]);
    }

    private function getFormCreate(?catagory $catagoryModel = null): Form {
        return Form::make([
            TextInput::make('name'),
            Textarea::make('description'),
        ], $catagoryModel)->columns(1);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = $this->getFormCreate();
        if(!$form->Validate(true)) {
            return view("form", data: ["form" => $form]);
        }
/*
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        catagory::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);*/

        return redirect("/categories");
    }

    /**
     * Display the specified resource.
     */
    public function show(catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(catagory $catagory)
    {
        return view("form", ["form" => $this->getFormCreate($catagory)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, catagory $catagory)
    {
        $form = $this->getFormCreate($catagory);
        if(!$form->Validate(true)) {
            return view("form", data: ["form" => $form]);
        }
        return redirect("/categories");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(catagory $catagory)
    {
        $catagory->delete();
        return redirect("/categories");
    }
}
