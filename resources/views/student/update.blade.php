@extends('home')
@section('content')
    <form method="post" action="{{route('students.update',$student->id)}}">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" class="form-control" name="name"  value="{{$student->name}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Address</label>
            <input type="text" class="form-control" name="address" value="{{$student->address}}">
        </div>
        <div class="form-group">
            <label>Roles select</label>
            @foreach($roles as $role)
                <div class="checkbox">
                    <label>
                        <input type="checkbox"
                               @foreach($student->roles as $role_student)
                                   @if($role_student->id == $role->id)
                                   checked
                                   @endif
                                   @endforeach
                               name="role[{{$role->id}}]"
                               value="{{ $role->id }}"> {{ $role->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

