<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  @if ($ads->isEmpty())
                  <h3>No ads published</h3>
                  @endif
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
                          <div class="flex space-x-2">
                            <form action="{{ route('ads.edit', ['id' => $ad->id]) }}">
                              <x-button>Edit</x-button>
                            </form>
                            <form action="{{ route('ads.destuction', ['id' => $ad->id]) }}">
                              <x-button class="bg-red-600">Delete</x-button>
                            </form>
                            </div>
                          </div>
                </div>
                    @endforeach
                </div>
                {{ $ads->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
