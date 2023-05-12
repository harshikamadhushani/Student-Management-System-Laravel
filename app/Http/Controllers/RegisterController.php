<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Domain\Facades\RegisterFacade;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    //
    /*protected $insert;

    public function __construct()
    {
       $this->insert=new Student();
    } */
    public function index(){
        $response['inserts']=RegisterFacade::all();
        return view('Pages\Register\index')->with($response);
    }

    public function store(Request $request)
    {

        $request->validate([
            'stid' => 'required',
            'name' => 'required',
            'age' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (Student::where('stid', $request->input('stid'))->exists()) {
            return redirect()->back()->withErrors(['stid' => 'Student ID already exists.'])->withInput();
        }

        $image = $request->file('image');
        $imagePath = $image->store('public/images');
        $imageExtension = (new File($image))->extension();
        $imageName = pathinfo($imagePath, PATHINFO_FILENAME);
    
        $data = $request->except(['_token', 'image']);
        $data['image'] = Storage::url($imagePath);
    
        RegisterFacade::store($data);
    
        return redirect('/home')->with('message', 'Registered Successfully!');

    }

}
