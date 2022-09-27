@extends('layouts.app',[
	'title' => 'Push Notification',
])

@section('content')

<section class="section" id="content">
  <div class="row">
    <div class="header col-lg-6 col-md-5 col-sm-5 col-12 mb-4" id="header">
      <p class="subtitle" id="subtitle">
        Welcome to Web Dashboard
        <span>
          {{-- {{ auth()->user()->name }} --}}
        </span>
      </p>
      <p class="title" id="title">
        Jawara Daging Apps
      </p>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1" id="header">
        <div class="card-icon bg-warning">
          <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif-active.svg" alt="">
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Push Notification</h4>
          </div>
          <div class="card-body">
            {{number_format($data_push_notification->count())}}
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tambah Banner --}}

  <div id="body-content">
    <div class="card card-danger">
      <div class="card-header">
        <h4>Tambah Notification</h4>
        <div class="card-header-action">
          <a data-collapse="#tambah-push-notification" class="btn btn-icon btn-red" href="#"><i class="fas fa-minus"></i></a>
        </div>
      </div>
      <div class="collapse show" id="tambah-push-notification">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-2">
                <ul class="nav nav-pills">
                    <li class="nav-item p-2">
                        <button class="btn btn-danger active" id="pills-promo-tab" data-toggle="pill" data-target="#pills-promo" type="button" role="tab" aria-controls="pills-promo">Promo</button>
                    </li>
                    <li class="nav-item p-2">
                        <button class="btn btn-danger" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile">Info</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-promo" role="tabpanel" aria-labelledby="#pills-promo-tab">
                    <div class="section-title mt-0">Push Notification Promo</div>
                    <form action="{{ route('push-notification.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" id="title-push-notification">
                          <label>Title Push Notification</label>
                          <input type="text" name="title_push_notification" class="form-control" placeholder="Masukan Title Push Notification" required autofocus tabindex="1">
                        </div>
                        <div class="form-group" id="deskripsi-push-notification">
                          <label>Deskripsi Push Notification</label>
                          <input type="text" name="deskripsi_push_notification" class="form-control" placeholder="Masukan Deskripsi Push Notification" required autofocus tabindex="2">
                        </div>
                        <button type="submit" class="btn btn-icon icon-left btn-danger-action float-right mt-3 mb-4">
                          <i class="fa fa-paper-plane pr-2" aria-hidden="true"></i>Kirim Notification Promo</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="#pills-profile-tab">
                    <div class="section-title mt-0">Push Notification Info</div>
                    <form action="{{ route('push-notification-info.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" id="title-push-notification">
                          <label>Title Push Notification</label>
                          <input type="text" name="title_push_notification_info" class="form-control" placeholder="Masukan Title Push Notification" required autofocus tabindex="1">
                        </div>

                        <div class="form-group" id="deskripsi-push-notification">
                            <label>Deskripsi Push Notification</label>
                            <input type="text" name="deskripsi_push_notification_info" class="form-control" placeholder="Masukan Deskripsi Push Notification" required>
                        </div>

                        <div class="form-group" id="url-push-notification">
                            <label>Url Produk</label>
                            <input type="text" name="key_product_push_notification_info" class="form-control" placeholder="Masukan Url Produk" required>
                         </div>

                         <div class="form-group" id="deskripsi-push-notification">
                            <label>Id Produk</label>
                            <input type="text" name="value_product_push_notification_info" class="form-control" placeholder="Masukan Id Produk" required>
                         </div>

                         <div class="form-group" id="push-notification-info-image">
                            <label for="label-push-notification-info">Gambar Push Notification Info</label>
                            <div class="input-group mb-3" id="notification-info-image">
                                <div class="custom-file">
                                    <input type="file" name="image_push_notification_info" class="custom-file-input" id="img-notification-info" />
                                    <label class="custom-file-label" for="img-banner">Ubah Gambar Pop Up Banner</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <img id='preview-img-notification-info' class="img-fluid rounded"/>
                        </div>

                        <button type="submit" class="btn btn-icon icon-left btn-danger-action float-right mt-3 mb-4">
                          <i class="fa fa-paper-plane pr-2" aria-hidden="true"></i>Kirim Notification Info</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

    {{-- Data Banner --}}

    <div class="card card-danger">
      <div class="card-header">
        <h4>Data Notification</h4>
        <div class="card-header-action">
          <a data-collapse="#data-banner" class="btn btn-icon btn-red" href="#"><i class="fas fa-minus"></i></a>
        </div>
      </div>
      <div class="collapse show" id="data-banner">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-2">
                <ul class="nav nav-pills">
                    <li class="nav-item p-2">
                        <button class="btn btn-danger active" id="pills-promo-view-tab" data-toggle="pill" data-target="#pills-promo-view" type="button" role="tab" aria-controls="pills-promo-view">Promo</button>
                    </li>
                    <li class="nav-item p-2">
                        <button class="btn btn-danger" id="pills-profile-view-tab" data-toggle="pill" data-target="#pills-profile-view" type="button" role="tab" aria-controls="pills-profile-view">Info</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-promo-view" role="tabpanel" aria-labelledby="#pills-promo-view-tab">
                    <div class="section-title mt-2 mb-4">Push Notification Promo</div>
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
                                <th scope="col">DIBUAT PADA TANGGAL</th>
                                <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_push_notification as $push_notification)
                                <tr>
                                <th>{{$loop->iteration}}</th>
                                <td data-toggle="modal" class="td-pointer" data-target="#data-banner{{ $push_notification->id }}" >{{$push_notification->title_push_notification}}</td>
                                <td>{{$push_notification->created_at->format('l, d F Y H:i')}}</td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-danger-action left notif" push_notif_title="{{$push_notification->title_push_notification}}" push_notif_id="{{$push_notification->id}}"><i class="fas fa-trash"></i>Delete</button>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="pills-profile-view" role="tabpanel" aria-labelledby="#pills-profile-view-tab">
                    <div class="section-title mt-2 mb-4">Push Notification Info</div>
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
                        <th scope="col">DIBUAT PADA TANGGAL</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_push_notification_info as $push_notification_info)
                        <tr>
                        <th>{{$loop->iteration}}</th>
                        <td data-toggle="modal" class="td-pointer" data-target="#data-banner{{ $push_notification_info->id }}" >{{$push_notification_info->title_push_notification_info}}</td>
                        <td>{{$push_notification_info->created_at->format('l, d F Y H:i')}}</td>
                        <td>
                            <button class="btn btn-icon icon-left btn-danger-action left notif" push_notif_info_title="{{$push_notification_info->title_push_notification_info}}" push_notif_info_id="{{$push_notification_info->id}}"><i class="fas fa-trash"></i>Delete</button>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>

                </div>
                </div>
            </div>

        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
