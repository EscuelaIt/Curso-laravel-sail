<x-app-layout>
  <div class="container mx-auto bg-yellow-200 p-6 rounded-xl mt-8">

    @if(session('feedback')) 
      <div class="m-4 mx-12 my-6 bg-orange-300 p-8">{{ session('feedback') }}</div>
    @endif

    <h1>usuarios</h1>
    @if($users->count() == 0) 
      <p>No hay usuarios</p>
    @endif
    @foreach ($users as $user)
        <p>
          {{ $user->id }}.- <a href="/usuarios/notificar/{{ $user->id }}">{{ $user->name }}</a>
        </p>
    @endforeach

  </div>
</x-app-layout>