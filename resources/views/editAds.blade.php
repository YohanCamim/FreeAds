<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Ad') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <img class="" src="{{asset("storage/images/$ads->picture")}}" width="100" height="100">
                    <form method="post" action="{{ route('ads.update', ['id' => $ads->id] ) }} "enctype="multipart/form-data">
                          @csrf
                          <div class="m-3">
                          <label for="title">Title :</label>
                          <input type="text" class="form-control" name="title" value="{{ $ads->title }}"/>
                        </div>
                    <div class="m-3">
                        <label for="category_id">Category :</label>
                        <select name="category_id" placeholder="category_id" class="form-select" aria-label="category">
                          @foreach ($tableCategory as $nameCategory)   
                          <option value="{{$nameCategory->id}}" 
                            @if ($nameCategory->id === $ads->category_id) 
                              selected
                            @endif
                            >{{$nameCategory->name}}</option> 
                          @endforeach
                        </select>
                    </div>

                        {{-- <div class="form-group">
                            <label for="category_id">Category :</label>
                            <input type="text" class="form-control" name="category_id" value="{{ $ads->category_id }}"/>
                        </div> --}}
                        <div class="m-3">
                          <label for="picture">Picture :</label>
                          <input type="file" class="form-control" name="picture" value="{{ $ads->picture }}"/>
                      </div>
                      <div class="m-3">
                        <label for="location">Location :</label>
                        <input type="text" class="form-control" name="location" value="{{ $ads->location }}"/>
                    </div>
                    <div class="m-3">
                      <label for="description">Description :</label>
                      <textarea id="description" class="form-textarea mt-1 block w-full" name="description" row="10" required>{{ $ads->description }}</textarea>
                      
                    </div>
                        <div class="m-3">  
                          <label for="price">Price :</label>
                          <input type="text" class="form-control" name="price" value="{{ $ads->price }}"/>
                      </div>
                      <div class="flex space-x-2">
                        <x-button type="submit" class="bg-green-400">Update</x-button>
                    </form>
                    <form action="/dashboard">
                      <x-button>Cancel</x-button>
                    </form>
                    <p>{{ $var ?? '' }}</p>
              </div>
                            </div>
                          </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
