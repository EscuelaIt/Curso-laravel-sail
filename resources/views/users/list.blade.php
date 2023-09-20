<x-app-layout>
  <div class="container mx-auto bg-yellow-200 p-6 rounded-xl mt-8">

    <h1>usuarios</h1>
    @if($users->count() == 0) 
      <p>No hay usuarios</p>
    @endif
    @foreach ($users as $user)
        <p>
          {{ $user->id }}.- {{ $user->name }}
        </p>
    @endforeach

  </div>
</x-app-layout>