<!DOCTYPE html>
<html lang="en">
<x-userHead></x-userHead>

<body id="body-pad">
    <x-userSidebar></x-userSidebar>
    @yield('content')
    <x-userScript></x-userScript>
    <x-userModal></x-userModal>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>