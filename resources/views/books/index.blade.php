<x-app-layout>
  <div class="flex flex-col m-3">
    <div class="flex justify-between items-center mx-5 mb-5">
      <div class="flex flex-col">
        <label for="collection" class="text-xl">{{ __('Collection') }}</label>
        <select name="collection" id="collection" class="">
          @foreach ($collections as $collection)
          <option value="{{ $collection->id }}">{{ $collection->name }}</option>
          @endforeach
        </select>
      </div>
      <a href="{{route('books.create')}}" role="button" class="text-white font-bold rounded-lg p-3 bg-sky-500 h-fit">{{ __('Create a new book') }}</a>
    </div>

    @if (Session::has('success'))
    <div class="bg-green-300 border-1 border-green-700 rounded-lg p-4 m-4 text-green-700 text-xl text-center">
      {{ Session::get('success') }}
    </div>
    @endif

    <table class="table-auto border">
      <tr>
        <thead>
          <th class="border border-slate-700 bg-gray-300">{{ __('Title') }}</th>
          <th class="border border-slate-700 bg-gray-300">{{ __('Subject') }}</th>
          <th class="border border-slate-700 bg-gray-300">{{ __('Author') }}</th>
          <th class="border border-slate-700 bg-gray-300">{{ __('Edition') }}</th>
          <th class="border border-slate-700 bg-gray-300">{{ __('Publish') }} Year</th>
          <th class="border border-slate-700 bg-gray-300">{{ __('Publisher') }}</th>
          <th class="border border-slate-700 bg-gray-300">{{ __('Actions') }}</th>
      </tr>
      </thead>
      <tbody id="books">
      @foreach ($books as $book)
      <tbody>
        <tr class="">
          <td class="border border-slate-700 text-center">{{ $book->title }}</td>
          <td class="border border-slate-700 text-center">{{ $book->subject }}</td>
          <td class="border border-slate-700 text-center">{{ $book->authors }}</td>
          <td class="border border-slate-700 text-center">{{ $book->edition }}</td>
          <td class="border border-slate-700 text-center">{{ $book->publish_year }}</td>
          <td class="border border-slate-700 text-center">{{ $book->publisher }}</td>
          <td class="flex justify-center gap-3 border border-slate-700">
            <a href="{{ route('books.edit', $book->id) }}" class="text-white rounded-lg bg-amber-400 py-3 px-5" role="button">{{ __('Edit') }}</a>
            <form class="border-0" type="button" method="POST" action="{{ route('books.destroy', $book->id) }}" onsubmit="return confirm('Are you sure to delete this book?')">
              @csrf
              @method('DELETE')
              <button class="text-white rounded-lg bg-red-500 p-3">{{ __('Delete') }}</button>
            </form>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>

</x-app-layout>