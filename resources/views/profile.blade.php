<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action ="{{ route('majNameEmail') }}">
                        @csrf
                        <x-label for="newName" :value="__('Your Name:')" />
                        <input type='text' name="newName" value="{{ Auth::user()->name  }} ">
                        <x-label for="newEmail" :value="__('Your Email:')" />
                        <input type='text' name="newEmail" value="{{ Auth::user()->email  }}">
                        <x-label for="newPhonenumber" :value="__('Your PhoneNumber:')" />
                        <input type='text' name="newPhonenumber" value="{{ Auth::user()->phonenumber  }}">
                        <x-button type='submit'>Update all</x-button>
                    </form>
                            </div>
                          </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
