<!-- 指導員用 -->

<x-app-layout>


    @if(Auth::user()->position->name === '生徒')

    @include('auth.access-unsuitable')
        
    @elseif(Auth::user()->position->name === '指導員')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            生徒・指導員登録画面
        </h2>
    </x-slot>

    <div class="my-10 m-auto max-w-3xl p-10 bg-pastelpurple-500 bg-opacity-70 shadow-2xl overflow-hidden sm:rounded-lg">
        <label class="block text-gray-900 text-xl font-bold mb-6">登録フォーム</label>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Position -->
            <div class="mt-4">
                <x-input-label for="position" :value="__('Position')" />
                <div class="bg-white rounded-md mt-1 p-3">
                    @foreach ($positions as $position)
                    <div class="flex items-center py-2">
                        @if($position->id===1)
                        <input checked id="{{$position->id}}" type="radio" value="{{$position->id}}" name="position_id" class="transition w-4 h-4 text-blue-600 bg-gray-300 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        @else
                        <input id="{{$position->id}}" type="radio" value="{{$position->id}}" name="position_id" class="transition w-4 h-4 text-blue-600 bg-gray-300 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        @endif
                        <label for="{{$position->id}}" class="w-full ml-2 text-sm font-medium text-gray-900 hover:text-gray-500 dark:text-gray-300 cursor-pointer transition">{{ $position->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- School -->
            <div class="mt-4">
                <x-input-label for="school" :value="__('School')" />
                <select id="school" name="school_id" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option class="hidden"></option>
                    @foreach($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('school_id')" class="mt-2" />
            </div>
            
            <!-- Classroom -->
            <div class="mt-4">
                <x-input-label for="classroom" :value="__('Classroom')" />
                <select id="classroom" name="classroom_id" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option class="hidden"></option>
                    @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('classroom_id')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> -->

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    @endif

    
</x-app-layout>
