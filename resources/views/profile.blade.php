<!-- profile.blade.php -->
<h1>Profil de {{ $user->name }}</h1>
<p>Email : {{ $user->email }}</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Se déconnecter</button>
</form>
