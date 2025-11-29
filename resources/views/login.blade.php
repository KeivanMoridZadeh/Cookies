@extends('layouts.app')
@section('content')
    <div class="container">
        
        <form class="max-w-sm mx-auto mt-5" method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="mb-5">
            <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Your email</label>
            <input type="email" id="email" name="email" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="name@flowbite.com" value="{{ old('email') }}" required />
            @error('email') <span class="error" style="color: rgb(238, 56, 56)">{{ $message }}</span> @enderror            
        </div>
            <div class="mb-5">
            <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Your password</label>
            <input type="password" id="password" name="password" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="••••••••" required />
            </div>
            <label for="remember" class="flex items-center mb-5">
            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft" required />
            <p class="ms-2 text-sm font-medium text-heading select-none">I agree with the <a href="#" class="text-fg-brand hover:underline">terms and conditions</a>.</p>
            </label>
            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 active:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-red-300 focus:ring-opacity-50">
                Submit
            </button>
        </form>
    </div>


  
@endsection