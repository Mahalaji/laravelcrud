<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@extends('layout.app')
@section('content')
<main id="main" class="main"></main>
<h1 class="header">Add User</h1>
<form class="simple" method="post" action="/createuser">
    <div class="form1">
        @csrf
        <div class="input-group"> 
        <label>First Name</label>
            <input type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}" />
        </div>
        <p>@error('first_name'){{$message}}@enderror</p>
        <div class="input-group"> 
        <label>Last Name</label>
            <input type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}" />
        </div>
        <p>@error('last_name'){{$message}}@enderror</p>
        Gender:<br>
        <div class="radio_option">
            <input type="radio" name="gender" value="male" id="rd1">
            <label for="rd1">Male</label>
            <input type="radio" name="gender" value="female" id="rd2">
            <label for="rd2">Female</label>
        </div>
        <p>@error('gender'){{$message}}@enderror</p>
        <div class="input-group"> 
        <label>Email</label>
            <input type="email" name="email" placeholder="Email" value="{{old('email')}}" />
        </div>
        <p>@error('email'){{$message}}@enderror</p>
        <div class="input-group"> 
        <label>Password</label>
            <input type="password" name="password" placeholder="Password" value="{{old('password')}}" />
        </div>
        <p>@error('password'){{$message}}@enderror</p>
        <div class="input-group">
        <label>Confirm Password</label>
            <input type="password" name="confirmpassword" placeholder="Re-type Password"
                value="{{old('confirmpassword')}}" />
        </div>
        <p>@error('confirmpassword'){{$message}}@enderror</p>
        <div class="input-group">
        <label>Mobile Number</label>
            <input type="text" name="mobilenumber" placeholder="Mobile Number" value="{{old('mobilenumber')}}" />
        </div>
        <p>@error('mobilenumber'){{$message}}@enderror</p>
        <div class="input-group">
        <label>City</label>
            <input type="text" name="city" placeholder="City" value="{{old('city')}}" />
        </div>
        <p>@error('city'){{$message}}@enderror</p>
        <div class="input-group">
        <label>State</label>
            <input type="text" name="state" placeholder="State" value="{{old('state')}}" />
        </div>
        <p>@error('state'){{$message}}@enderror</p>
        <div class="input-group">
        <label>Pincode</label>
            <input type="text" name="pincode" placeholder="Pincode" value="{{old('pincode')}}" />
        </div>
        <p>@error('pincode'){{$message}}@enderror</p>
        <div class="input-group">
        <label>Country</label>
            <input type="text" name="country" placeholder="Country" value="{{old('country')}}" />
        </div>
        <p>@error('country'){{$message}}@enderror</p>
        <div class="input-group">
        <label for="address">Address</label>
            <textarea class="ta10em" type="text" name="address" placeholder="Address"
                value="{{old('address')}}"></textarea>
        </div>
        <p>@error('address'){{$message}}@enderror</p>
        <div class="submit">
        <button type="submit" class="btn" name="update">Add User</button>
    </div>
    </div>
</form>
</main>
@endsection