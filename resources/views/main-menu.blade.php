
<!-- 共通 -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::user()->position->name === '生徒')
            {{ Auth::user()->position->name }}
            @elseif(Auth::user()->position->name === '指導員')
            {{ Auth::user()->position->name }}
            @endif
            メニュー
        </h2>
    </x-slot>
    
    @if(Auth::user()->position->name === '生徒')

    @if(session('ok'))
    <p>ok</p>
    @endif
    <!-- 生徒用メニュー -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border border-blue-300 max-w-2xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{route('file-share.index',['directory_path' => encrypt('public/'.Auth::user()->school_id.'_'.Auth::user()->classroom_id)])}}" auth="{{ Auth::user()->position->name }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">ファイル共有画面</a>
            </div>
            <div class="border border-blue-300 max-w-2xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{ route('consultation.index') }}" auth="{{ Auth::user()->position->name }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">相談フォーム 送信画面</a>
            </div>
            <div class="border border-blue-300 max-w-2xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{ route('schedule.index') }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">学内予定表 確認画面</a>
            </div>
            <div class="border border-blue-300 max-w-2xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">出席・体調報告 送信画面</a>
            </div>
            <div class="border border-blue-300 max-w-2xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{ route('course.index') }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">進路報告 送信画面</a>
            </div>
            <div class="border border-blue-300 max-w-2xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{route('emergency-contact.index')}}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">緊急連絡 確認画面</a>
            </div>
        </div>
    </div>
    
    @elseif(Auth::user()->position->name === '指導員')
    <!-- 指導員用メニュー -->
    <div class="py-12">
        <div>
          
            @if(session('register_user'))

            <div x-data="{ modelOpen: false }">
                <button @click="modelOpen =!modelOpen" class="flex items-center justify-center mx-auto px-3 py-2 space-x-2 text-sm tracking-wide text-gray-100 shadow-xl hover:scale-110 capitalize transition duration-200 transform bg-green-600 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <span>登録ユーザ情報</span>
                </button>

                <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                        <div x-cloak @click="modelOpen = false" x-show="modelOpen" 
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0" 
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100" 
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-50" aria-hidden="true"
                        ></div>

                        <div x-cloak x-show="modelOpen" 
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                        >
                            <div class="flex items-center justify-between space-x-4">
                                <h1 class="text-xl font-medium text-gray-800 ">登録ユーザ情報</h1>

                                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>

                            <div class="mx-auto my-4 p-2">
                                <p>ユーザ名 : {{ session('register_user')->name }}</p>
                                <p>メールアドレス : {{ session('register_user')->email }}</p>
                                <p>パスワード : {{ session('password') }}</p>
                                <p>立場 : {{ session('register_user')->position->name }}</p>
                                <p>学校名 : {{ session('register_user')->school->name }}</p>
                                <p>所属クラス : {{ session('register_user')->classroom->name }}</p>
                            </div>

                            
                            <div class="flex justify-center mt-6">
                                    <p>ページを離れると、この画面は確認できなくなります</p>
                                    <button type="button" @click="modelOpen = false" class="ml-2 px-5 py-1 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-green-500 shadow-xl">
                                        確認
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif


        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border border-purple-300 max-w-2xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{route('file-share.index',['directory_path' => encrypt('public/'.Auth::user()->school_id.'_'.Auth::user()->classroom_id)])}}" auth="{{ Auth::user()->position->name }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">ファイル共有画面</a>
            </div>
            <div class="border border-purple-300 max-w-2xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{ route('consultation.index') }}" auth="{{ Auth::user()->position->name }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">相談フォーム 確認画面</a>
            </div>
            <div class="border border-purple-300 max-w-2xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{ route('schedule.index') }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">学内予定表 編集画面</a>
            </div>
            <div class="border border-purple-300 max-w-2xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">出席・体調報告 確認画面</a>
            </div>
            <div class="border border-purple-300 max-w-2xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{ route('course.index') }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">進路報告 確認画面</a>
            </div>
            <div class="border border-purple-300 max-w-2xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{route('emergency-contact.index')}}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">緊急連絡 編集画面</a>
            </div>
            <div class="border border-purple-300 max-w-2xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{ route('register') }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">生徒・指導員登録画面</a>
            </div>
        </div>
    @endif
</x-app-layout>
