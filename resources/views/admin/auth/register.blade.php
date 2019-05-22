@extends('admin.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">用户注册</div>
                <div class="card-body">

                    @include('admin.partials.errors')

                    <form role="form" method="POST" action="{{ url('/register') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">邮箱</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                            </div>
                        </div>
                             <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">用户名</label>
                            <div class="col-md-6">
                                <input type="name" class="form-control" name="name" value="{{ old('name') }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">密码</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">重复密码</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">注册</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection