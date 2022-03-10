<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/live-resume.css')}}">
    @yield('css')
</head>

<body>
@include('frontend.layouts.menu')
<div class="content-wrapper">
    <aside>
        <div class="profile-img-wrapper">
            <img src="{{asset('assets/images/Profile.png')}}" alt="profile">
        </div>
        <h1 class="profile-name">Daisy Murphy</h1>
        <div class="text-center">
            <span class="badge badge-white badge-pill profile-designation">UI / UX Designer</span>
        </div>
        @include('frontend.layouts.sidebar')
    </aside>
    <main>
   @yield('content')

        @include('frontend.layouts.footer')
    </main>
</div>
@yield('js')
@include('frontend.layouts.scripts')
</body>

</html>
