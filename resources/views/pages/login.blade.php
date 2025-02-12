@extends('layout.layout')

@section('content')
    <div class="login-container min-h-screen w-full  flex justify-center items-center">
        <div class="w-1/2 shadow-xl p-10 bg-white rounded-lg">
            <h1 class="text-3xl font-semibold text-center">Login</h1>
            <form action="{{route('login')}}" method="post" class=" flex flex-col gap-6  p-2">
                @csrf
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required placeholder="Enter your email...">
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" required placeholder="Enter your password...">
                </div>

                <button type="submit" class="border border-green-500 hover:bg-green-500 hover:text-white font-semibold duration-100 p-2 rounded-lg">Login</button>
                
                @session('error')
                    <div class="text-red-500 text-center p-2 text-[12px]">
                        {{session('error')}}
                    </div>
                @endsession
            </form>
        </div>
    </div>
@endsection