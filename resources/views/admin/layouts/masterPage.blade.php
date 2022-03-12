<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.head')
<body>
<div class="container-scroller">
   @include('admin.layouts.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©2022</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Tncy <a href="https://www.instagram.com/tncyssss/"> </a></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@include('admin.layouts.footer')

</body>
</html>