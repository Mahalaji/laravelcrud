@extends('layout.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<main id="main" class="main">
    <h1>Profile</h1>
    <div class="form1">
        <form name="simple">
            <div id="d">
                <div>
                    @php
                    $user= session('user')
                     @endphp
                    <label for="name">First Name:</label><br>
                    <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}" readonly><br><br>

                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" value="{{$user->email}}" readonly><br><br>

                    <label for="mobilenumber">Mobile Number:</label><br>
                    <input type="text" id="mobilenumber" name="mobilenumber"value="{{$user->mobilenumber}}" readonly><br><br>

                    <label for="city">City:</label><br>
                    <input type="text" id="city" name="city" value="{{$user->city}}" readonly><br><br>
                    <label for="state">State:</label><br>
                    <input type="text" id="state" name="state" value="{{$user->state}}" readonly><br><br>

                </div>
                <div>
                    <label for="name">Last Name:</label><br>
                    <input type="text" id="last_name" name="last_name" value="{{$user->last_name}}" readonly><br><br>

                    <label for="country">Country:</label><br>
                    <input type="text" id="country" name="country" value="{{$user->country}}" readonly><br><br>

                    <label for="pincode">Pincode:</label><br>
                    <input type="text" id="pincode" name="pincode" value="{{$user->pincode}}" readonly><br><br>

                    <label for="address">Address:</label><br>
                    <input type="text" id="address" name="address" value="{{$user->address}}" readonly><br><br>

                    <label for="gender">Gender:</label><br>
                    <input type="text" id="gender" name="gender" value="{{$user->gender}}" readonly><br><br>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection