<x-layouts.app title="Dashboard Dokter">
    <h1>Selamat Datang Dokter</h1>
<form method="POST" action="/logout">
@csrf
<button type="submit">Logout</button>
</form>
</x-layouts.app>
