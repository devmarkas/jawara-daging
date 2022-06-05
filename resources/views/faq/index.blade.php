@extends('layouts.app',[
	'title' => 'FAQ',
])

@section('content')


<section class="section" id="content">

  {{-- Tambah Term & Condition --}}

  <div id="body-content">
    <div class="card card-danger">
      <div class="card-header">
        <h4>Tambah FAQ</h4>
        <div class="card-header-action">
          <a data-collapse="#faq" class="btn btn-icon btn-red" href="#"><i class="fas fa-minus"></i></a>
        </div>
      </div>
      <div class="collapse show" id="faq">
        <div class="card-body">
          <form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul-faq">Judul FAQ</label>
                <input name="title_faq" type="text" class="form-control" placeholder="Masukan Judul FAQ" id="title-fag" required>
            </div>

            <div class="form-group">
                <label for="konten-faq">Konten FAQ</label>
                <textarea name="rich_text_faq" id="summernote" cols="30" rows="10" required></textarea>
            </div>

            <button type="submit" class="btn btn-icon icon-left btn-danger-action float-right mt-3 mb-4">
              <i class="fa fa-plus pr-2" aria-hidden="true"></i>Tambah FAQ</button>
          </form>
        </div>
      </div>
    </div>

    <div class="card card-danger">
        <div class="card-header">
          <h4>Data FAQ</h4>
        </div>
        <div class="card-body">
            <div id="accordion-1">
                @foreach ($data_faq as $faq)
                <div class="accordion" id="accordion-warning">
                  <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#faq-{{$faq->id}}" aria-expanded="false">
                    <h4>{{$faq->title_faq}}</h4>
                   
                  </div>
                  <div class="accordion-body collapse bg-light text-dark" id="faq-{{$faq->id}}" data-parent="#accordion-1">

                    <div>
                        {!!$faq->rich_text_faq!!}
                    </div>
                    <div class="mt-4 mb-4">
                        <button class="btn btn-icon icon-left btn-warning mr-3 delete" faq_title="{{$faq->title_faq}}" faq_id="{{$faq->id}}" ><i class="fa fa-trash"></i> Hapus</button>
                        <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-icon icon-left btn-info"><i class="fas fa-edit"></i>Edit</a>
                    </div>
                  </div>
                </div>
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

<script>
    $('.delete').click(function(){
  
      var title = $(this).attr('faq_title');
      var id = $(this).attr('faq_id');
  
      swal({
        title: 'Yakin Menghapus?',
        text: 'Jika Iya FAQ '+title+' Tidak Bisa Dikembalikan!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/faq/delete/"+id+"";
          swal('FAQ '+title+' Terhapus', {
            icon: 'success',
          });
        } else {
          swal('FAQ '+title+' Tidak Jadi Dihapus');
        }
      });
    });
  </script>

@endpush