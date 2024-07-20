<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Dashbard - Email Verification</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- START : Theme Config js-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
    <!-- END : Theme Config js-->
</head>

<body class=" font-inter skin-default">
    <div class="loginwrapper">
        <div class="lg-inner-column">
            <div class="left-column relative z-[1]">
                <div class="max-w-[520px] pt-20 ltr:pl-20 rtl:pr-20">
                    <h4>
                        Unlock your Project
                        <span class="text-slate-800 dark:text-slate-400 font-bold">
                            performance
                        </span>
                    </h4>
                </div>
                <div class="absolute left-0 2xl:bottom-[-160px] bottom-[-130px] h-full w-full z-[-1]">
                    <img src="{{ asset('assets/images/auth/ils1.svg') }}" alt=""
                        class=" h-full w-full object-contain">
                </div>
            </div>
            <div class="right-column relative">
                <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
                    <div class="auth-box2 flex flex-col justify-center h-full">
                        <div class="mobile-logo text-center mb-6 lg:hidden block">
                            <h4 class="font-medium float-left">Dashboard</h4>
                        </div>
                        <div class="text-center 2xl:mb-10 mb-5">
                            <h4 class="font-medium mb-4">Email activation</h4>
                            <div class="text-slate-500 dark:text-slate-400 text-base">
                                Send an Email activation request? Here you can easily verify.
                            </div>
                        </div>
                        <!-- BEGIN: Forgot Password Form -->
                        <form class="space-y-4" action='index.html'>
                            <input type="button" class="btn btn-dark block w-full text-center"
                                onclick="sendVerifyEmail()"
                                value="Request
                                Verify Email" style="cursor: pointer">
                        </form>
                        <!-- END: Forgot Password Form -->
                    </div>
                    <div class="auth-footer text-center">
                        Copyright {{ now()->year }}, {{ config('app.name') }} All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function sendVerifyEmail() {
            axios.get('{{ route('verification.request') }}')
                .then(function(response) {
                    toastr.success(response.data.message);
                }).catch(function(error) {
                    toastr.error(error.response.data.message);
                });
        }
    </script>
</body>

</html>
