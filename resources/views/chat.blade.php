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
          チャット画面 生徒
      </h2>
  </x-slot>

  <div class="py-12">
    <p>生徒用</p>
  </div>

@elseif($auth === '指導員')

  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            チャット画面 指導員
        </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-xl mx-auto">
      <form action="{{route('chat.store')}}" method="post">
          @csrf
          <textarea rows="10" cols="50" name="sentence">{{ isset($sentence) ? $sentence : '' }}</textarea>
          <button type="submit">ChatGPT</button>
      </form>
  
      {{-- 結果 --}}
      <div class="mt-10 text-center">
        <p>{{ isset($chat_response) ? $chat_response : '' }}</p>
      </div>
    </div>
  </div>

@endif

</x-app-layout>