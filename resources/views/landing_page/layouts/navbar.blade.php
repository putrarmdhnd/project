<div id="navbar">
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand " href="{{ route('beranda') }}">
                <img src="{{ asset('img/desa.png') }}" width="150" alt="Logo Website Desa Palasari">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto py-2">
                    <li class="nav-item nav-item-costume ">
                        <a class="nav-link pageLink" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item nav-item-costume ">
                        <a class="nav-link pageLink" href="{{ route('informasi.apb.index') }}">APBDes</a>
                    </li>
                    <li class="nav-item nav-item-costume ">
                        <a class="nav-link pageLink" href="#Music">Informasi Pendataan</a>
                    </li>
                    <li class="nav-item nav-item-costume" style="padding-right: 30px;">
                        <a class="nav-link pageLink" href="{{ route('pemerintah.organisasi.index') }}">Pemerintahaan</a>
                    </li>
                    <li class="nav-item nav-item-costume login-item">
                        <a class="nav-link" href="{{ route('pengajuan-surat.create') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>