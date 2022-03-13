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
                    <h4 class="card-title">Cv deki Eğitimler</h4>
                    <div class="card-header">
                        <a class="nav-link btn btn-success create-new-button" href="{{route('manager.edication.add')}}">
                            Yeni Eğitim Ekle</a>
                    </div>
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Eğitim Tarihi.</th>
                                <th>Bölüm</th>
                                <th>Üniversite</th>
                                <th>Açıklama</th>
                                <th>Durum</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->edicationDate)->format("d-m-Y")}}</td>
                                    <td>{{$item->edicationUniversity}}</td>
                                    <td>{{$item->edicationSection}}</td>
                                    <td>{{$item->edicationDescriptions}}</td>
                                    <td>
                                        @if   ($item->status ==1)   <a data-id="{{$item->id}}" href="javascript:void(0)"
                                                                       type="button"
                                                                       class="btn btn-success changeStatus btn-md">Aktif</a>
                                        @else
                                            <a data-id="{{$item->id}}" type="button" href="javascript:void(0)"
                                               class="btn btn-danger changeStatus btn-md">Pasif</a>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
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

            $.ajax({
                url: "{{route('manager.education.changeStatus')}}",
                type: "Post",
                async: false,
                data: {
                    data: data
                },
                success: function (response) {

                    Swal.fire({
                        icon:'success',
                        title:'Başarılı',
                        text:data + 'Lütfen ilgili ID  kontrol ediniz..'+response.newStatus +'olarak güncellenmiştir',
                        confirmButtonText:'Tamam',
                    }) ;

                }     ,
                error:function () {

                }
            })
              // .done(function () {
              //
              // }).fail(function () {
              //})

        })

    </script>
@stop