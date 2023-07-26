@switch(Auth::user()->position->name)

    @case('生徒')
          @php
          $auth = '生徒';
          @endphp
        @break

    @case('指導員')
          @php
          $auth = '指導員';
          @endphp
        @break

    @default

    @break
@endswitch

<x-app-layout>

    @if($auth === '生徒')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:p-6 lg:p-8 bg-gray-300 bg-opacity-70 rounded-lg shadow-2xl">
        @if(!session('auth.instructor'))
        <label class="text-gray-900 text-xl font-bold">アカウント情報</label>
        <div class="max-w-4xl my-4 mx-auto bg-pastelblue-900 bg-opacity-50 shadow-md sm:rounded-lg p-6">
            <div class="text-lg mb-2 leading-10">
                名前 : {{Auth::user()->name}}<br>
                メールアドレス : {{Auth::user()->email}}<br>
                学校 : {{Auth::user()->school->name}}<br>
                所属クラス : {{Auth::user()->classroom->name}}<br>
                立場 : {{Auth::user()->position->name}}
            </div>
        </div>
        <label class="text-gray-900 text-xl font-bold">指導員認証</label>
        <label class="text-gray-900 text-base">（認証で生徒アカウントの変更ができます）</label>
        <div class="max-w-4xl my-4 mx-auto bg-pastelblue-900 bg-opacity-50 shadow-md sm:rounded-lg p-6">
            <form method="POST" action="{{ route('profile.edit.student') }}">
            @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                @if (session('status') === 'auth.false')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-red-600"
                >該当する指導員が存在しません</p>
                @endif

                <div class="flex justify-end">
                    <x-primary-button class="mt-3">
                        認証
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
        @endif


        @if(session('auth.instructor'))
            <label class="block text-gray-900 text-xl font-bold mb-4">
            {{Auth::user()->name}} のアカウント変更
            </label>
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-pastelblue-500 bg-opacity-70 shadow sm:rounded-lg">
                    <div class="max-w-4xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-pastelblue-500 bg-opacity-70 shadow sm:rounded-lg">
                    <div class="max-w-4xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
                
                <div class="p-4 sm:p-8 bg-pastelblue-500 bg-opacity-70 shadow sm:rounded-lg">
                    <div class="max-w-4xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        @endif

    </div>

    

    @elseif($auth === '指導員')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    
    <div class="py-12">

        

        <div class="w-full max-w-4xl mx-auto p-8 bg-gray-300 bg-opacity-70 rounded-md shadow-2xl">
            <label class="block text-gray-700 text-lg font-bold mb-4">
            {{Auth::user()->name}} のアカウント変更
            </label>
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-pastelpurple-500 bg-opacity-70 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-pastelpurple-500 bg-opacity-70 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
                
                <div class="p-4 sm:p-8 bg-pastelpurple-500 bg-opacity-70 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
</x-app-layout>
