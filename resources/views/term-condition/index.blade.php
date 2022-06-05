@extends('layouts.app',[
	'title' => 'Term & Condition',
])

@section('content')


<section class="section" id="content">

  {{-- Tambah Term & Condition --}}

  <div id="body-content">
    <div class="card card-danger">
      <div class="card-header">
        <h4>Term & Condition</h4>
        <div class="card-header-action">
          <a data-collapse="#term-condition" class="btn btn-icon btn-red" href="#"><i class="fas fa-minus"></i></a>
        </div>
      </div>
      <div class="collapse show" id="term-condition">
        <div class="card-body">
          @foreach ($data_term_condition as $term_condition)
          <form action="{{ route('term-condition.update', $term_condition->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <textarea name="rich_text" id="summernote" cols="30" rows="10">{{$term_condition->rich_text}}</textarea>
            </div>
            <button type="submit" class="btn btn-icon icon-left btn-danger-action float-right mt-3 mb-4">
              <i class="fa fa-paper-plane pr-2" aria-hidden="true"></i>Publish Term & Condition</button>
          </form>
          @endforeach
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