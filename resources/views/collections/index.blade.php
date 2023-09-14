<x-app-layout>
  <div class="flex flex-col m-3">
    <div class="flex justify-between mb-4">
      <h1 class="text-3xl">{{ __('My Collections') }}</h1>
      <a href="{{route('collections.create')}}" role="button" class="rounded-lg p-3 bg-sky-500 text-white font-bold">{{ __('Create a new collection') }}</a>
    </div>

    @if (Session::has('success'))
    <div class="bg-green-300 border-1 border-green-700 rounded-lg p-4 m-4 text-green-700 text-xl text-center">
      {{ Session::get('success') }}
    </div>
    @endif

    <table class="table-auto border">
      <tr>
        <thead>
          <th class="border border-slate-700 bg-gray-300">{{ __('Name') }}</th>
          <th class="border border-slate-700 bg-gray-300">{{ __('Nº of Books') }}</th>
          <th class="border border-slate-700 bg-gray-300">{{ __('Actions') }}</th>
      </tr>
      </thead>
      @foreach ($collections as $collection)
      <tbody>
        <tr class="">
          <td class="border border-slate-700 text-center">{{ $collection->name }}</td>
          <td class="border border-slate-700 text-center">{{ count($collection->books) }}</td>
          <td class="flex justify-center gap-3 border border-slate-700">
            <a href="{{ route('collections.edit', $collection->id) }}" class="rounded-lg bg-amber-400 py-3 text-white px-5" role="button">{{ __('Edit') }}</a>
            <form class="border-0" type="button" method="POST" action="{{ route('collections.destroy', $collection->id) }}" onsubmit="return confirm('Are you sure to delete this collection? You may consider that if you delete it, all the books in there are going to be deleted.')">
              @csrf
              @method('DELETE')
              <button class="rounded-lg bg-red-500 p-3 text-white">{{ __('Delete') }}</button>
            </form>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>

</x-app-layout>