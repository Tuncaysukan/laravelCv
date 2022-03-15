

@extends('admin.layouts.masterPage')
@section('title')
    {{$data->edicationUniversity}}
@endsection

@section('content')

    <div class="page-header">
        <h3 class="page-title">    {{Str::upper($data->edicationUniversity)}} Düzenleme </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('manager.index')}}">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="{{route('manager.index')}}">Eğitimler</a></li>

                <li class="breadcrumb-item active" aria-current="page">    {{$data->edicationUniversity}}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="" id="updateEducationForm" method="Post" >
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

                        <div class="form-group">
                            <label for="edicationDate">Eğitim Tarihi</label>
                            <input type="text" class="form-control"  name="edicationDate" id="edicationDate" placeholder="Eğitim Tarihi" value="{{$data->edicationDate}}">
                            <small>Örnek 2010 - 2015</small>
                        </div>
                        <div class="form-group">
                            <label for="edicationUniversity">Üniversite Adı</label>
                            <input type="text" class="form-control" placeholder="Üniversite Adı" name="edicationUniversity" value="{{$data->edicationUniversity}}"id="edicationUniversity" >
                        </div>
                        <div class="form-group">
                            <label for="edicationSection">Üniversite Bölüm</label>
                            <input type="text" class="form-control" name="edicationSection" id="edicationSection"  value="{{$data->edicationSection}}" placeholder="Üniversite Bölüm">
                        </div>
                        <div class="form-group">
                            <label for="edicationDescriptions">Açıklama</label>
                            <textarea class="form-control" rows="7" cols="30" name="edicationDescriptions" value="" id="edicationDescriptions">{{$data->edicationDescriptions}}</textarea>
                        </div>

                        <div class="form-check form-check-flat form-check-success">
                            <label for="status" class="form-check-label">
                                <input type="checkbox" name="status" id="status" @if($data->status==1)checked @endif class="form-check-input"> Akif / Pasif</label>
                        </div>
                        <button type="button" id="updateButton" class="btn btn-success ">Kaydet</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('js')

    <script>


        let updateButton=$('#updateButton');
        updateButton.click(

            function () {
            if ($('#edicationUniversity').val().trim()==''){
               Swal.fire({
                   icon:'info',
                   title:'Uyarı',
                   text:'Üniversite Adı Boş Olamaz',
                   confirmButtonText: 'Tamam'
                   }

               )
            }
            else if ($('#edicationDate').val().trim()==''){
                Swal.fire
                ({
                    icon: 'info',
                    title: 'Uyarı',
                    text: 'Tarih Alanı  Boş',
                    confirmButtonText: 'Tamam'
                })

            }
            else if ($('#edicationSection').val().trim()==''){
                Swal.fire
                ({
                    icon: 'info',
                    title: 'Uyarı',
                    text: 'Bölüm Alanı  Boş',
                    confirmButtonText: 'Tamam'
                })

            }else {
                $('#updateEducationForm').submit();
            }
            }
        )
    </script>

@stop
