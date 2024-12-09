<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@extends('layout.app')
@section('content')
<main id="main" class="main"></main>
<h1 class="header">Edit User Details</h1>
<form class="simple" method="post" action="/updateuserdetails">
    <div class="form1">
        @csrf
        <div class="input-group">
            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name"
                value="{{ old('first_name', $user->first_name) }}"><br><br>
            <p>@error('first_name'){{$message}}@enderror</p>

            <label for="last_name">Last Name:</label><br>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}"><br><br>
            <p>@error('last_name'){{$message}}@enderror</p>

            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}"><br><br>
            <p>@error('email'){{$message}}@enderror</p>

            <label for="mobilenumber">Mobile Number:</label><br>
            <input type="text" id="mobilenumber" name="mobilenumber"
                value="{{ old('mobilenumber', $user->mobilenumber) }}"><br><br>
            <p>@error('mobilenumber'){{$message}}@enderror</p>

            <label for="city">City:</label><br>
            <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}"><br><br>
            <p>@error('city'){{$message}}@enderror</p>

            <label for="state">State:</label><br>
            <input type="text" id="state" name="state" value="{{ old('state', $user->state) }}"><br><br>
            <p>@error('state'){{$message}}@enderror</p>
            <div class="input-group">
                <input type="hidden" id="password" name="password" value="{{ old('password', $user->password) }}"
                    readonly>
                <input type="hidden" id="id" name="id" value="{{old('id',$user->id)}}" readonly>
            </div>
            <label for="country">Country:</label><br>
            <input type="text" id="country" name="country" value="{{ old('country', $user->country) }}"><br><br>
            <p>@error('country'){{$message}}@enderror</p>

            <label for="pincode">Pincode:</label><br>
            <input type="text" id="pincode" name="pincode" value="{{ old('pincode', $user->pincode) }}"><br><br>
            <p>@error('pincode'){{$message}}@enderror</p>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}"><br><br>
            <p>@error('address'){{$message}}@enderror</p>

            <label for="gender">Gender:</label><br>
            <input type="text" id="gender" name="gender" value="{{ old('gender', $user->gender) }}"><br><br>
            <p>@error('gender'){{$message}}@enderror</p>

            <div class="submit">
                <button type="submit" class="btn" name="update">Update User</button>
            </div>
        </div>
</form>
</div>

</main>
@endsection