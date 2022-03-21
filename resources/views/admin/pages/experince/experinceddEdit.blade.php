@extends('admin.layouts.masterPage')
@section('title')
    Deneyim Düzenleme Sayfasına  Hoşgeldiniz..
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> {{$data->experinceName}} Deneyim Ekle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('manager.index')}}">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="{{route('manager.index')}}">Deneyimler</a></li>

                <li class="breadcrumb-item active" aria-current="page">{{$data->experinceName}} Deneyim Ekle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{route('manager.experince.addShow')}}" id="createEducationForm" method="post" >
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
<input type="hidden" name="experinceId" value="{{$data->id}}">
                        <div class="form-group">
                            <label for="experinceDate"> Tarih</label>
                            <input type="text" class="form-control" value="{{$data->experinceDate}}" name="experinceDate" id="experinceDate" placeholder="Çalışma Tarihi">
                            <small>Örnek 2010 - 2015</small>
                        </div>
                        <div class="form-group">
                            <label for="experinceName">Firma  Adı</label>
                            <input type="text" class="form-control" placeholder="Firma Adı" value="{{$data->experinceName}}" name="experinceName" id="experinceName" >
                        </div>
                        <div class="form-group">
                            <label for="experinceSection">Görev Aldığı Bölüm</label>
                            <input type="text" class="form-control" value="{{$data->experinceSection}}" name="experinceSection" id="experinceSection" placeholder="Görev Aldığı Bölüm">
                        </div>
                        <div class="form-group">
                            <label for="experinceDescriptions">Açıklama</label>
                            <textarea class="form-control" rows="7" cols="30" name="experinceDescriptions" id="experinceDescriptions">{{$data->experinceDescriptions}}</textarea>
                        </div>

                        <div class="form-check form-check-flat form-check-success">
                            <label for="status" class="form-check-label">
                                <input type="checkbox" name="status" id="status" @if($data->status==1)checked @endif class="form-check-input"> Akif / Pasif</label>
                        </div>
                        <button type="button" id="createButton" class="btn btn-success ">Kaydet</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>


        let createBtn=$('#createButton');
        createBtn.click(

            function () {
                if ($('#experinceName').val().trim()==''){
                    Swal.fire({
                            icon:'info',
                            title:'Uyarı',
                            text:'Üniversite Adı Boş Olamaz',
                            confirmButtonText: 'Tamam'
                        }

                    )
                }
                else if ($('#experinceDate').val().trim()==''){
                    Swal.fire
                    ({
                        icon: 'info',
                        title: 'Uyarı',
                        text: 'Tarih Alanı  Boş',
                        confirmButtonText: 'Tamam'
                    })

                }
                else if ($('#experinceSection').val().trim()==''){
                    Swal.fire
                    ({
                        icon: 'info',
                        title: 'Uyarı',
                        text: 'Bölüm Alanı  Boş',
                        confirmButtonText: 'Tamam'
                    })

                }else {
                    $('#createEducationForm').submit();
                }
            }
        )
    </script>

@stop
