<!DOCTYPE html>
<html lang="en">
{{-- HEADER --}}
    @include('partials.partialsuser.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        {{-- SIDEBAR --}}
        @include('partials.partialsuser.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            {{-- TOPBAR --}}
            @include('partials.partialsuser.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <main>
                       {{ $slot ?? '' }}
                    </main>

                </div>
            </div>
            {{-- FOOTER --}}
            @include('partials.partialsuser.footer')

        </div>
        <!-- End of Content Wrapper -->
    </div>
    {{-- SCRIPTFOOTER --}}
    @include('partials.partialsuser.scriptfooter')
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    @stack('scripts')
</body>

</html>