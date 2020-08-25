@extends('core.login')
@section('content')
    <div class="title m-b-md">
        Đăng nhập
    </div>
    <div class="form-login">
        <form class="text-left" method="post"  action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputUsername">Tên người dùng</label>
                <input type="text"
                       class="form-control  @if($errors->has('name')) border border-danger
                @endif "
                       id="inputUsername "
                       name="name"
                       placeholder="Enter username"
                       >
            </div>
            @if($errors->has('name'))
                <p class="text-danger">
                    {{$errors->first('name')}}
                </p>
                @endif
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password"
                       class="form-control @if($errors->has('password')) border border-danger
                @endif "
                       id="inputPassword"
                       name="password"
                       placeholder="Password"
                       >
            </div>
            @if($errors->has('password'))
                <p class="text-danger">
                    {{$errors->first('password')}}
                </p>
            @endif
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
@endsection
