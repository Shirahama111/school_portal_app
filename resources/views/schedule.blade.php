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
        <div class="max-w-4xl mx-auto p-8 rounded-md shadow-xl bg-white bg-opacity-60">
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
        <div class="max-w-4xl mx-auto p-8 rounded-md shadow-xl bg-white bg-opacity-60">
          @include('components.calendar')
        </div>

        <div class="my-10 m-auto max-w-3xl p-10 bg-pastelpurple-500 bg-opacity-70 shadow-2xl overflow-hidden sm:rounded-lg">
          <label class="block text-gray-900 text-xl font-bold mb-6">予定登録</label>
          <form method="POST" action="{{ route('schedule.store') }}">
              @csrf

              <!-- title -->
              <div>
                  <x-input-label for="title" class="my-4">タイトル</x-input-label>
                  <input type="text" name="title" id="title" class="rounded-md border-none" required>
                  <x-input-error :messages="$errors->get('title')" class="mt-2" />
              </div>

              <!-- start_date and hour and minute -->
              <div>
                <div>
                  <x-input-label for="start_date" class="my-4">開始日</x-input-label>
                  <input type="date" name="start_date" id="start_date" class="rounded-md border-none" required>
                  <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                </div>
                <div>
                  <x-input-label class="my-4">開始時間</x-input-label>
                  <div class="flex items-center">
                    <select id="start_hour" name="start_hour" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      @for ($i = 0; $i < 24; $i++)
                        <option value="{{$i}}">{{$i}}時</option>
                      @endfor
                    </select>
                    <select id="start_minute" name="start_minute" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      @for ($i = 0; $i < 60; $i+=5)
                        <option value="{{$i}}">{{$i}}分</option>
                      @endfor
                    </select>
                  </div>
                </div>
              </div>

              <!-- end_date and hour and minute -->
              <div>
                <div>
                  <x-input-label for="end_date" class="my-4">終了日</x-input-label>
                  <input type="date" name="end_date" id="end_date" class="rounded-md border-none" required>
                  <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                </div>
                <div>
                  <x-input-label class="my-4">終了時間</x-input-label>
                  <div class="flex items-center">
                    <select id="end_hour" name="end_hour" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      @for ($i = 0; $i < 24; $i++)
                        <option value="{{$i}}">{{$i}}時</option>
                      @endfor
                    </select>
                    <select id="end_minute" name="end_minute" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      @for ($i = 0; $i < 60; $i+=5)
                        <option value="{{$i}}">{{$i}}分</option>
                      @endfor
                    </select>
                  </div>
                </div>
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
        </div>
      </div>
    @endif
</x-app-layout>
