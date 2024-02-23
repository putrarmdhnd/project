@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white py-2 px-10 mb-5 rounded-lg d-flex">
    <div class="row">
        <div class="col-12">
            <count__total class=" text-lg lg:text-2xl headDash fw-bolder mb-2">Data Kependudukan</count__total>
        </div>

        <div class="col-12">
            <div class="row">

                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a href="/data/kependudukan" class="card-body p-1 themeColor">
                            <div class="row justify-content-around">
                                <div class="col-12">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Jumlah Penduduk</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/keluarga.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\penduduk::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/kematian">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Kematian</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/kematian.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\kematian::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/kelahiran">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Kelahiran</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/kelahiran.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\kelahiran::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/miskin">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Masyarakat Miskin</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/masyrarakat_miskin.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\miskin::count('NIK') }}</p>
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

</div>
<div class="layoutWelcome bg-white py-2 px-10 mb-5 rounded-lg d-flex">
    <div class="row">
        <div class="col-12">
            <count__total class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Keluarga</count__total>
        </div>

        <div class="col-12 my-3">
            <div class="row">

                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/ibuhamil">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Ibu Hamil</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/ibu_hamil.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\ibuhamil::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/bayi1sampai5tahun">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Bayi 1-5 tahun</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/anak_1-5tahun.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\bayi1sampai5tahun::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/anakyatim">
                            <div class="row justify-content-around">
                                <div class="col-12">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Anak yatim usia 1 - 12 tahun</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/anak_yatim.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\anakyatim::count('NIK') }}</p>
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

</div>
<div class="layoutWelcome bg-white py-2 px-10 mb-5 rounded-lg d-flex">
    <div class="row">

        <div class="col-12">
            <count__total class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Bantuan Pemerintah</count__total>
        </div>

        <div class="col-12 my-3">
            <div class="row">

                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/pkh">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Program Keluarga Harapan</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/PKH.png    ') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\pkh::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/bansos">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Bantuan Sosial</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/sembako.png') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\bansos::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/bpn">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Bantuan Pangan Non Tunai</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/pangan-non-tunai.jpg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\bpn::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/bps">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Bantuan Pangan Stunting</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/pangan-stunting.jpg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\bps::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md">
                        <a class="card-body p-1 themeColor" href="/data/bbp">
                            <div class="row justify-content-around">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center h6 textDashboard">Bantuan Beras Pemerintah</p>
                                </div>
                                <div class="layoutInsideCardKependudukan row py-3">
                                    <hr>
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/beras.png') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\bbp::count('NIK') }}</p>
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

</div>


@endsection