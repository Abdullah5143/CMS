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
        @if(Auth::User()->hasPermissionTo('add-employee'))
        <div class="container mt-5">
            <a href="{{ route('employee.create') }}" class="btn btn-primary">Add Employee</a>
        </div>
        @endif
        <div class="container mt-5">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                    
                        <th class="datatable-nosort">Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($employee as $item)
                    <tr>
                    <td class="table-plus">{{ $item->fname.' '.$item->lname }}</td>
                    <td>
                        @if (isset($item->company->name))
                        {{ $item->company->name }}
                        @endif
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        @if(Auth::User()->hasPermissionTo('delete-employee'))
                        <a href="">
                        <form action="{{ route('employee.destroy',[$item->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="save" value="Delete" class="btn btn-link btn-sm">
                        </form></a>
                        @endif
                        @if(Auth::User()->hasPermissionTo('show-employee'))
                        <a href='{{ route('employee.show',[$item->id]) }}' class="btn btn-link btn-sm">Show</a>
                        @endif
                        @if(Auth::User()->hasPermissionTo('update-employee'))
                        <a href='{{ route('employee.edit',[$item->id]) }}' class="btn btn-link btn-sm">Update</a>
                        @endif
                    </td>
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
