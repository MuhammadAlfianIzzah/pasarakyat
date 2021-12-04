<x-dash-layout>
    <x-slot name="title">My Blog</x-slot>
    <a href="{{ route('create-blog') }}" class="btn btn-primary">Create Blog</a>
    <div class="container bg-white p-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $key => $p)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $p->title }}</td>
                        <td>
                            <img class="img-fluid" style="height: 40px" src="{{ asset("storage/$p->thumbnail") }}"
                                alt="">
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="{{ route('delete-blog', $p->slug) }}" method="POST">
                                    @csrf
                                    @method("delete")
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $p->id }}">
                                        <i class="fas fa-trash-alt"></i>

                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{ $p->id }}" tabindex="-1"
                                        aria-labelledby="delete{{ $p->id }}Label" aria-hidden="true">
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
                                <a href="{{ route('edit-blog', $p->slug) }}" class="btn btn-warning">Update</a>
                                <button type="button" class="btn btn-primary">show</button>
                            </div>
                        </td>
                    </tr>
                @empty

                @endforelse


            </tbody>
        </table>
    </div>
</x-dash-layout>
