<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  

</head>

<body>
    <form action="/adduser" method="post">
        @csrf
        <div class="form_wrapper">
            <div class="form_container">
                <div class="title_container">
                    <h2>User Registration </h2>
                </div>
                <div class="row clearfix">
                    <div class="">
                        <form>
                        <div class="row clearfix">
                                <div class="col_half">
                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                        <input type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}" />
                                    </div>
                                    <p>@error('first_name'){{$message}}@enderror</p>
                                </div>
                                <div class="col_half">
                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                        <input type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}"/>
                                    </div>
                                    <p>@error('last_name'){{$message}}@enderror</p>
                                </div>
                            </div>
                            Gender:<br><div class="radio_option" >
                                <input type="radio" name="gender" value="male" id="rd1">
                                <label for="rd1">Male</label>
                                <input type="radio" name="gender" value="female" id="rd2">
                                <label for="rd2">Female</label>
                            </div>
                            <p>@error('gender'){{$message}}@enderror</p>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i> </span>
                                <input type="email" name="email" placeholder="Email" value="{{old('email')}}"  />
                            </div>
                                <p>@error('email'){{$message}}@enderror</p>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                <input type="password" name="password" placeholder="Password" value="{{old('password')}}" />
                            </div>
                            <p>@error('password'){{$message}}@enderror</p>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                <input type="password" name="confirmpassword" placeholder="Re-type Password" value="{{old('confirmpassword')}}" />
                            </div>
                            <p>@error('confirmpassword'){{$message}}@enderror</p>
                            <div class="input_field"> <span><i class="fa-solid fa-mobile-screen-button"></i></span>
                                <input type="text" name="mobilenumber" placeholder="Mobile Number" value="{{old('mobilenumber')}}" />
                            </div>
                            <p>@error('mobilenumber'){{$message}}@enderror</p>
                            <div class="input_field"> <span><i aria-hidden="true" class="fas fa-city"></i></span>
                                <input type="text" name="city" placeholder="City" value="{{old('city')}}" />
                            </div>
                            <p>@error('city'){{$message}}@enderror</p>
                            <div class="input_field"> <span><i aria-hidden="true" class="fas fa-city"></i></span>
                                <input type="text" name="state" placeholder="State" value="{{old('state')}}" />
                            </div>
                            <p>@error('state'){{$message}}@enderror</p>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                                <input type="text" name="pincode" placeholder="Pincode" value="{{old('pincode')}}"/>
                            </div>
                            <p>@error('pincode'){{$message}}@enderror</p>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-flag"></i></span>
                                <input type="text" name="country" placeholder="Country" value="{{old('country')}}" />
                            </div>
                            <p>@error('country'){{$message}}@enderror</p>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-address-card"></i></span>
                                <textarea class="ta10em" type="text" name="address" placeholder="Address" value="{{old('address')}}" ></textarea>
                            </div>
                            <p>@error('address'){{$message}}@enderror</p>

                                <div class="input_field checkbox_option">
                                <input type="checkbox" id="cb1">
                                <label for="cb1">I agree with terms and conditions</label>
                            </div>
                            <input class="button" type="submit" value="Register" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>