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
        <div class="container mt-5 form-control">
            <h1 class="h2">Add new employee</h1>
            <a href="{{ route('employee.index') }}">return to employees</a>
        <form action="{{ route('employee.store') }}" method="post" >
            @csrf
            <label for="">First Name</label>
            <input type="text" name="fname" placeholder="Enter First Name" class="form-control mt-2 mb-1 @error('fname') is-invalid @enderror"
                id="">
                <span class="text-danger">
                    @error('fname')
                        {{ $message }}
                    @enderror
                </span><br>
            <label for="">Last Name</label>
            <input type="text" name="lname" placeholder="Enter Last Name" class="form-control mt-2 mb-1 @error('lname') is-invalid @enderror"
                id="">
                <span class="text-danger">
                    @error('fname')
                        {{ $message }}
                    @enderror
                </span><br>
                <label for="">Company</label>
                <select name="company" id="company" class="form-control mt-2 mb-1 @error('company') is-invalid @enderror">
                <option value="">
                    Select Company
                </option>
                @foreach ($company as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>
                @endforeach
                </select>
                <span class="text-danger">
                    @error('company')
                        {{ $message }}
                    @enderror
                </span><br>
                <label for="">Role</label>
                <select name="role" id="company" class="form-control mt-2 mb-1 @error('role') is-invalid @enderror">
                <option value="">
                    Select Role
                </option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">
                        {{ $role->name }}
                    </option>
                @endforeach
                </select>
                <span class="text-danger">
                    @error('role')
                        {{ $message }}
                    @enderror
                </span><br>
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Enter Email" class="form-control mt-2 mb-1 @error('email') is-invalid @enderror"
                id=""><span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span><br>
            <label for="">Phone</label>
            <input type="text" name="phone" placeholder="Enter Phone" class="form-control mt-2 mb-1 @error('phone') is-invalid @enderror"
                id="">
                <span class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </span><br>
            <input type="submit" name="save" value="Save" class="btn btn-info">
        </form>
        </div>
    </body>
</html>
</x-app-layout>
