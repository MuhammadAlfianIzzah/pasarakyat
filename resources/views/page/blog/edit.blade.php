<x-dash-layout>
    <style>
        .blockquote {
            border-left: 4px solid red;
            padding-left: 1rem;
        }

    </style>

    <x-slot name="title_page">Update <span class="badge badge-info">~{{ $posts->title }}~</span></x-slot>


    <div class="bg-white container py-3 mx-3 d-flex justify-content-center">
        <div class="col-lg-10">


            <!-- Page Heading -->

            <form action="" method="POST" enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" required
                            value="{{ old('title') ?? ($posts->title ?? '') }}">

                        @error('title')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror

                    </div>

                </div>


                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">body</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="body" class="form-control summernote" id="floatingTextarea">
                        {{ old('body') ?? ($posts->body ?? '') }}
                        </textarea>
                        @error('body')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="formFile" class="col-sm-2 col-form-label">Thumbnail</label>
                    <div class="col-sm-10">
                        <img style="max-height: 200px;object-fit: contain"
                            class="w-100 img-fluid img-thumbnail thumbnail"
                            src="{{ asset("storage/$posts->thumbnail") }}">
                        <input name="thumbnail" class="form-control input-show upload-img" data-target="thumbnail"
                            type="file" id="formFile">

                        @error('thumbnail')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn w-100 btn-warning">Update
                    Post</button>
            </form>

        </div>
    </div>
    @push('script')
        <script>
            $('.summernote').summernote({
                tabsize: 2,
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    //['fontname', ['fontname']],
                    // ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ],
            });
        </script>
    @endpush
</x-dash-layout>
