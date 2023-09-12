<x-app-layout>
  <div class="flex items-center justify-center">
    <form action="{{ route('books.store') }}" method="post" class="grid grid-rows-1 ">
      @csrf
      <div class="mb-3">
        <label for="collection">Collection</label>
        <select name="collection" id="collection">
          @foreach ($collections as $collection)
          <option value="{{ $collection->id }}">{{ $collection->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" class="bg-white rounded-lg" required>

        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="bg-white rounded-lg" required>

        <label for="authors">Author(s)</label>
        <input type="text" id="authors" name="authors" value="{{ old('authors') }}" class="bg-white rounded-lg" required>
      </div>

      <div class="">
        <label for="edition">Edition</label>
        <input type="number" id="edition" name="edition" value="{{ old('edition') }}" class="w-25 bg-white rounded-lg" required>

        <label for="publish_year">Publish Year</label>
        <input type="number" id="publish_year" name="publish_year" value="{{ old('publish_year') }}" class="w-25 bg-white rounded-lg" required>

        <label for="publisher">Publisher</label>
        <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}" class="bg-white rounded-lg" required>
      </div>

      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger text-center">
        <li style="list-style-type: none;">{{ $error }}</li>
      </div>
      @endforeach
      @endif

      <div class="flex justify-end gap-3 mt-3">
        <a href="{{ route('books.index') }}" class="rounded-lg p-3 border-2 border-sky-500 text-sky-500" role="button">Back</a>
        <button type="submit" class="rounded-lg p-3 border-2 border-green-500 bg-green-500 text-white">Submit</button>
      </div>
    </form>
  </div>
</x-app-layout>