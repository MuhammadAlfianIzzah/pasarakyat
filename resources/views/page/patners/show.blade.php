<x-dash-layout>
    <x-slot name="title">Patners</x-slot>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create Patners
    </button>

    <div class="bg-white container py-3 mx-1 mt-2 d-flex justify-content-start row">
        @forelse($patners as $pnr)
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset("storage/$pnr->picture") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pnr->nama }}</h5>
                        <p class="card-text">{{ $pnr->deskripsi }}</p>
                        <form action="{{ route('delete-patners', $pnr->nama) }}" method="POST">
                            @csrf
                            @method("delete")
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete-{{ $pnr->id }}">
                                <i class="fas fa-trash-alt"></i>

                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="delete-{{ $pnr->id }}" tabindex="-1"
                                aria-labelledby="deleteLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Yakin ingin menghapus?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            kosong
        @endforelse
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Patners</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @method("POST")
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Picture</label>
                            <input type="file" class="form-control" id="picture" name="picture">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dash-layout>
