<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Domain\Facades\EditFacade;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class EditController extends Controller
{
    //
    protected $insert;

    public function index(){
        $response['insert']=EditFacade::all();
        return view('Pages\Register\EditProfile')->with($response);
    }


    public function edit($st_id){
       /* $response['insert']= EditFacade::get($request['$st_id)']);
        return view('Pages\Register\EditProfile')->with($response);*/
        $insert=Student::where('stid',$st_id)->first();
        return view('Pages\Register\EditProfile',['insert'=>$insert]);

    }

    public function update(Request $request, $stid)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $insert = Student::where('stid', $stid)->first();

        // Update name and age fields
        $insert->name = $request->name;
        $insert->age = $request->age;

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $imageExtension = (new File($image))->extension();
            $imageName = pathinfo($imagePath, PATHINFO_FILENAME);

            // Update image field
            $insert->image = Storage::url($imagePath);
        }

        $insert->save();
        return redirect('/home')->with('message', 'Update Successfully!');
    }



}
