@extends('home')
@section('content')
    <div class="col-12">
        <h2> List Student</h2>
    </div>
    <a href="{{route('students.create')}}">Add Student</a>
    <div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Position</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if(count($students)== 0)
                <tr>
                    <td>
                        No Data
                    </td>
                </tr>
            @else
                @foreach($students as $key => $student)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->address}}</td>
                        <td> @foreach($student->roles as $role)
                                {{$role->name}}<br>
                            @endforeach</td>
                        <td><a href="{{route('students.formUpdate',$student->id)}}">Edit</a></td>
                        <td><a href="{{route('students.delete',$student->id)}}" class="text-danger">Delete</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
