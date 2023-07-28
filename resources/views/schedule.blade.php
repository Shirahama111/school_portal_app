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
              学内予定表 確認画面
          </h2>
      </x-slot>
    
      <div class="py-12">
        <div class="max-w-4xl mx-auto p-8 rounded-md shadow-xl bg-white">
        @include('components.calendar')
        </div>
      </div>
    
    @elseif($auth === '指導員')
      <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                学内予定表 編集画面
            </h2>
      </x-slot>

      
      
      <div class="py-12">

      <div class="flex max-w-7xl mx-auto bg-white shadow-xl rounded-r-lg">

        <div class="w-1/3 mx-auto p-8 flex items-center bg-pastelpurple-100 rounded-l-lg">
          <div>
            <label class="block text-gray-900 text-xl font-bold mb-6">予定登録</label>
            <form method="POST" action="{{ route('schedule.store') }}">
            @method('POST')    
            @csrf
                <!-- title -->
                <div>
                    <x-input-label for="title" class="my-4">タイトル</x-input-label>
                    <input type="text" name="title" id="title" class="rounded-md border-none" required>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                  <x-input-label for="color" class="my-4">カラー</x-input-label>
                  <input type="color" name="color" id="color" value="#1b46ac">
                </div>
  
                <!-- start_date and hour and minute -->
                <div>
                    <x-input-label for="start_date" class="my-4">開始日</x-input-label>
                    <input type="datetime-local" name="start_date" id="start_date" class="rounded-md border-none" required>
                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                </div>
  
                <!-- end_date and hour and minute -->
                <div>
                    <x-input-label for="end_date" class="my-4">終了日</x-input-label>
                    <input type="datetime-local" name="end_date" id="end_date" class="rounded-md border-none" required>
                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                </div>
  
                <!-- description -->
                <div>
                    <x-input-label for="description" class="my-4">詳細</x-input-label>
                    <textarea name="description" id="description" cols="30" rows="3" class="block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
  
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <form action="{{route('schedule.delete')}}" method="post">
              @method('delete')    
              @csrf
              <input type="hidden" name="schedule_id" id="schedule_id">
              <div class="flex justify-between mt-4">
                <x-input-label class="">予定クリックで削除</x-input-label>
                <button id="delete_button" type="submit" class="inline-flex items-center px-4 py-2 bg-red-700 disabled:opacity-50 disabled:bg-red-600 hover:bg-red-600 border border-transparent rounded-md text-xs text-white uppercase tracking-widest focus:bg-red-700 focus:outline-none transition ease-in-out duration-150" disabled>
                    削除
                </button>
              </div>
            </form>
            
          </div>

        </div>

        <div class="w-2/3 mx-auto p-10">
          @include('components.calendar')
        </div>

      </div>

      </div>
    @endif
</x-app-layout>
