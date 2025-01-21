<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use CBSoftwareDev\Form\Form;
use CBSoftwareDev\Form\Input\Image;
use CBSoftwareDev\Form\Input\Image2;
use CBSoftwareDev\Form\Input\Select;
use CBSoftwareDev\Form\Input\TextInput;
use CBSoftwareDev\Form\Style\Group;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

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
                Image::make('image'),
                Image2::make('image'),
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


    public function testimage()
    {
        return view("Form",[ 'form' => 
            Form::make([
                Image2::make('image'),
            ])->columns(1)
        ]); 
    }
    
    public function createimage(request $request)
    {
        $data = $request->validate([
            'image' => 'required|mimes:jpg,png,pdf|max:2048',
        ]);

        $size =  $data["image"]->dimensions();       
        $path = $data["image"]->store('uploads', 'public');

        $image = new \App\Models\Image();
        $image->mimeType = $data["image"]->getMimeType();
        $image->path = $path;
        $image->width = $size[0] ?? 0;
        $image->height = $size[1] ?? 0;
        clock($image->save());
        return redirect("/testimage");
    }

    public function getimage(\App\Models\Image $image)
    {
        return response()->file(storage_path('app/public/'.$image->path));
        //clock(storage_path(),$image->path,storage_path($image->path), public_path('storage/'.$image->path));
        //eturn file(public_path('storage/'.$image->path));
    }
}
