<x-guest-layout>
  <h1>usuarios</h1>
  @if($users->count() == 0) 
    <p>No hay usuarios</p>
  @endif
  @foreach ($users as $user)
      <p>
        {{ $user->id }}.- {{ $user->name }}
      </p>
  @endforeach
</x-guest-layout>