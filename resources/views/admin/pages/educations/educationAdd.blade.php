@extends('admin.layouts.masterPage')
@section('title')
    Eğitim Ekleme Sayfasına  Hoşgeldiniz..
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Yeni Eğitim Ekle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('manager.index')}}">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="{{route('manager.index')}}">Eğitimler</a></li>

                <li class="breadcrumb-item active" aria-current="page">Yeni Eğitim Ekle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="" id="createEducationForm" method="post" >
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
                            <input type="text" class="form-control"  name="edicationDate" id="edicationDate" placeholder="Eğitim Tarihi">
                            <small>Örnek 2010 - 2015</small>
                        </div>
                        <div class="form-group">
                            <label for="edicationUniversity">Üniversite Adı</label>
                            <input type="text" class="form-control" placeholder="Üniversite Adı" name="edicationUniversity" id="edicationUniversity" >
                        </div>
                        <div class="form-group">
                            <label for="edicationSection">Üniversite Bölüm</label>
                            <input type="text" class="form-control" name="edicationSection" id="edicationSection" placeholder="Üniversite Bölüm">
                        </div>
                        <div class="form-group">
                            <label for="edicationDescriptions">Açıklama</label>
                            <textarea class="form-control" rows="7" cols="30" name="edicationDescriptions" id="edicationDescriptions"></textarea>
                        </div>

                        <div class="form-check form-check-flat form-check-success">
                            <label for="status" class="form-check-label">
                                <input type="checkbox" name="status" id="status" class="form-check-input"> Akif / Pasif</label>
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
                $('#createEducationForm').submit();
            }
            }
        )
    </script>

@stop
