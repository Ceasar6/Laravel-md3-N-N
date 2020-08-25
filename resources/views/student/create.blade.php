@extends('core.menu')
@section('content')
    <form method="post" action="{{route('students.add')}}">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name input">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Address</label>
            <input type="text" class="form-control" name="address"  placeholder="Address input">
        </div>
        <div class="form-group">
            <label>Roles select</label>
            @foreach($roles as $role)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="role[{{$role->id}}]"
                               value="{{ $role->id }}"> {{ $role->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
