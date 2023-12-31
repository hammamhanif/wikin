@extends('dashboard.layout.main')
@section('content')
    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Pengabdian Masyarakat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Pengabdian Masyarakat</a></li>
                    <li class="breadcrumb-item">Form Pengajuan</li>
                    <li class="breadcrumb-item active">Pengabdian Masyarakat</li>
                </ol>
            </nav>
            @if (session('success'))
                <div class="alert alert-primary mt-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @elseif(session('unsuccess'))
                <div class="alert alert-danger mt-4" role="alert">
                    <strong class="font-bold">Unsuccess!</strong>
                    <span class="block sm:inline">{{ session('unsuccess') }}</span>
                </div>
            @endif
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                @if (Auth::user()->type == 'admin')
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pesan Masuk</span></h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nama Pengabdian</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Balas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formpemas as $pemas)
                                            <tr>
                                                <th scope="row"><a href="#">{{ $loop->iteration }}</a></th>
                                                <td>{{ htmlentities($pemas->name) }}</td>
                                                <td>{{ htmlentities($pemas->name_pemas) }}</td>
                                                <td>{{ htmlentities($pemas->location) }}</td>
                                                <td><a href="#"
                                                        class="text-primary">{{ htmlentities($pemas->description) }}</a>
                                                </td>
                                                <td><button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#pengmas{{ $pemas->id }}">
                                                        <i class="bi bi-cursor">
                                                        </i></button>
                                                    <div class="modal fade" id="pengmas{{ $pemas->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">New
                                                                        message
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{-- Form Modal Pengmas --}}
                                                                    <form
                                                                        action="{{ route('send.message', $pemas->user_id) }}"
                                                                        method="post">
                                                                        @method('POST')
                                                                        @csrf
                                                                        <input type="hidden" name="name"
                                                                            value="Pengabdian Masyarakat">
                                                                        <div class="mb-3">
                                                                            <label for="user_id"
                                                                                class="col-form-label">Penerima:</label>
                                                                            <select class="form-control" id="user_id"
                                                                                name="user_id">
                                                                                <option value="{{ $pemas->user_id }}">
                                                                                    {{ $pemas->name }}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="subject"
                                                                                class="col-form-label">Topik:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="subject" name="subject"
                                                                                value="{{ $pemas->name_pemas }} : ">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="message-text"
                                                                                class="col-form-label">Pesan
                                                                                Balasan:</label>
                                                                            <textarea class="form-control" id="message-text" name="content"></textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Kirim Pesan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">List Pengabdian Masyarakat</span></h5>
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        <strong class="font-bold">Success!</strong>
                                        <span class="block sm:inline">{{ session('success') }}</span>
                                    </div>
                                @elseif(session('unsuccess'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong class="font-bold">Unsuccess!</strong>
                                        <span class="block sm:inline">{{ session('unsuccess') }}</span>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul class="list-disc pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ htmlentities($error) }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                                    <td><button type="button" class="bg-danger btn btn-info position-relative"
                                            data-bs-toggle="modal" data-bs-target="#pengmas">
                                            <i class="text-light bi bi-plus-square">
                                            </i></button>
                                        <div class="modal fade" id="pengmas" tabindex="-1"
                                            aria-labelledby="pengabdianMasLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="pengabdianMasLabel">Pengabdian
                                                            Masyarakat</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form text-left" action="{{ route('pengmas.store') }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @method('POST')
                                                            @csrf
                                                            <input type="hidden" name="user_id"
                                                                value="{{ Auth::user()->id }}">
                                                            <div class="mb-3">
                                                                <label for="name" class="col-form-label">Nama
                                                                    Kegiatan</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    id="name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="location"
                                                                    class="col-form-label">Lokasi</label>
                                                                <input type="text" class="form-control"
                                                                    name="location" id="location">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description"
                                                                    class="col-form-label">Deskripsi</label>
                                                                <input class="form-control" name="description"
                                                                    id="description">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="contentpemas" class="col-form-label">Isi
                                                                    Kegiatan</label>
                                                                <textarea class="form-control" id="contentpemas" name="content"></textarea>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-10">
                                                                    <label for="image"
                                                                        class="col-sm-5 col-form-label">Gambar
                                                                        Kegiatan </label>
                                                                    <input class="form-control" type="file"
                                                                        name="image" id="image" accept="image/*">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Send
                                                                    message</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </div>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Kegiatan</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengmas as $pemas)
                                            <tr>
                                                <th scope="row"><a href="#">{{ $loop->iteration }}</a></th>
                                                <td>{{ htmlentities($pemas->name) }}</td>
                                                <td>{{ htmlentities($pemas->location) }}</td>
                                                <td><a href="#"
                                                        class="text-primary">{{ htmlentities($pemas->description) }}</a>
                                                </td>
                                                <td><span class="badge bg-success">Terlaksana</span></td>
                                                <td><button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#pengmas{{ $pemas->id }}">
                                                        <i class="bi bi-info-circle">
                                                        </i></button>
                                                    <div class="modal fade" id="pengmas{{ $pemas->id }}"
                                                        tabindex="-1" aria-labelledby="pengabdianMasLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="pengabdianMasLabel">
                                                                        Pengabdian
                                                                        Masyarakat</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form role="form text-left"
                                                                        action="{{ route('pengmas.update', $pemas->id) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">
                                                                        <div class="mb-3">
                                                                            <label for="name"
                                                                                class="col-form-label">Nama
                                                                                Kegiatan</label>
                                                                            <input type="text" class="form-control"
                                                                                name="name" id="name"
                                                                                value="{{ htmlentities($pemas->name) }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="location"
                                                                                class="col-form-label">Lokasi</label>
                                                                            <input type="text" class="form-control"
                                                                                name="location" id="location"
                                                                                value="{{ htmlentities($pemas->location) }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="description"
                                                                                class="col-form-label">Deskripsi</label>
                                                                            <input class="form-control" name="description"
                                                                                id="description"
                                                                                value="{{ htmlentities($pemas->description) }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="contentpemas"
                                                                                class="col-form-label">Isi
                                                                                Kegiatan</label>
                                                                            <textarea class="form-control" id="contentpemas" name="content">{!! html_entity_decode($pemas->content) !!}</textarea>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-10">
                                                                                <label for="image"
                                                                                    class="col-sm-5 col-form-label">Gambar
                                                                                    Kegiatan </label>
                                                                                <input class="form-control" type="file"
                                                                                    name="image" id="image"
                                                                                    accept="image/*">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Send</button>
                                                                    </form>
                                                                    <a href="{{ route('penelitian.delete', ['id' => $pemas->id]) }}"
                                                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this content?')) document.getElementById('delete-form-{{ htmlentities($pemas->id) }}').submit();">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Hapus</button>
                                                                    </a>
                                                                    <form id="delete-form-{{ htmlentities($pemas->id) }}"
                                                                        action="{{ route('pengmas.delete', ['id' => $pemas->id]) }}"
                                                                        method="POST" style="display: none;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            </div>
                            </td>
                            </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            </div>
            </div>
        @elseif (Auth::user()->type == 'user')
            <!-- Formulir Pengmas -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Pengajuan Pengabdian Masyarakat</h5>
                        <!-- General Form Elements -->
                        <form role="form text-left" action="{{ route('pemas.store') }}" method="post"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input name="name" id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ Auth::user()->name }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ htmlentities($message) }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    <input name="nik" id="nik" type="text"
                                        class="form-control @error('nik') is-invalid @enderror"
                                        value="{{ Auth::user()->nik }}">
                                    @error('nik')
                                        <span class="invalid-feedback">{{ htmlentities($message) }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Nama Pengabdian
                                    Masyarakat</label>
                                <div class="col-sm-8">
                                    <input name="name_pemas" id="name_pemas" type="text"
                                        class="form-control @error('name_pemas') is-invalid @enderror">
                                    @error('name_pemas')
                                        <span class="invalid-feedback">{{ htmlentities($message) }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="location" class="col-sm-3 col-form-label">Asal Daerah</label>
                                <div class="col-sm-8">
                                    <input name="location" id="location" type="text"
                                        class="form-control @error('location') is-invalid @enderror">
                                    @error('location')
                                        <span class="invalid-feedback">{{ htmlentities($message) }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-3 col-form-label">Deskripsi
                                    Kegiatan</label>
                                <div class="col-sm-8">
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                        style="height: 100px"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ htmlentities($message) }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-center">
                                <div class=" col-sm-4">
                                </div>
                                <div class=" col-sm-4">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                                <div class=" col-sm-4">
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div><!-- End List Pengabdian Masyarakay  -->
            @endif
            </div>
        </section>
    </main><!-- End #main -->
    <!-- End Main Content -->
@endsection
