@extends('layouts.app',[
	'title' => 'Banner Footer',
])

@section('content')

<section class="section" id="content">

    <div id="body-content">
      <div class="card card-danger">
        <div class="card-header">
          <h4>Banner Footer</h4>
          <div class="card-header-action">
            @foreach ($data_banner_footer as $banner_footer)
                @if ($banner_footer->hide == 'true')
                    <span class="badge badge-warning mr-3">Disembunykan</span>
                @else
                    <span class="badge badge-info mr-3">Ditamplikan</span>

                @endif
            @endforeach

            <a data-collapse="#pop-up-banner" class="btn btn-icon btn-red" href="#"><i class="fas fa-minus"></i></a>
          </div>
        </div>
        <div class="collapse show" id="pop-up-banner">
          <div class="card-body">
            @foreach ($data_banner_footer as $banner_footer)
            <form action="{{ route('footer-banner.update', $banner_footer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="label-link-pop-up-banner">Title Banner Footer</label>
                    <input type="text" name="title_image_banner_footer" value="{{$banner_footer->title_image_banner_footer}}" placeholder="Masukan Title Banner Footer" class="form-control" id="link-pop-up-banner" required>
                </div>

                <div class="form-group" id="pop-up-image-banner">
                    <label for="label-pop-up-banner">Gambar Banner Footer</label>
                    <div class="input-group mb-3" id="gambar-banner">
                        <div class="custom-file">
                            <input type="file" name="image_banner_footer" class="custom-file-input" id="img-banner" />
                            <label class="custom-file-label" for="img-banner">Ubah Gambar Banner Footer</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <img id='preview-img-banner' src="{{$banner_footer->image_banner_footer}}" class="img-fluid rounded"/>
                </div>

                <button type="submit" class="btn btn-icon icon-left btn-danger-action float-right mt-2 mb-4 ml-4">
                    <i class="fas fa-save pr-2"></i>Simpan Perubahan
                </button>
                @if ($banner_footer->hide == 'true')
                    <button type="submit" value="false" name="hide" class="btn btn-icon icon-left btn-info float-right mt-2 mb-4" id="show-banner-footer">
                        <i class="far fa-eye pr-2"></i>Show
                    </button>
                @else
                    <button type="submit" value="true" name="hide" class="btn btn-icon icon-left btn-warning float-right mt-2 mb-4" id="hide-banner-footer">
                        <i class="fas fa-eye-slash pr-2"></i></i>Hide
                    </button>
                @endif
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

@endpush
