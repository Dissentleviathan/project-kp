<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guru') }}
        </h2>
    </x-slot>

    <div id="tambah-guru" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="display: flex; justify-content: center;">
                    <h2 class="fw-medium fs-base">Tambah Data Guru</h2>
                </div>
                {{-- body --}}
                <form action="{{ route('guru.store') }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nip-modal-form" class="form-check-label">NIP</label>
                                <input id="nip-modal-form" type="text" name="nip" class="form-control"
                                    placeholder="123456789..." required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nama-modal-form" class="form-check-label">Nama Lengkap</label>
                                <input id="nama-modal-form" type="text" name="nama" class="form-control"
                                    placeholder="Nama Lengkap" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jk-modal-form" class="form-check-label">Jenis Kelamin</label>
                                <select id="jk-modal-form" name="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tempat-lahir-modal-form" class="form-check-label">Tempat Lahir</label>
                                <input id="tempat-lahir-modal-form" type="text" name="tempat_lahir"
                                    class="form-control" placeholder="Tempat Lahir" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal-lahir-modal-form" class="form-check-label">Tanggal Lahir</label>
                                <input id="tanggal-lahir-modal-form" type="date" name="tanggal_lahir"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jabatan-modal-form" class="form-check-label">Jabatan</label>
                                <input id="jabatan-modal-form" type="text" name="jabatan" class="form-control"
                                    placeholder="Jabatan" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="no-hp-modal-form" class="form-check-label">No HP</label>
                                <input id="no-hp-modal-form" type="text" name="no_hp" class="form-control"
                                    placeholder="No HP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email-modal-form" class="form-check-label">Email</label>
                                <input id="email-modal-form" type="email" name="email" class="form-control"
                                    placeholder="Email" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="font-bold text-2xl">Data Guru</h1>
                        </div>
                        <div>
                            <button data-bs-toggle="modal" data-bs-target="#tambah-guru" class="btn btn-primary">Tambah
                                Data</button>
                        </div>
                    </div>
                    <div class="mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIP</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">No HP</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="text-center align-middle">{{ $item->nip }}</td>
                                        <td class="text-center align-middle">{{ $item->nama }}</td>
                                        <td class="text-center align-middle">{{ $item->jabatan }}</td>
                                        <td class="text-center align-middle">{{ $item->no_hp }}</td>
                                        <td class="text-center align-middle">{{ $item->email }}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-success">Edit</button>
                                            <form action="{{ route('guru.destroy', ['id' => encrypt($item->id)]) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
