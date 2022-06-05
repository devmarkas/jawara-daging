@extends('layouts.app',[
	'title' => 'Edit FAQ',
])

@section('content')


<section class="section" id="content">

  {{-- Tambah Term & Condition --}}

  <div id="body-content">
    <div class="card card-danger">
      <div class="card-header">
        <h4>Edit FAQ</h4>
        <div class="card-header-action">
          <a data-collapse="#faq" class="btn btn-icon btn-red" href="#"><i class="fas fa-minus"></i></a>
        </div>
      </div>
      <div class="collapse show" id="faq">
        <div class="card-body">
          <form action="{{ route('faq.update', $data_faq->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul-faq">Judul FAQ</label>
                <input name="title_faq" type="text" class="form-control" value="{{$data_faq->title_faq}}" placeholder="Masukan Judul FAQ" id="title-fag" required>
            </div>

            <div class="form-group">
                <label for="konten-faq">Konten FAQ</label>
                <textarea name="rich_text_faq" id="summernote" cols="30" rows="10" required>{{$data_faq->rich_text_faq}}</textarea>
            </div>

            <button type="submit" class="btn btn-icon icon-left btn-danger-action float-right mt-3 mb-4">
              <i class="fas fa-pencil-alt pr-2"></i>Update FAQ</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

    
@endsection

{{-- Untuk Masukan JS --}}

@push('js')

    @if (Session::has('error'))
        <script>
            iziToast.error({
                title: 'Error',
                message: '{{ Session::get('error') }}',
                position: 'topRight',
            });
        </script>
    @endif
    @if (Session::has('info'))
        <script>
            iziToast.info({
                title: 'Info',
                message: '{{ Session::get('info') }}',
                position: 'topRight',
            });
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            iziToast.warning({
                title: 'Warning',
                message: '{{ Session::get('warning') }}',
                position: 'topRight',
            });
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            iziToast.success({
                title: 'Success',
                message: '{{ Session::get('success') }}',
                position: 'topRight',
            });
        </script>
    @endif

<script>
  $("#summernote").summernote({
      dialogsInBody: true,
      minHeight: 250,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr', 'video']],
        ['view', ['codeview']],
      ]
      

    });
</script>

@endpush