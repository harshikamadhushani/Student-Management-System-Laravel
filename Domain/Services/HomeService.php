<?php
namespace Domain\Services;
use App\Models\Student;

class HomeService{

    protected $insert;

    public function __construct()
    {
       $this->insert=new Student();
    }


    public function all(){
        return $this->insert->all();

    }

   public function delete($st_id){
         $insert=$this->insert->find($st_id);
         $insert->delete();
   }

  /* public function status($st_id){
    $std_info = Student::where('id', '=', $st_id)->first();

    if($std_info->status == 0){
        $this->insert->status = 1;
        $this->insert->update();
    } else {
        $this->insert->status = 0;
        $this->insert->update();
    }*/

   }



