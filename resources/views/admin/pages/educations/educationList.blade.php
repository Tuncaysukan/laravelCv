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
                                    <td>{{$item->edicationDate}}</td>
                                    <td>{{$item->edicationUniversity}}</td>
                                    <td>{{$item->edicationSection}}</td>
                                    <td>{{$item->edicationDescriptions}}</td>
                                    <td>
                                        {{ $item->status ==1 ? "Aktif" : "Pasif" }}
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