<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->

    </head>
    <body >
        <div class="container mt-5 ">
            <h1 class="h2">Company Information</h1>
            <a href="{{ route('company.index') }}">return to companies</a>
            <br><br>
        <form action="" method="post" class="col-md-6" enctype="multipart/form-data">
            @csrf
            
            <img src="{{ URL::asset('uploads/'.$com->logo) }}" class = "rounded-circle" width="150px" /><br>
            <label for="">Name</label>
            <input readonly type="text" name="name" placeholder="Enter Name" value="{{ $com->name }}" class="form-control mt-2 mb-1 @error('name') is-invalid @enderror"
                id="">
                <br>
            <label for="">Email</label>
            <input readonly type="text" name="email" placeholder="Enter Email" value="{{ $com->email }}" class="form-control mt-2 mb-1 @error('email') is-invalid @enderror"
                id="">
                <br>
            <label for="">Website</label>
            <input readonly type="text" name="website" placeholder="Enter Email" value="{{ $com->website }}" class="form-control mt-2 mb-1 @error('website') is-invalid @enderror"
                id="">
                <br>
        </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </body>
</html>
</x-app-layout>
