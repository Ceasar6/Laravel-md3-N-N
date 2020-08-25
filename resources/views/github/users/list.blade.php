@extends('core.menu')
@section('content')
    <br>
    <div class="cart-mt-4">
        <div class="row">

            <div class="col-md-3">
                <h2> List Users</h2>
            </div>
            <div class="col-md-9">
                <form class="form-inline my-2 my-lg-0" method="get" action="{{route('github.search')}}">
                    <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Link</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if(!isset($users))
                <tr>
                    <td>
                        No Data
                    </td>
                </tr>
            @else
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$user->login}}</td>
                        <td><a target="_blank" href="{{$user->html_url}} ">{{$user->html_url}} </a></td>
                        <td><img width="100" src="{{$user->avatar_url}} "></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection

