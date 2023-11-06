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
    <body class="antialiased">
        
        <div class="container mt-5 ">
            <h1 class="h2">Permission Information</h1>
            <a href="{{ route('permission.index') }}">return to Roles</a>
            
        <form action="" method="" class="col-md-6">
            @csrf            
            <label for="">Name</label>
            <input readonly type="text" name="fname" placeholder="Name" value="{{ $permission->name }}" class="form-control mt-2 mb-1"
                id=""><br>
            <label for="">Guard Name</label>
            <input readonly type="text" name="lname" placeholder="Enter Last Name" value="{{ $permission->guard_name }}" class="form-control mt-2 mb-1 "
                id=""><br>
        </form>
        </div>
    </body>
</html>
</x-app-layout>
