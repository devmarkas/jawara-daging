@extends('layouts.app',[
	'title' => 'Banner',
])

@section('content')

<section class="section" id="content">
  <div class="row">
    <div class="header col-lg-6 col-md-5 col-sm-5 col-12 mb-4" id="header">
      <p class="subtitle" id="subtitle">
        Welcome to Web Dashboard
        <span>
          {{ auth()->user()->name }}
        </span>
      </p>
      <p class="title" id="title">
        Jawara Daging Apps
      </p>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1" id="header">
        <div class="card-icon bg-danger">
          <img class="icon" src="{{ asset('template') }}/assets/img/icon-banner-active.svg" alt="">
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Banner</h4>
          </div>
          <div class="card-body">
            {{number_format($data_banner->count())}}
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tambah Banner --}}

  <div id="body-content">
    <div class="card card-danger">
      <div class="card-header">
        <h4>Tambah Banner</h4>
        <div class="card-header-action">
          <a data-collapse="#tambah-banner" class="btn btn-icon btn-red" href="#"><i class="fas fa-minus"></i></a>
        </div>
      </div>
      <div class="collapse show" id="tambah-banner">
        <div class="card-body">

          <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group" id="title-banner">
              <label>Title Banner</label>
              <input type="text" name="title" class="form-control" placeholder="Masukan Judul Banner" required autofocus tabindex="1">
            </div>

            <div class="form-group" id="deskripsi-push-notification">
                <label>Key Type</label>
                <select name="key_type" class="form-control" id="key_type_banner" required>
                  <option>Pilih Key Type</option>
                  <option value="web_launcher">Web Launcher</option>
                  <option value="product">Product</option>
                  <option value="category">Category</option>
                </select>
            </div>

            <div class="form-group" id="deskripsi-push-notification">
                <label>Value Type</label>
                <input type="text" name="value_type" class="form-control" placeholder="Masukan Value Type" required>
            </div>

            <label class="label">Gambar Banner</label>
            <div class="input-group mb-3" id="gambar-banner">
                <div class="custom-file">
                    <input type="file" name="image_banner" class="custom-file-input" id="img-banner" required/>
                    <label class="custom-file-label" for="img-banner">Pilih Gambar Banner</label>
                </div>
            </div>
            <div class="form-group">
                <img id='preview-img-banner' class="img-fluid rounded"/>
            </div>
            <button type="submit" class="btn btn-icon icon-left btn-danger-action float-right mt-3 mb-4"><i class="fas fa-plus"></i>Tambah Banner</button>
          </form>

        </div>
      </div>
    </div>

    {{-- Data Banner --}}

    <div class="card card-danger">
      <div class="card-header">
        <h4>Data Banner</h4>
        <div class="card-header-action">
          <a data-collapse="#data-banner" class="btn btn-icon btn-red" href="#"><i class="fas fa-minus"></i></a>
        </div>
      </div>
      <div class="collapse show" id="data-banner">
        <div class="card-body">

          <div class="table-responsive">

            {{-- <div class="card-header" id="search">
              <h4></h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-red"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div> --}}

            <table class="table table-hover" id="table-banner">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">TITLE</th>
                  <th scope="col">Key Type</th>
                  <th scope="col">Value Type</th>
                  <th scope="col">DIBUAT PADA TANGGAL</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_banner as $banner)
                <tr>
                  <th>{{$loop->iteration}}</th>
                  <td data-toggle="modal" class="td-pointer" data-target="#data-banner{{ $banner->id }}">{{$banner->title}}</td>
                  <td>{{$banner->key_type}}</td>
                  <td>{{$banner->value_type}}</td>
                  <td>{{$banner->created_at->format('l, d F Y H:i')}}</td>
                  <td>
                    <button class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#update-data-banner{{ $banner->id }}"><i class="far fa-edit"></i> Edit</button>
                    <button type="button" banner-title="{{$banner->title}}" banner-id="{{$banner->id}}" class="btn btn-icon icon-left btn-danger-action left delete"><i class="fas fa-trash"></i>Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
</section>

{{-- modal data banner --}}
@foreach ($data_banner as $banner)
<div class="modal fade" id="data-banner{{ $banner->id }}" tabindex="-1" role="dialog"
  aria-labelledby="data-banner-title" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit-teknisi-title">DATA BANNER</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <h5 class="judul-banner">
              TITLE BANNER
            </h5>
            <p>
              {{ $banner->title }}
            </p>
            <h5 class="judul-banner">
                KEY BANNER
            </h5>
            <p>
                {{$banner->key_type}}
            </p>
            <h5 class="judul-banner">
                VALUE BANNER
            </h5>
            <p>
                {{$banner->value_type}}
            </p>
            <h5 class="judul-banner">
              Gambar BANNER
            </h5>
            <img src="{{ $banner->image_banner }}" class="img-fluid rounded"/>
          </div>
      </div>
  </div>
</div>
@endforeach

{{-- modal edit data banner --}}
@foreach ($data_banner as $banner)
<div class="modal fade" id="update-data-banner{{ $banner->id }}" tabindex="-1" role="dialog"
  aria-labelledby="data-banner-title" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit-teknisi-title">UBAH DATA BANNER</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <form action="{{ route('banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group" id="update-title-banner">
                    <label>Update Title Banner</label>
                    <input type="text" name="title" class="form-control" value="{{ $banner->title }}" placeholder="Ubah Judul Banner" autofocus tabindex="1">
                </div>
                <div class="form-group" id="deskripsi-push-notification">
                    <label>Key Type</label>
                    <select name="key_type" class="form-control" id="key_type" required>
                      <option>Pilih Key Type</option>
                      <option value="web_launcher" {{$banner->key_type == "web_launcher"  ? 'selected' : ''}}>Web Launcher</option>
                      <option value="product" {{$banner->key_type == "product"  ? 'selected' : ''}}>Product</option>
                      <option value="category" {{$banner->key_type == "category"  ? 'selected' : ''}}>Category</option>
                    </select>
                </div>

                <div class="form-group" id="deskripsi-push-notification">
                    <label>Value Type</label>
                    <input type="text" name="value_type" value="{{$banner->value_type}}" class="form-control" placeholder="Masukan Value Type" required>
                </div>
                <div class="form-group">
                  <label class="label">Update Gambar Banner</label>
                  <div class="input-group mb-3" id="update-gambar-banner">
                      <div class="custom-file">
                          <input type="file" name="image_banner" class="custom-file-input" id="img-banner-update"/>
                          <label class="custom-file-label update" for="img-banner-label">Pilih Untuk Ubah Gambar Banner</label>
                      </div>
                  </div>
                </div>
                <div class="card bg-light">
                  <div class="card-body">
                    <img src="{{ $banner->image_banner }}" id='preview-img-banner-update' class="img-fluid rounded"/>
                  </div>
                </div>
                <button type="submit" class="btn btn-icon icon-left btn-warning mt-3 mb-4"><i class="far fa-edit"></i>Update Banner</button>
              </form>
            </div>
          </div>
      </div>
  </div>
</div>
@endforeach

@endsection

{{-- Untuk Masukan JS --}}

@push('js')

{{-- JS Preview Image Banner dan Get Filename Image --}}

<script>
  $('#img-banner').on('change',function(){
      //get the file name
      var fileName = $(this).val().replace('C:\\fakepath\\', " ");
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })

  function readURLAdd(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#preview-img-banner').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$("#img-banner").change(function(){
		    readURLAdd(this);
		});
</script>

<script>
  $('#img-banner-update').on('change',function(){
      //get the file name
      var fileName = $(this).val().replace('C:\\fakepath\\', " ");
      //replace the "Choose a file" label
      $(this).next('.update').html(fileName);
  })

  function readURLUpdate(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#preview-img-banner-update').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
	}
		$("#img-banner-update").change(function(){
		    readURLUpdate(this);
		});
</script>

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
  $('.delete').click(function(){

    var banner_title = $(this).attr('banner-title');
    var banner_id = $(this).attr('banner-id');

    swal({
      title: 'Yakin Menghapus?',
      text: 'Jika Iya Banner '+banner_title+' Tidak Bisa Dikembalikan!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/banner/delete/"+banner_id+"";
        swal('Banner '+banner_title+' Terhapus', {
          icon: 'success',
        });
      } else {
        swal('Banner '+banner_title+' Tidak Jadi Dihapus');
      }
    });
  });
</script>

@endpush
