@extends('blog.layouts.master',['meta_description'=>"联系我们"])

@section('page-header')
    <header class="masthead" style="background-image:url('{{page_image('upload/contact-bg.jpg')}}">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="clo-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>联系我们</h1>
                        <span class="subheading">你有问题?我有答案.</span>
                    </div>
                </div>
            </div>
        
        </div>

    </header>
    
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @include('admin.partials.errors')
                @include('admin.partials.success')
                <p>
                    想与我联系?填写下面的表单给我发信息,我会尽快给你回复!
                </p>
                <form action="/contact" method="post" id="contactForm" novalidate>
                    @csrf
                 
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label >姓名</label>
                            <input type="text" name="name" value="{{old('email')}}"  required id="email" placeholder="请填写你名字"  class="form-control">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label >邮箱</label>
                            <input type="email" name="email" value="{{old('email')}}"  required id="email" placeholder="请填写你的 邮箱" class="form-control">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>手机</label>
                            <input type="tel" name="phone" class="form-control" placeholder="填写你的手机号" id="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>消息</label>
                            <textarea rows="5" name="message" class="form-control" placeholder="填写你想发送的消息" id="message" value="{{ old('message') }}" required></textarea>
                        </div>
                    </div>
                    <br>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">发送</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection