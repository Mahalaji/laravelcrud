<link rel="stylesheet" href="{{ asset('css/adminpass.css') }}">
@extends('layout.app')
@section('content')
<main id="main" class="main"></main>
<h1>Update Password</h1>
<div class="form1">
    @php
    $user= session('user')
    @endphp
    <form name="simple" action="/adminpassword" method="POST">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$user->id}}" readonly><br><br>
        <label for="password">Old Password:</label><br>
        <input type="password" id="oldpassword" name="oldpassword"><br><br>
        <label for="newpassword">New Password:</label><br>
        <input type="password" id="newpassword" name="newpassword"><br><br>
        <input type="submit" value="Submit">
    </form>
</div>

</main>
@endsection