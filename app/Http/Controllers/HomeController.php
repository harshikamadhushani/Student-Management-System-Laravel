<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Domain\Facades\HomeFacade;

class HomeController extends Controller
{
    protected $inserts;

    /*public function __construct()
    {
       $this->inserts=new Student();
    }*/

    public function index(){
        $response['inserts']=HomeFacade::all();
        return view('Pages\Home\index')->with($response);
    }

   public function delete($st_id){
        HomeFacade::delete($st_id);
         return redirect()->back();
   }

  /* public function status($st_id){

    HomeFacade::status($st_id);
      return redirect()->back();
}
*/
public function status($st_id){

    //HomeFacade::status($st_id);

    $Std = Student::find($st_id);
    $std_info = Student::where('id', '=', $st_id)->first();

    if($std_info->status == 0){
        $Std->status = 1;
        $Std->update();
    } else {
        $Std->status = 0;
        $Std->update();
    }

    return redirect()->back();

}


}
