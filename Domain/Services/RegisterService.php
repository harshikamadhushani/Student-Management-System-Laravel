<?php
namespace Domain\Services;
use App\Models\Student;

class RegisterService{

    protected $insert;

    public function __construct()
    {
       $this->insert=new Student();
    }

    public function all(){
        return $this->insert->all();
    }

    public  function store($request){
        $this->insert->create($request);

    }
//HomeController
    public function index(){
        return $this->insert->all();

    }

   public function delete($st_id){
         $insert=$this->insert->find($st_id);
         $insert->delete();
   }

   public function status($st_id){
    $insert=$this->insert->find($st_id);
    $insert->status=0;
    $insert->update();
   }
}


