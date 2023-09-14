<x-app-layout>
  <div class="flex items-center justify-center">
    <form action="{{ route('books.update', $book) }}" method="post" class="grid grid-rows-1 ">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="collection">{{ __('Collection') }}</label>
        <select name="collection" id="collection">
          @foreach ($collections as $collection)
          <option value="{{ $collection->id }}">{{ $collection->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="title">{{ __('Title') }}</label>
        <input type="text" id="title" name="title" value="{{ $book->title }}" class="bg-white rounded-lg" required>

        <label for="subject">{{ __('Subject') }}</label>
        <input type="text" id="subject" name="subject" value="{{ $book->subject }}" class="bg-white rounded-lg" required>

        <label for="authors">{{ __('Author(s)') }}</label>
        <input type="text" id="authors" name="authors" value="{{ $book->authors }}" class="bg-white rounded-lg" required>
      </div>

      <div class="">
        <label for="edition">{{ __('Edition') }}</label>
        <input type="number" id="edition" name="edition" value="{{ $book->edition }}" class="w-25 bg-white rounded-lg" required>

        <label for="publish_year">{{ __('Publish Year') }}</label>
        <input type="number" id="publish_year" name="publish_year" value="{{ $book->publish_year }}" class="w-25 bg-white rounded-lg" required>

        <label for="publisher">{{ __('Publisher') }}</label>
        <input type="text" id="publisher" name="publisher" value="{{ $book->publisher }}" class="bg-white rounded-lg" required>
      </div>

      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger text-center">
        <li style="list-style-type: none;">{{ $error }}</li>
      </div>
      @endforeach
      @endif

      <div class="flex justify-end gap-3 mt-3">
        <a href="{{ route('books.index') }}" class="rounded-lg p-3 border-2 border-sky-500 text-sky-500" role="button">{{ __('Back') }}</a>
        <button type="submit" class="rounded-lg p-3 border-2 border-green-500 bg-green-500 text-white">{{ __('Submit') }}</button>
      </div>
    </form>
  </div>
</x-app-layout>