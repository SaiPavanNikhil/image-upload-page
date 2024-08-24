<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Image</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style2.css')}}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <form action="{{ route('update', $image->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            Name:<input type="text" class="name" id="name" name="name" value="{{ $image->name }}"><br><br>
            Email:<input type="text" class="email" id="email" name="email" value="{{ $image->email }}"><br><br>
            <input type="file" name="image" id="image" aria-describedby="helpId"><br><br>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
    @if(session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
</body>
</html>
