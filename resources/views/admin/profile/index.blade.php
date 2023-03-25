@extends('admin.layouts.admin')

@section('title')
    Hồ sơ
@endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Hồ sơ</h1>
            <p>Thông tin hồ sơ của bạn</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Hồ sơ</a></li>
        </ul>
    </div>
    <div class="row user justify-content-center">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-info" data-toggle="tab">Thông tin cá nhân</a></li>
                    <li class="nav-item"><a class="nav-link" href="#password-change" data-toggle="tab">Đổi mật khẩu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="user-info">
                    <div class="tile user-settings">
                        <h4 class="line-head">Thông tin cá nhân</h4>
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Họ:</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label>Tên:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <label>Địa chỉ email:</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Số điện thoại:</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Địa chỉ</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Home Phone</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i> Lưu thông tin
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade w-40" id="password-change">
                    <div class="tile user-settings">
                        <h4 class="line-head">Đổi mật khẩu</h4>
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <label>Mật khẩu cũ:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label>Mật khẩu mới:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label>Xác nhận mật khẩu mới:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i> Lưu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-after')
@endsection
