<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Ad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @auth
                    
                    <form method="POST" action="{{ route('newAd.store') }}" enctype="multipart/form-data">
                        @csrf
            
                        <!-- Title -->
                        <div>
                            <x-label for="title" :value="__('Title')" />
                            
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            @if ($errors->has('title'))
                            <p> {{ $errors->first('title')}} </p>
                            @endif
                        </div>
                        
                        <!-- Category -->
                        <div class="mt-4">
                        <label for="category_id">Catégorie :</label> 
                        <select name="category_id" placeholder="category_id" class="form-select" aria-label="category">
                            {{-- <option for="category_id" selected>Catégories</option> --}}
                            @foreach ($tableCategory as $nameCategory)   
                            <option value="{{$nameCategory->id}}">{{$nameCategory->name}}</option> 
                            @endforeach
                        </select>
                        </div>
                        {{-- <div class="mt-4">
                            <x-label for="category_id" :value="__('Category')" />
            
                            <x-input id="category_id" class="block mt-1 w-full" type="text" name="category_id" :value="old('category_id')" required />
                            @if ($errors->has('category_id'))
                            <p> {{ $errors->first('category_id')}} </p>
                            @endif
                        </div> --}}

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
            
                            <textarea id="description" class="form-textarea mt-1 block w-full" name="description" row="10":value="old('description')" required></textarea>
                            @if ($errors->has('description'))
                            <p> {{ $errors->first('description')}} </p>
                            @endif
                        </div>
            
                        <!-- Picture -->
                        <div class="mt-4">
                            <x-label for="picture" :value="__('Picture(s)')" />
            
                            <x-input id="picture" class="block mt-1 w-full" type="file" name="picture" accept="image/png, image/jpeg, image/bmp"/>
                                            @if ($errors->has('picture'))
                            <p> {{ $errors->first('picture')}} </p>
                            @endif
                        </div>
            
                        <!-- Localisation -->
                        <div class="mt-4">
                            <x-label for="location" :value="__('Location')" />
            
                            <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required />
                            @if ($errors->has('location'))
                            <p> {{ $errors->first('location')}} </p>
                            @endif
                        </div>
                        <!-- Price -->
                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')" />
            
                            <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                            @if ($errors->has('price'))
                            <p> {{ $errors->first('price')}} </p>
                            @endif
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Send') }}
                            </x-button>
                        </div>
                    </form>
                    
                        <p>{{ $var ?? '' }}</p>
                    @endauth

                    @guest
                        <h3>Please register or login for give us a new ad !</h3>
                    @endguest
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
