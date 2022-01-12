<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Ad') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('ads.destroy',['id' => $ads->id]) }}">
                        <div class="form-group">
                          @csrf
                          <h3>Did you really want to delete this ad ?</h3>
                          <div class="flex space-x-2">
                          <x-button type="submit" class="bg-red-600">Delete</x-button>
                      </form>
                      <form action="/dashboard">
                        
                        <x-button>Cancel</x-button>
                      </form>
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
