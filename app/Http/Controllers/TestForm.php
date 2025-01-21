<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use CBSoftwareDev\Form\Form;
use CBSoftwareDev\Form\Input\Select;
use CBSoftwareDev\Form\Input\TextInput;
use CBSoftwareDev\Form\Style\Group;
use Illuminate\Http\Request;

class TestForm extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Form",[ 'form' => $this->getForm()]); 
    }

    private function getForm(): Form
    {
        return Form::make([
            TextInput::make('name'),
            TextInput::make('description'),
            Group::make(1, [
                TextInput::make('subline'),
                TextInput::make('highlight'),
                TextInput::make('rating'),
                TextInput::make('slug'),
                TextInput::make('image'),
                Select::make('parent_id')->options(options: catagory::all(columns: ["id","name"])->pluck("name","id")),
            ]),
            Select::make('parent_id')->options(options: catagory::all(columns: ["id","name"])->pluck("name","id")),
        ])->columns(3);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form = $this->getForm();
        $form->Validate();
        return view("create_category");
    }


}
