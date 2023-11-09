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
            <h1 class="h2">Employee Information</h1>
            <a href="{{ route('employee.index') }}">return to employees</a>
            
        <form action="" method="post" class="col-md-6">
            @csrf            
            <label for="">First Name</label>
            <input readonly type="text" name="fname" placeholder="Enter First Name" value="{{ $emp->fname }}" class="form-control mt-2 mb-1"
                id=""><br>
            <label for="">Last Name</label>
            <input readonly type="text" name="lname" placeholder="Enter Last Name" value="{{ $emp->lname }}" class="form-control mt-2 mb-1 "
                id=""><br>
                <label for="">Company</label>
                <input readonly type="text" name="fname" placeholder="Company" value="@if (isset($emp->company->name)) @endif" class="form-control mt-2 mb-1"
                id=""><br>
            <label for="">Email</label>
            <input readonly type="text" name="email" placeholder="Enter Email" value="{{ $emp->email }}"  class="form-control mt-2 mb-1"
                id=""><br>
            <label for="">Phone</label>
            <input readonly type="text" name="phone" placeholder="Enter Phone" value="{{ $emp->phone }}"  class="form-control mt-2 mb-1"
                id=""><br>
        </form>
        </div>
    </body>
</html>
</x-app-layout>
