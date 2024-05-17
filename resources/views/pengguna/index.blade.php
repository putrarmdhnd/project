@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
    <div class="">
        <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">{{ $title }}</h1>
        <p class="textDashboard text-base font-normal text-secondary">Total <span class="lowercase">{{ $title }}</span> yang
            terdaftar</p>
    </div>
    @if ($title == 'Data Petugas')
    <div class="layoutBtnPengaduan">
        <a href="/pengguna/create" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;">Tambah Petugas</a>
    </div>

    @endif
</div>
<div class="tabel-container overflow-x-auto">
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
        <thead class="themeColor">
            <tr class="text-black text-center">
                <th class="textTabelTop font-semibold text-sm uppercase px-6 py-4">No</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-6 py-4">Nama</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-6 py-4">Username</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-6 py-4">Telepon </th>
                <th class="textTabelTop font-semibold text-sm uppercase px-6 py-4">Role</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray text-secondary">
            @foreach ($users as $user)
            <tr class="text-center">
                <td class="textTable px-6 py-4 text-secondary">{{ $loop->iteration }}</td>
                <td class="textTable px-6 py-4 text-secondary">{{ $user->nama }}</td>
                <td class="textTable px-6 py-4 text-secondary">{{ $user->username }}</td>

                @if($user->telpon == NULL)
                <td class="textTable px-6 py-4 text-secondary fw-bold">-</td>
                @else
                <td class="textTable px-6 py-4 text-secondary">{{ $user->telepon }}</td>
                @endif

                <td class="textTable px-6 py-4 text-secondary">{{ $user->level }}</td>
                <td class="textTable px-6 py-4 text-secondary">
                    <button class="text-primary editPengguna" data-user="{{ $user }}"><i class='bx bx-edit-alt'></i></button>
                    <button class="text-danger deletePengguna" data-id="{{ $user->id }}"><i class="bx bxs-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection