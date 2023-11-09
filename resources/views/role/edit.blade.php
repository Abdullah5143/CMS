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
            <h1 class="h2">Update Role</h1>
            <a href="{{ route('role.index') }}">return to employees</a>
            
        <form action="{{ route('role.update',[$role->id]) }}" method="post" >
            @csrf
            @method('put')
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Role Name" value="{{ $role->name }}" class="form-control mt-2 mb-1 @error('name') is-invalid @enderror"
                id="">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
                <div class="flex">
                    <label>Assigned Permissions:</label>
                </div>
                <div class="flex">
                    
                    <br>
                    @if($role->permissions)
                    <div class="col-10 ">
                        @foreach($role->permissions as $role_permission)
                            <div class="btn btn-outline-danger ms-2 col-md-3">{{ $role_permission->name }}
                                <button type="button" class="btn-close btn-close-white btn-sm pb-2" onclick="revokePermission({{$role->id}}, {{$role_permission->id}})"></button>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <br>
            <input type="submit" name="save" value="Save" class="btn btn-info">
        </form>
        <form action="{{ route('role.revokePermission') }}" id="revokePermissionForm" method="post" onsubmit="return confirm('You want to delete permission?');" >
            @csrf
        </form>
    </div>
    <div class="container mt-5 form-control">
        <h1 class="h2">Give Permissions</h1>
        
        <form action="{{ route('role.permissions',[$role->id]) }}" method="post" >
            @csrf
            {{-- @method('put') --}}
            <label for="">Permissions</label>
                <select name="permission" id="company" class="form-control mt-2 mb-1 @error('permission') is-invalid @enderror">
                <option value="">
                    Select
                </option>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}">
                        {{ $permission->name }}
                    </option>
                @endforeach
                </select>
                <span class="text-danger">
                    @error('permission')
                        {{ $message }}
                    @enderror
                </span><br>
            
            <input type="submit" name="save" value="Save" class="btn btn-info">
        </form>
        </div>
        <div id="mouse" class="btn btn-primary" onmouseover="mouse()" >Click me</div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function mouse(){
        $('#mouse').append('<button class="btn-close" id="cross"></button>')
    }
    function revokePermission(roleId, permissionId) {
        console.log(roleId)
        console.log(permissionId)
        
        $('#revokePermissionForm').append('<input type="hidden" name="role" value="'+roleId+'">','<input type="hidden" name="permission" value="'+permissionId+'">')
        $('#revokePermissionForm').submit()
    }
</script>
</x-app-layout>
