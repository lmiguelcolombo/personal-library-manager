<x-app-layout>
  <div class="flex items-center justify-center">
    <form action="{{ route('collections.update', $collection) }}" method="post" class="grid grid-rows-1 ">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
        <label for="name">{{ __('Name') }}</label>
        <input type="text" id="name" name="name" value="{{ $collection->name }}" class="bg-white rounded-lg mb-3" required>

        <label for="description">{{ __('Description') }}</label>
        <textarea id="description" name="description" value="{{ $collection->description }}" class="bg-white rounded-lg" required>{{ $collection->description }}</textarea>
      </div>

      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger text-center">
        <li style="list-style-type: none;">{{ $error }}</li>
      </div>
      @endforeach
      @endif

      <div class="flex justify-end gap-3 mt-3">
        <a href="{{ route('collections.index') }}" class="rounded-lg p-3 border-2 border-sky-500 text-sky-500" role="button">{{ __('Back') }}</a>
        <button type="submit" class="rounded-lg p-3 border-2 border-green-500 bg-green-500 text-white">{{ __('Update') }}</button>
      </div>
    </form>
  </div>
</x-app-layout>