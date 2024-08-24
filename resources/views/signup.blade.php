<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style3.css') }}">
</head>
<body>
    <h2>SignUp</h2>
    <form action="{{route('signup.store')}}" method="post">
        @csrf
        <div class="container">
        <div class="input-group">
        <input type="text" class="Fname" id="Fname" name="Fname" placeholder="First Name"></input>
        <input type="text" class="Lname" id="Lname" name="Lname" placeholder="Last Name"></input>
        </div>
        <input type="text" class="Uname" id="Uname" name="Uname" placeholder="User Name"></input><br>
        <input type="email" class="Email" id="Email" name="Email" placeholder="Email"></input><br>
        <input type="Password" class="Pass" id="Pass" name="Pass" placeholder="Password"></input><br>
        <input type="Password" class="ConPass" id="ConPass" name="ConPass" placeholder="Confirm password"></input><br>
        <button type="submit">Submit</button><br>
        <a href="/">Forgot Password?</a><br>
        <div class="account-login">
        <p>Do you already have an account? </p><a href="/">Login</a>
        </div>
    </div>
</form>
</body>
</html>