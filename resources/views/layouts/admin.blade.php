<!DOCTYPE html>
<html lang="en">
<x-adminHead></x-adminHead>

<body id="body-pad">
    <x-adminSidebar></x-adminSidebar>
    @yield('content')
    <x-adminScript></x-adminScript>
    <x-adminModal></x-adminModal>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>