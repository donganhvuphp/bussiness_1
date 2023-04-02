@extends('admin.layouts.admin')

@section('title')
    {{ __('Nhãn hiệu') }}
@endsection
@section('css-after')
@endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>{{ !empty($brand->name) ?  __('Sửa nhãn hiệu') : __('Tạo mới nhãn hiệu') }}</h1>
            <p>{{ __('Thông tin nhãn hiệu sản phẩm') }}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">{{ !empty($brand->name) ? __('Sửa nhãn hiệu') : __('Tạo mới nhãn hiệu') }}</a></li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-5">
            <div class="tile">
                <div class="d-flex justify-content-between">
                    <h3 class="tile-title">{{ !empty($brand->name) ?  __('Sửa nhãn hiệu') : __('Tạo nhãn hiệu') }}</h3>
                </div>
                <form id="handle-brand" action="{{ route('admin.brands.handle') }}" method="POST" data-redirect="{{ route('admin.brands.index') }}">
                    @if(!empty($brand))
                        <input name="id" value="{{ $brand->id ?? '' }}" type="hidden">
                    @endif
                    <div class="row mb-4">
                        <div class="col-12">
                            <label>Tên nhãn hiệu:</label>
                            <input name="name" value="{{ $brand->name ?? '' }}" class="form-control" type="text">
                            <div class="error-message error_name"></div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i> Lưu
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script-after')
    <script src="{{ asset('admin_assets/js/brand.js') }}" type="module"></script>
@endsection
