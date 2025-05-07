<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="mb-4 insegna-custom">Benvenuto nel tuo cinema</h1>

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <a href="{{ route('create') }}" class="btn mt-3 btn-custom">Aggiungi un nuovo film alla
                    libreria</a>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <h2>Powered by</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-7">
                <img src="https://www.ovhcloud.com/sites/default/files/styles/large_screens_1x/public/2021-09/ECX-1909_Hero_MySQL_600x400%402x-1_0.png"
                    class="sql-custom" alt="">
            </div>
            <div class="col-12 col-md-5">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Disney%2B_logo.svg/2560px-Disney%2B_logo.svg.png" alt="" class="sql-custom">
            </div>
        </div>
    </div>
</x-layout>
