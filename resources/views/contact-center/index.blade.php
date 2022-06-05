@extends('layouts.app',[
	'title' => 'Contact Center',
])

@section('content')


<section class="section" id="content">

  {{-- Tambah Term & Condition --}}

  <div id="body-content">
    <div class="card card-danger">
      <div class="card-header">
        <h4>Contact Center</h4>
        <div class="card-header-action">
          <a data-collapse="#contact-center" class="btn btn-icon btn-red" href="#"><i class="fas fa-minus"></i></a>
        </div>
      </div>
      <div class="collapse show" id="contact-center">
        <div class="card-body">
          @foreach ($data_contact_center as $contact_center)
          <form action="{{ route('contact-center.update', $contact_center->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="label-alamat-kantor">Alamat Kantor</label>
              <textarea class="form-control" name="alamat_kantor" id="alamat-kantot" rows="3" style="min-height: 195px;" placeholder="Jl. Sumbawa 89 Bogor" required>{{$contact_center->alamat_kantor}}</textarea>
            </div>

            <div class="form-group">
              <label for="label-no-tlp">No Tlp</label>
              <input type="number" class="form-control" name="no_tlp" value="{{$contact_center->no_tlp}}" id="no-tlp" placeholder="Masukan No. Telp" required>
            </div>

            <div class="form-group">
              <label for="label-email">Email</label>
              <input type="email" class="form-control" name="alamat_email" value="{{$contact_center->alamat_email}}" id="alamat-email" placeholder="Masukan Email" required>
            </div>

            <div class="form-group">
              <label for="label-alamat-website">Alamat Website</label>
              <input type="text" class="form-control" name="alamat_website" value="{{$contact_center->alamat_website}}" id="no-tlp" placeholder="Ex: https://jawaradaging.com" required>
            </div>
            <button type="submit" class="btn btn-icon icon-left btn-danger-action float-right mt-3 mb-4">
              <i class="fa fa-paper-plane pr-2" aria-hidden="true"></i>Publish Contact Center</button>
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