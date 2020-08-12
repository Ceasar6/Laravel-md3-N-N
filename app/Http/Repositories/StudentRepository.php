<?php


namespace App\Http\Repositories;


use App\Student;

class StudentRepository
{
    protected $student;
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        return $this->student->all();
    }
    public function save($student)
    {
        $student->save();
    }
    public function getId($id)
    {
        return $this->student->findOrFail($id);
    }
    public function delete($id)
    {
        $this->student->destroy($id);
    }
}
