<x-main-layout>
    <div class="p-3 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container text-center">
            <h2 class="display-5 fw-bold">{{ $posts->title }}</h2>
        </div>

    </div>
    <div class="container blog-pasar mb-4">

        <div class="row">
            <div class="col-12">
                {!! $posts->body !!}
            </div>
        </div>
    </div>
</x-main-layout>
