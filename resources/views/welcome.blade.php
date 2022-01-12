<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hard Corner</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
       @include('layouts.navigation')
       <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>
        </div>   
    </header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
            @foreach ($ads as $ad)
                <div class=" w-full lg:max-w-full align-items justify-items-center">
                    
                    <div class="border-r border-b border-l border-t border-gray-400 lg:border-l lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                        <p class="text-sm text-gray-600 flex items-center">
                            <img class="" src="{{asset("storage/images/$ad->picture")}}" width="100" height="100">
                          {{ $ad->created_at}}
                        </p>
                        <div class="text-gray-900 font-bold text-xl mb-2">{{$ad->title}}</div>
                        <p class="text-gray-700 text-base">{{ $ad->description}}</p>
                      </div>
                      <div class="flex items-center">
                        <div class="text-sm">
                          {{-- <p class="text-gray-900 leading-none">{{$ad->category_id}}</p> --}}
                          <p class="text-gray-900 leading-none">            
                            @foreach ($tableCategory as $nameCategory) 
                                @if ($ad->category_id === $nameCategory->id)
                              {{$nameCategory->name}}
                                @else  
                                @endif 
                            @endforeach</p>
                          <p class="text-gray-600">{{$ad->location}}</p>
                          <p class="text-gray-900 font-bold">{{$ad->price}}$</p>
                        </div>
                      </div>
                    </div>
            </div>
            @endforeach
            </div>
            {{ $ads->links()}}
            </div>
        </div>
        </div>
    </div>
        <footer class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <p>Copyright © Hard Corner 2021</p> 
            </div>
        </footer>
    </body>
    
</html>
