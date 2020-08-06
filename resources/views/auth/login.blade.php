@extends('layouts.app')

@section('content')
    <div class="mx-auto h-full flex  justify-center items-center bg-gray-300">
        <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
            <div class="col-md-8">
                <div class="card">
                            <h1 class="text-white text-2xl py-2 px-2 rounded border text-center border-white">CRM VUE</h1>
                    <h1 class="text-white text-3xl pt-8">Welcome back</h1>
                    <h2 class="text-blue-300 ">Enter your credentials below</h2>

                    <form method="POST" action="{{ route('login') }}" class="pt-8">
                        @csrf

                        <div class="relative">
                            <label for="email" class="text-blue-500  uppercase text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                            <div class="">
                                <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                                       name="email" value="{{ old('email') }}"  autocomplete="email"
                                       placeholder="your@email.com">

                                @error('email')
                                <span class="text-red-600 text-cs pt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative pt-3">
                            <label for="password"
                                   class="text-blue-500  uppercase text-xs font-bold absolute pl-3 pt-2">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" name="password"
                                       class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                                       autocomplete="current-password" placeholder="Password">

                                @error('password')
                                <span class="text-red-600 text-cs pt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-2">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="text-white" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="pt-8">
                            <button type="submit" class="uppercase text-blue-800 font-bold w-full bg-gray-400 py-2 px-3 text-left">
                                Login
                            </button>
                        </div>
                        <div class="flex pt-8 text-white justify-between text-sm font-bold">
                            <a class="" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>     <a class="" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
