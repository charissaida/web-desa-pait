@extends('layouts.app')
@section('contents')
    <div class="flex flex-col mt-4">
        <div class="flex flex-row justify-between items-center">
            <p class="text-3xl font-semibold">Data Masyarakat</p>
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="flex p-1 rounded-md border-[#198754] border-2 text-[#198754]" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 mt-1">
                    <path fill-rule="evenodd"
                        d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Data
            </button>
            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-500">
                                Form Tambah Data
                            </h3>
                            <button type="button"
                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="authentication-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" action="{{ route('masyarakat.store') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                    <input type="text" name="nama" id="nama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Masukkan Nama Pekerjaan..." required />
                                </div>
                                <div>
                                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                                    <input type="text" name="nik" id="nik"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Masukkan Nama Pekerjaan..." required />
                                </div>
                                <div class="">
                                    <label for="jk" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                        Kelamin</label>
                                    <select id="jk" name="jk"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option selected="">Pilih...</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="">
                                    <label for="alamat"
                                        class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                    <textarea id="alamat" name="alamat" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Masukan Alamat Pekerjaan..."></textarea>
                                </div>
                                <div class="">
                                    <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                        Pekerjaan</label>
                                    <select id="pekerjaan" name="pekerjaan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option selected="">Pilih...</option>
                                        @foreach ($job as $ijob)
                                            <option value="{{ $ijob->id }}">{{ $ijob->nama_pekerjaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="w-1/4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit modal -->
            @foreach ($pep as $item)
                <div id="edit-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-500">
                                    Form Edit Data
                                </h3>
                                <button type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="edit-modal-{{ $item->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form action="{{ route('masyarakat.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label for="nama"
                                            class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                        <input type="text" name="nama" id="nama"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $item->nama }}" required />
                                    </div>
                                    <div>
                                        <label for="nik"
                                            class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                                        <input type="text" name="nik" id="nik"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $item->nik }}" required />
                                    </div>
                                    <div class="">
                                        <label for="jenis-kelamin"
                                            class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                            Kelamin</label>
                                        <select id="jenis-kelamin" name="jk"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                            <option selected="">Pilih...</option>
                                            <option value="Laki-laki" {{ $item->jk == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="Perempuan" {{ $item->jk == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="alamat"
                                            class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                        <textarea id="alamat" rows="4" name="alamat"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $item->alamat }}</textarea>
                                    </div>
                                    <div class="">
                                        <label for="jenis-pekerjaan"
                                            class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                            Pekerjaan</label>
                                        <select id="jenis-pekerjaan" name="pekerjaan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                            <option selected="">Pilih...</option>
                                            @foreach ($job as $ijob)
                                                <option value="{{ $ijob->id }}"
                                                    {{ $ijob->nama_pekerjaan === $item->pekerjaan ? 'selected' : '' }}>
                                                    {{ $ijob->nama_pekerjaan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="w-1/4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($pep as $item)
                <!-- Delete modal -->
                <div id="popup-modal-{{ $item->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="popup-modal-{{ $item->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda yakin
                                    ingin
                                    menghapus data ini?</h3>
                                <form action="{{ route('masyarakat.destroy', ['id' => $item->id]) }}" method="POST"
                                    id="deleteForm-{{ $item->id }}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button data-modal-hide="popup-modal-{{ $item->id }}"
                                    onclick="document.getElementById('deleteForm-{{ $item->id }}').submit();"
                                    type="button"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya
                                </button>
                                <button data-modal-hide="popup-modal-{{ $item->id }}" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-gray-500">
            Halaman ini berisi data masyarakat yang terdaftar.
        </div>
        {{-- notif CRUD data --}}
        @if (session('status'))
            <div class="mt-2 text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mt-2 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="relative mt-4 p-4 overflow-x-auto shadow-md rounded-lg bg-white sm:rounded-lg">
            <table id="myTable" class="w-full text-sm text-left rtl:text-right">
                <thead class="text-base border-b text-gray-500">
                    <tr>
                        <th scope="col" class="p-4">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pekerjaan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pep as $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
                                {{ $item->nama }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
                                {{ $item->nik }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
                                {{ $item->jk }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
                                {{ $item->alamat }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
                                {{ $item->job ? $item->job->nama_pekerjaan : 'Tidak ada pekerjaan' }}
                            </th>
                            <td class="px-6 py-4">
                                <button data-modal-target="edit-modal-{{ $item->id }}"
                                    data-modal-toggle="edit-modal-{{ $item->id }}"
                                    class="p-2 rounded-md text-black bg-[#FFC107] hover:bg-yellow-400" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                    </svg>
                                </button>
                                <button data-modal-target="popup-modal-{{ $item->id }}"
                                    data-modal-toggle="popup-modal-{{ $item->id }}"
                                    class="p-2 rounded-md text-white bg-[#DC3545] hover:bg-red-700" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
