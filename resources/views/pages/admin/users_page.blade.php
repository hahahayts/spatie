@extends('layout.layout')

@section('content')
<div class="w-3/4 mx-auto p-5">
    <table class=" w-full table-fixed border-spacing-2 ">
      
        <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th> Permission/s  </th>
            </tr>
        </thead>
        <tbody class="p-3">                      
                    @foreach ($users as $user)
                    <tr >

                             {{-- @foreach ($user->getPermissionsViaRoles() as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                 --}}
                        
                            @if (!($user->getRoleNames()->first() == 'admin'))
                            <td>
                                <p>{{ $user->name }} </p>  

                            </td>
                            <td>
                            <p>{{$user->getRoleNames()->first()}}</p>                
                            </td>
                            <td>
                                <ul class="text-sm list-disc">
                                    @foreach ($user->permissions as $permission)
                                        <li>{{ $permission->name }}</li>
                                    @endforeach
                                </ul>      
                            </td>

                            {{-- <td>
                                <ul class="text-sm list-disc">
                                    @foreach ($user->getPermissionsViaRoles() as $permission)
                                        <li>{{ $permission->name }}</li>
                                    @endforeach
                                </ul>      
                            </td> --}}
                            
                            
                            <td>
                                <a href="{{ url('/users/edit-permission/' . $user->id) }}">
                                    <button>Edit Permission</button>
                                </a>
                            </td>

                            <td>

                                <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:text-red-600 duration-75">Delete User</button>
                                </form>
                            </td>
                            @endif  
                        
                    </tr>
               
                    @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection