<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::user()->id === 1)
            指導員ページ
            @else
            生徒用ページ
            @endif
        </h2>
    </x-slot>


    @if(Auth::user()->id === 1)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-input-label value="指導員用メニュー"/>
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="#">相談フォーム 確認画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">学内予定表 編集画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">体調報告 確認画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">進路報告 確認画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">緊急連絡 編集画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">教員予定表 確認・編集画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">生徒出席状況 確認画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">生徒・指導員登録画面</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-input-label value="生徒用メニュー"/>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="#">相談フォーム 送信画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">学内予定表 確認画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">出席・体調報告 送信画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">進路報告 送信画面</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">緊急連絡 確認画面</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
