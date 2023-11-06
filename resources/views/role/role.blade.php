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
                <h1 class="h2">Assign role</h1>
                <a href="{{ route('employee.index') }}">return to employees</a>
                
            <form action="{{ route('employee.role',[$role->id]) }}" method="post" >
                @csrf
                {{-- @method('put') --}}
                    <label for="">Company</label>
                    <select name="role" id="role" class="form-control mt-2 mb-1 @error('role') is-invalid @enderror">
                    <option value="">
                        Select Role
                    </option>
                    @foreach ($role as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                    @endforeach
                    </select>
                    <span class="text-danger">
                        @error('role')
                            {{ $message }}
                        @enderror
                    </span><br>
                <input type="submit" name="save" value="Save" class="btn btn-info">
            </form>
            </div>
        </body>
    </html>
    </x-app-layout>
    