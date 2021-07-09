@extends('layout.master')

@section('content')
<div class="container" style="margin-bottom: 50px;margin-top: 50px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Xác minh Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                        </div>
                    @endif

                    {{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để biết liên kết xác minh.') }}
                    {{ __('Nếu bạn không nhận được email') }}, <a href="{{ route('verification.resend') }}">{{ __('nhấn vào đây để yêu cầu khác') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
