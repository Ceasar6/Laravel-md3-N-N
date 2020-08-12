<?php


namespace App\Http\Controllers;


use App\Http\Services\StudentService;
use App\Role;
use Illuminate\Http\Request;


class StudentController
{
    protected $studentService;
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;

    }
    public function index()
    {
        $students = $this->studentService->index();
        $roles = Role::all();
        return view('student.list', compact('students','roles'));
    }

    public  function showFormAdd()
    {
        $roles = Role::all();
        return view('student.create', compact('roles'));
    }
    public function add(Request $request)
    {

        $this->studentService->add($request);
        return redirect()->route('students.index');
    }
    public  function showFormEdit($id)
    {
        $students = $this->studentService->getId($id);
        $roles = Role::all();
        return view('student.create', compact('roles','students'));
    }
     public function update(Request $request,$id){
        $this->studentService->update($request, $id);
        return redirect()->route('students.index');
    }
    public function getID($id)
    {
        $student = $this->studentService->getId($id);
        $roles = Role::all();
        return view('student.update', compact('student', 'roles'));
    }
    public function delete($id)
    {
        $this->studentService->delete($id);
        return redirect()->route('students.index');
    }
}
