@extends('admin.layouts')

@section('content')
<div class="container">
    <div class=" row page-title-row">
        <div class="col-md-12">
            <h3>标签
                <small>>>编辑标签</small>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">标签编辑表单</h3>
                </div>
                <div class="card-body">
                    @include('admin.partials.errors')
                    @include('admin.partials.success')
                     <form role="form" method="POST" action="{{route ("tag.update",$id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="tag" class="col-md-3 col-form-label">标签</label>
                            <div class="col-md-3">
                                <p class="form-control-plaintext">{{$tag}}</p>
                            </div>
                        </div>
                        @include('admin.tag._form')
                        <div class="from-group row">
                            <div class="col-md-7 com-md-offset-3">
                                <button type="submit" class=" btn btn-md btn-primary">
                                    <i class="fa-save fa"></i>
                                    保存修改
                                </button>
                                <button class="btn btn-md btn-danger" type="button" data-toggle="modal"
                                    data-target="#modal-delete">
                                    <i class="fa-times-circle fa"></i>
                                    删除
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
{{--确认删除--}}
<div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">请确认</h4>
                <button type="button" data-dismiss="modal" class="close">
                    X
                </button>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa-question-circle fa fa-lg"></i>
                    确定要删除这个标签?
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{route('tag.destroy',$id)}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn-secondary btn " type="button" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger"><i class="fa-times-circel fa"></i>确认</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection