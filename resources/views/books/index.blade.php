<x-app-layout>
  <div class="flex flex-col m-3">
    <div class="flex justify-between mb-4">
      <h1 class="text-3xl">My Books</h1>
      <a href="{{route('books.create')}}" role="button" class="rounded-lg p-3 bg-sky-500">Create a new book</a>
    </div>

    <table class="table-auto border">
      <tr>
        <thead>
          <th class="border border-slate-700 bg-gray-300">Title</th>
          <th class="border border-slate-700 bg-gray-300">Subject</th>
          <th class="border border-slate-700 bg-gray-300">Author</th>
          <th class="border border-slate-700 bg-gray-300">Publish Year</th>
          <th class="border border-slate-700 bg-gray-300">Publisher</th>
          <th class="border border-slate-700 bg-gray-300">Actions</th>
      </tr>
      </thead>
      @foreach ($books as $book)
      <tbody>
        <tr class="">
          <td class="border border-slate-700 text-center">{{ $book->title }}</td>
          <td class="border border-slate-700 text-center">{{ $book->subject }}</td>
          <td class="border border-slate-700 text-center">{{ $book->authors }}</td>
          <td class="border border-slate-700 text-center">{{ $book->publish_year }}</td>
          <td class="border border-slate-700 text-center">{{ $book->publisher }}</td>
          <td class="flex justify-center gap-3 border border-slate-700">
            <a href="{{ route('books.edit', $book->id) }}" class="rounded-lg bg-amber-300 py-3 px-5" role="button">Edit</a>
            <form class="border-0" type="button" method="POST" action="{{ route('books.destroy', $book->id) }}" onsubmit="return confirm('Are you sure to remove this book?')">
              @csrf
              @method('DELETE')
              <button class="rounded-lg bg-red-500 p-3">Remove</button>
            </form>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>

</x-app-layout>