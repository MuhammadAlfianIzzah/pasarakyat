<x-main-layout>
    <div class="p-3 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container">
            <h2 class="display-5 fw-bold">BLOGS</h2>
            <p class="col-md-12 fs-5">Inilah langkah kami, sebagai bentuk kontribusi dalam upaya mensejahterakan pasar
                tradisional di indonesia</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-6 mb-2">

                    <div class="card">
                        <img style="max-height: 300px;object-fit: cover" src="{{ asset("storage/$post->thumbnail") }}"
                            class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <a href="{{ route('detail-blog', $post->slug) }}"
                                class="h6">{{ $post->title }}</a>
                            <p class="card-text">{{ $post->created_at }}</p>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</x-main-layout>
