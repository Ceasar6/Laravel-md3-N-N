<?php


namespace App\Http\Services;


use App\Http\Repositories\StudentRepository;
use App\Role;
use App\Student;
use Illuminate\Http\Request;

class StudentService
{
    protected $studentRepository;
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        return $this->studentRepository->index();
    }
    public function showFormAdd()
    {
        return view('student.list');
    }

    public function add($request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->address = $request->address;
        $this->studentRepository->save($student);
        $student->roles()->sync($request->role);
    }
    public function getId($id)
    {
       return $this->studentRepository->getId($id);
    }
    public function update(Request $request, $id)
    {
        $student = $this->studentRepository->getId($id);
        $student->name = $request->name;
        $student->address = $request->address;
        $this->studentRepository->save($student);
        $student->roles()->sync($request->role);
    }
    public function delete($id)
    {
       $student = $this->studentRepository->getId($id);
       $student->roles()->detach();
       $this->studentRepository->delete($id);

    }
}
