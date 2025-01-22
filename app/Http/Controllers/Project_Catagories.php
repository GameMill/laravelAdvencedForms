<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use CBSoftwareDev\Form\Form;
use CBSoftwareDev\Form\Input\Select;
use CBSoftwareDev\Form\Input\TextInput;
use CBSoftwareDev\Form\Input\Textarea;
use Illuminate\Http\Request;

class Project_Catagories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("tabel",[ 'categories' => clock(catagory::all())]); 
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
            TextInput::make('name')->required()->length(3, 255),
            Textarea::make('description')->length(0, 500),
        ],$catagoryModel)->setModelClass(catagory::class)->columns(1);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = $this->getFormCreate();
        $form->trySave();
        return redirect("/categories");

/*
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        catagory::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);*/

        //return redirect("/categories");
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
        $form->trySave();
        //if(!$form->Validate(true)) {
        //    return view("form", data: ["form" => $form]);
        //}
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
