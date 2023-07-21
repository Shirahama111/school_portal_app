<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::user()->id === 1)
            指導員メニュー
            @else
            生徒用メニュー
            @endif
        </h2>
    </x-slot>


    @if(Auth::user()->id === 1)
    <!-- 指導員用メニュー -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">相談フォーム 確認画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">学内予定表 編集画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">体調報告 確認画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">進路報告 確認画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">緊急連絡 編集画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">教員予定表 確認・編集画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">生徒出席状況 確認画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelpurple-500 hover:bg-pastelpurple-900 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">生徒・指導員登録画面</a>
            </div>
        </div>

    @else
    <!-- 生徒用メニュー -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">相談フォーム 送信画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">学内予定表 確認画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">出席・体調報告 送信画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">進路報告 送信画面</a>
            </div>
            <div class="max-w-4xl my-8 mx-auto bg-pastelblue-900 hover:bg-pastelblue-500 shadow-lg sm:rounded-lg transition">
                <a href="#" class="block p-6 font-bold text-center text-lg text-gray-700 hover:text-gray-500 transition">緊急連絡 確認画面</a>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
