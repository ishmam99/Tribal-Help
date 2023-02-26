<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

    <div class="wrapper">
        <div id="formContent">
            <div class="fadeIn first">
               <h4 class="text-center mb-4">লগ-ইন</h4>
            </div>
            <form class="text-center" action="{{url()->to('login')}}" method="POST">
                @csrf
                <input type="text" id="login" class="fadeIn first form-control mb-3" name="username" placeholder="ইউজারের নাম" required autofocus>
                <input type="password" id="password" class="fadeIn second form-control mb-3" name="password" placeholder="পাসওয়ার্ড" required>
                <input type="submit" class="login_btn fadeIn third  button theme_button" value="লগ-ইন">
            </form>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
