@extends('templates/dashboard')
@section('content')
    <div class="bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl text-danger font-semibold mb-2">{{ $title }}</h1>
            <p class="text-base font-normal text-secondary">Total <span class="lowercase">{{ $title }}</span> yang
                terdaftar</p>
        </div>
        @if ($title == 'Data Petugas')
            <a href="/pengguna/create"
                class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                Petugas</a>
        @endif
    </div>
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
        <thead class="bg-danger">
            <tr class="text-white text-left">
                <th class="font-semibold text-sm uppercase px-6 py-4">#</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Nama</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Username</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Telepon </th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Role</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray text-secondary">
            @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $user->nama }}</td>
                    <td class="px-6 py-4">{{ $user->username }}</td>
                    <td class="px-6 py-4">{{ $user->telepon }}</td>
                    <td class="px-6 py-4 capitalize">{{ $user->level }}</td>
                    <td class="px-6 py-4">
                        <button class="text-orange editPengguna ml-10" data-user="{{ $user }}"><i
                                class='bx bx-edit-alt'></i></button>
                        <button class="text-danger deletePengguna" data-id="{{ $user->id }}"><i
                                class="bx bxs-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
