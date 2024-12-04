<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>

    <form action="/loginvalidation" method="post">
    @csrf
        <div class="wrapper">
            <form action="">
            <img src="https://www.absglobaltravel.com/public/images/footer-abs-logo.webp" height="100"style="margin-left: 35px;">
                <div class="input-box">
                    <input type="text" name="email" placeholder="Email">
                    <i class="fa fa-envelope"></i>
                </div>
                <p>@error('email'){{$message}}@enderror</p>

                <div class="input-box">
                    <input type="password" name="password" placeholder="password">
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <p>@error('password'){{$message}}@enderror</p>


                    <button type="submit" class="btn" id="sbmt">login</button>

            </form>
        </div>
    </form>
    
</body>
</html>
