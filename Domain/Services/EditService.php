<?php
namespace Domain\Services;
use App\Models\Student;
use Illuminate\Http\Request;

class EditService
{
    protected $insert;

    public function __construct()
    {
       $this->insert=new Student();
    }

public function get($st_id){
        return $this->insert->find($st_id);
    }



    public function all(){
        return $this->insert->all();

    }
   /* public function edit($st_id){
        $insert=$this->insert->find($st_id);
        $insert->fill->all();
        $insert->save();
       }
       */
       public function update(array $data,$task_id){
        $task=$this->insert->find($task_id);
        $task->update($this->edit($task,$data));
       }

       protected function edit(Student $task,$data){
        return array_merge($task->toArray(),$data);
       }
}
