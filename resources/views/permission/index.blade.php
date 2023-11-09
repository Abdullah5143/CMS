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
        @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
            @endif
        {{-- <div class="container mt-5">
            <a href='{{ route('permission.create') }}' class="btn btn-primary">Add Permission</a>
        </div> --}}
        <div class="container mt-5">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        {{-- <th class="datatable-nosort">Action</th> --}}
                    </tr>

                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        
                    <tr>
                    <td>{{ $permission->name }}</td>
                    {{-- <td>
                        <a href="">
                            <form action="{{ route('permission.destroy',[$permission->id]) }}" method="post" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link btn-sm">Delete</button>
                            </form>
                        </a>
                            <a href='{{ route('permission.show',[$permission->id]) }}' class="btn btn-link btn-sm">View</a>
                            <a href='{{ route('permission.edit',[$permission->id]) }}' class="btn btn-link btn-sm">Update</a>
                    </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script>let table = new DataTable('#myTable');</script>
    </body>
</html>
</x-app-layout>
