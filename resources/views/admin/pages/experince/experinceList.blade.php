@extends('admin.layouts.masterPage')
@section('title')
    Eğitim Sayfasına  Hoşgeldiniz..
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Eğitim Bilgileri </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('manager.index')}}">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Eğitim Listes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cv deki Deneyimler</h4>
                    <div class="card-header">
                        <a class="nav-link btn btn-success create-new-button" href="{{route('manager.experince.add')}}">
                            Yeni Deneyim Ekle</a>
                    </div>
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                                <th>Eğitim Tarihi.</th>
                                <th>Bölüm</th>
                                <th>Üniversite</th>
                                <th>Açıklama</th>
                                <th>Durum</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
            }

        });
        $('.changeStatus').click(function () {
            let data = $(this).data('id');
            let self = $(this);

            $.ajax({
                url: "{{route('manager.education.changeStatus')}}",
                type: "Post",
                async: false,
                data: {
                    data: data
                },
                success: function (response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        text: data + ' Lütfen ilgili ID  kontrol ediniz..' + response.newStatus + ' olarak güncellenmiştir',
                        confirmButtonText: 'Tamam',
                    });

                    if (response.status == 1) {
                        self[0].innerText = 'Aktif';
                        self.removeClass('btn-danger');
                        self.addClass('btn-success');
                        console.log(self);

                    } else if (response.status == 0) {
                        self[0].innerText = 'Pasif'
                        self.removeClass('btn-success');
                        self.addClass('btn-danger');
                        console.log(self);
                    }

                },
                error: function () {

                }
            })

        })


        $('.deleteBtn').click(function () {
            let self = $(this);
            let data = $(this).data('id');

            Swal.fire({
                title: data + ' Nolu  Id Li İçerği Silmek  İstediğinize  Eminmisiniz',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Evet',
                denyButtonText: `Hayır`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {

                    $.ajax({
                        url: '{{route('manager.education.delete')}}',
                        type: "Post",
                        async: false,
                        data: {
                            data: data
                        },
                        success: function (response) {

                            Swal.fire('Silme İşlemi  Tamamlandı !', '', 'success');
                            $('#formRemove').remove();

                        },
                        error: function () {
                        }

                    })

                } else if (result.isDenied) {
                    Swal.fire('Silme İşlemi  İptal Edildi ', '', 'info')
                }
            })


        })

    </script>
@stop