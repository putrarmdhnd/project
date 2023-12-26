@extends('templates/dashboard')
@section('content')
<div class="bg-white py-2 px-10 mb-5 rounded-lg row">
    <div class="col-12">
        <h1 class=" text-lg lg:text-2xl headDash fw-bolder mb-2" >Data Kependudukan</h1>
    </div>

    <div class="col-12 my-3">
        <div class="row">
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a href="/data/kependudukan" class="card-body p-1 themeColor" >
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Jumlah Penduduk</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/keluarga.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Angka</medium>
                                        <br>
                                        <p class="text-right fw-bolder" style="font-size: 40px;">{{ \App\Models\penduduk::count('NIK') }}</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="/data/kematian">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Kematian</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/kematian.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Angka</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">42</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Kelahiran</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/kelahiran.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Angka</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">155</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Masyarakat Miskin</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/masyrarakat_miskin.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Angka</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">533</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-white py-2 px-10 mb-5 rounded-lg row">
    <div class="col-12">
        <h1 class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Keluarga</h1>
    </div>

    <div class="col-12 my-3">
        <div class="row">
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Ibu Hamil</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/ibu_hamil.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Data</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">23</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Bayi 1-5 tahun</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/anak_1-5tahun.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Data</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">2353</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12">
                                <p class="fw-bold text-black text-center " style="font-size: 18px;">Anak yatim usia 1 - 12 tahun</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/anak_yatim.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Data</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">53</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-white py-2 px-10 mb-5 rounded-lg row">
    <div class="col-12">
        <h1 class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Bantuan Pemerintah</h1>
    </div>

    <div class="col-12 my-3">
        <div class="row">
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Program Keluarga Harapan</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/PKH.png    ') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Data</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">22</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Bantuan Sosial</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/sembako.png') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Data</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">66</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Bantuan Pangan Non Tunai</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/pangan-non-tunai.jpg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Data</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">66</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Bantuan Pangan Stunting</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/pangan-stunting.jpg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Data</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">66</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 py-2">
                <div class="card border border-gray-200 rounded-b-lg shadow-md">
                    <a class="card-body p-1 themeColor" href="#goal-1">
                        <div class="row justify-content-around">
                            <div class="col-12 ">
                                <p class="fw-bold text-black text-center" style="font-size: 18px;">Bantuan Beras Pemerintah</p>
                            </div>
                            <div class="row py-3">
                                <hr>
                                <div class="col-4">
                                    <br>
                                    <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset('img/kependudukan/beras.png') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="card-text text-right">
                                        <medium class="text-muted">Total Data</medium>
                                        <br>
                                    <p class="text-right fw-bolder" style="font-size: 40px;">66</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection