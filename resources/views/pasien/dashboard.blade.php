<x-layouts.app title="Dashboard Pasien">
    <h1>Selamat Datang Pasien</h1>
<form method="POST" action="/logout">
@csrf
<button type="submit">Logout</button>
</form>
</x-layouts.app>
