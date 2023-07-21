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
    <!-- 生徒用メニュー -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border border-blue-300 max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{ route('consultation.student') }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">相談フォーム 送信画面</a>
            </div>
            <div class="border border-blue-300 max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">学内予定表 確認画面</a>
            </div>
            <div class="border border-blue-300 max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">出席・体調報告 送信画面</a>
            </div>
            <div class="border border-blue-300 max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">進路報告 送信画面</a>
            </div>
            <div class="border border-blue-300 max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">緊急連絡 確認画面</a>
            </div>
        </div>
    </div>
    
    @elseif(Auth::user()->position->name === '指導員')
    <!-- 指導員用メニュー -->
    <div class="py-12">
        <div>
            <!-- {{Auth::user()->position->name}} -->
            {{Auth::user()->position_id}}
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border border-purple-300 max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">相談フォーム 確認画面</a>
            </div>
            <div class="border border-purple-300 max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">学内予定表 編集画面</a>
            </div>
            <div class="border border-purple-300 max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">体調報告 確認画面</a>
            </div>
            <div class="border border-purple-300 max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">進路報告 確認画面</a>
            </div>
            <div class="border border-purple-300 max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">緊急連絡 編集画面</a>
            </div>
            <div class="border border-purple-300 max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">教員予定表 確認・編集画面</a>
            </div>
            <div class="border border-purple-300 max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 transition">生徒出席状況 確認画面</a>
            </div>
            <div class="border border-purple-300 max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 hover:scale-105 shadow-md hover:shadow-2xl sm:rounded-lg transition ease-out">
                <a href="{{ route('register') }}" class="block p-6 font-bold text-center text-lg text-gray-700 transition">生徒・指導員登録画面</a>
            </div>
        </div>
    @endif
</x-app-layout>