</section>

{{-- modal data push notification --}}
@foreach ($data_push_notification as $push_notification)
<div class="modal fade" id="data-banner{{ $push_notification->id }}" tabindex="-1" role="dialog"
  aria-labelledby="data-push-notification-title" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="data-push-notification-title">DATA PUSH NOTIFICATION</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <h5 class="judul-banner">
              TITLE NOTIFICATION
            </h5>
            <p>
              {{ $push_notification->title_push_notification }}
            </p>
            <h5 class="judul-banner">
              DESKRIPSI NOTIFICATION
            </h5>
            <p>
              {{ $push_notification->deskripsi_push_notification }}
            </p>
          </div>
      </div>
  </div>
</div>
@endforeach

@endsection

{{-- Untuk Masukan JS --}}

@push('js')

<script>
    $('#img-notification-info').on('change',function(){
        //get the file name
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })

    function readURLAdd(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#preview-img-notification-info').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#img-notification-info").change(function(){
                readURLAdd(this);
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
      $('.notif').click(function(){

        var push_notif_title = $(this).attr('push_notif_title');
        var push_notif_id = $(this).attr('push_notif_id');

        swal({
          title: 'Yakin Menghapus?',
          text: 'Jika Iya Notification '+push_notif_title+' Tidak Bisa Dikembalikan!',
          icon: 'warning',
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/push-notification/delete/"+push_notif_id+"";
            swal('Notification '+push_notif_title+' Terhapus', {
              icon: 'success',
            });
          } else {
            swal('Notification '+push_notif_title+' Tidak Jadi Dihapus');
          }
        });
      });
    </script>
@endpush
