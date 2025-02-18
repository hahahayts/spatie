@extends('layout.layout')

@section('content')
    <div class="flex justify-center m-2 ">
        <div class="flex flex-col gap-3 w-full">
            <h1 class="text-xl font-semibold ">Edit Permission</h1>
            <h3 class="text-xl">Name: 
                <span class="ml-2"> 
                    {{$user->name}}
                </span>
            </h3>
            <form action="{{ url('/users/edit-permission/' . $user->id) }}" method="POST" class="flex justify-around">
                @csrf
                
                <div>
                    <input type="checkbox" name="permissions[]" value="manage-events" 
                        @if($user->hasPermissionTo('manage-events')) checked @endif>
                    <label for="">Manage Events</label>
                </div>

                <div>
                    <input type="checkbox" name="permissions[]" value="manage-transactions" 
                        @if($user->hasPermissionTo('manage-transactions')) checked @endif>
                    <label for="">Manage Transactions</label>
                </div>

                <div>
                    <input type="checkbox" name="permissions[]" value="view-events" 
                        @if($user->hasPermissionTo('view-events')) checked @endif>
                    <label for="">View Events</label>
                </div>

                <button type="submit">Save new permission</button>
            </form>
        </div>
    </div>
@endsection
