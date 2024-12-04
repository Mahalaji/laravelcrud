@extends('layout.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/profileupdate.css') }}">
<main id="main" class="main">
    <h1>Update Profile</h1>
    <div class="form1">
        <form name="simple" action="/updateprofile" method="post">
        @csrf
            <div id="d">
                <div>
                    @php
                    $user= session('user')
                     @endphp
                    <label for="name">First Name:</label><br>
                    <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}" ><br><br>

                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" value="{{$user->email}}" ><br><br>

                    <label for="mobilenumber">Mobile Number:</label><br>
                    <input type="text" id="mobilenumber" name="mobilenumber"value="{{$user->mobilenumber}}" ><br><br>

                    <label for="city">City:</label><br>
                    <input type="text" id="city" name="city" value="{{$user->city}}" ><br><br>
                    <label for="state">State:</label><br>
                    <input type="text" id="state" name="state" value="{{$user->state}}" ><br><br>
                    <input type="hidden" id="password" name="password" value="{{$user->password}}" readonly><br><br>
                    <input type="hidden" id="id" name="id" value="{{$user->id}}" readonly><br><br>


                </div>
                <div>
                    <label for="name">Last Name:</label><br>
                    <input type="text" id="last_name" name="last_name" value="{{$user->last_name}}" ><br><br>

                    <label for="country">Country:</label><br>
                    <input type="text" id="country" name="country" value="{{$user->country}}" ><br><br>

                    <label for="pincode">Pincode:</label><br>
                    <input type="text" id="pincode" name="pincode" value="{{$user->pincode}}" ><br><br>

                    <label for="address">Address:</label><br>
                    <input type="text" id="address" name="address" value="{{$user->address}}"><br><br>

                    <label for="gender">Gender:</label><br>
                    <input type="text" id="gender" name="gender" value="{{$user->gender}}" ><br><br>
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</main>
@endsection