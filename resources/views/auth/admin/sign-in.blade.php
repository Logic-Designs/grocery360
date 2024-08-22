<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@lang('admin.Sign in - Logic Panel')</title>
    <!-- CSS files -->
    <link href="{{ asset('tabler/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/demo.min.css') }}" rel="stylesheet"/>
</head>
<body class="border-top-wide border-primary d-flex flex-column">
<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('images/main/logo.png') }}" height="36" alt=""></a>
        </div>
        <form class="card card-md" action="{{ route('adminLoginPost') }}" method="post" autocomplete="off">
            @csrf
            @if(session()->has('error'))
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-title">@lang('admin.Uh oh, something went wrong')</h4>
                    <div class="text-muted">{{ session()->get('error') }}</div>
                </div>
            @endif
            <div class="card-body">
                <h2 class="card-title text-center mb-4">@lang('admin.Login to your account')</h2>
                <div class="mb-3">
                    <label class="form-label">@lang('admin.Email address')</label>
                    <input type="email" name="email" class="form-control" placeholder="@lang('admin.Enter email')">
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        @lang('admin.Password')
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control"  placeholder="@lang('admin.Password')"  autocomplete="off">
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">@lang('admin.Sign in')</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="{{ asset('dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.min.js') }}"></script>
</body>
</html>
