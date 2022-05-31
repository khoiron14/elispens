<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-xl-5">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo2.png') }}" alt="elispens" height="34">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="navbar-nav text-center">
                @if (auth()->check())
                @admin
                    <a class="my-custom-btn" href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a class="my-custom-btn" href="{{ route('profile.index', auth()->user()) }}">Profil</a>
                @endadmin
            @else
                <a class="my-custom-btn mt-2 mb-2 ml-2 mr-2" href="{{ route('login') }}">Masuk</a>
                <a class="my-custom-btn mt-2 mb-2 ml-2 mr-2" href="" data-toggle="modal" data-target="#registerModal">Daftar</a>
        
                {{-- register modal --}}
                <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="registerModalLabel">Daftar Sebagai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <a href="{{ route('register.create', 'lecturer') }}" class="btn btn-primary btn-block">
                                    <i class="material-icons-outlined align-middle">co_present</i><strong class="align-bottom">&nbsp;Dosen</strong>
                                </a>
                                <a href="{{ route('register.create', 'student') }}" class="btn btn-primary btn-block">
                                    <i class="material-icons-outlined align-middle">school</i><strong class="align-bottom">&nbsp;Mahasiswa</strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </nav>
</div>