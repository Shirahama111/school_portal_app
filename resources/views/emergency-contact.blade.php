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
        緊急連絡 確認画面
      </h2>
  </x-slot>

  <div class="py-12">
    @foreach($emergency_contacts as $index => $emergency_contact)
          <div class="max-w-4xl mx-auto my-8 p-8 {{ $loop->even ? 'bg-gray-100' : 'bg-gray-300' }} rounded-md shadow-xl">
            <p class="font-bold">{{$emergency_contact->user->name}}</p>
            <p class="p-8 whitespace-pre-wrap">{{$emergency_contact->content}}</p>
            <p class="text-right">{{$emergency_contact->created_at}}</p>
          </div>
    @endforeach
  </div>

@elseif($auth === '指導員')

  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          緊急連絡 編集画面
        </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-4xl mx-auto p-8 bg-gray-300 rounded-md shadow-xl">
      <form action="{{route('emergency-contact.store')}}" method="post">
        @csrf
        <label for="content" class="mb-4 block text-base font-bold text-gray-900">緊急連絡内容</label>
        <textarea id="content" name="content" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" placeholder="内容をご記入ください"></textarea>
        <div class="flex justify-end mt-4">
          <x-primary-button>送信</x-primary-button>
        </div>
        @isset($messege)
          <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-600"
            >{{$messege}}</p>
        @endisset
      </form>
    </div>

    @foreach($emergency_contacts as $index => $emergency_contact)
          <div class="max-w-4xl mx-auto my-8 p-8 {{ $loop->even ? 'bg-gray-100' : 'bg-gray-300' }} rounded-md shadow-xl">
            <p class="font-bold">{{$emergency_contact->user->name}}</p>
            <p class="p-8 whitespace-pre-wrap">{{$emergency_contact->content}}</p>
            <p class="text-right">{{$emergency_contact->created_at}}</p>
            <form action="{{route('emergency-contact.delete')}}" method="post">
              @method('delete')
              @csrf
              <input type="hidden" name="emergency_contact_id" value="{{$emergency_contact->id}}">
              <div class="flex justify-end mt-4">
                <x-primary-button>削除</x-primary-button>
              </div>
            </form>
          </div>
    @endforeach
  </div>

@endif
</x-app-layout>
