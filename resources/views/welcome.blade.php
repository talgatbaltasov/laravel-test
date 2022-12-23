<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send SMS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{route('send')}}" method="post">
                    @csrf
                    <label class="block my-2">
                        <span class="text-gray-700">Account</span>
                        <select name="account_id" id="account_id" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="">Select...</option>
                            @foreach($accounts as $id => $name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block my-2">
                        <span class="text-gray-700">Content</span>
                        <textarea name="content" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3"></textarea>
                    </label>
                    <x-jet-button>Send</x-jet-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>