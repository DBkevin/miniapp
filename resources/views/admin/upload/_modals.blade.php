{{--创建目录--}}
<div class="modal fade" id="modal-folder-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('upload.folder')}}" method="post" class="form-horizontal">
                @csrf
                <input type="hidden" name="folder" value="{{$folder}}">
                <div class="modal-header">
                    <h4 class="modal-title">创建新的目录</h4>
                    <button type="button" data-dismiss="modal" class="close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <label for="new_folder_name" class="col-form-label col-sm-3">
                            目录名
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="new_folder" id="new_folder_name" class="form_conrol">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-primary">
                        创建新目录
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--删除文件--}}

<div class="fade modal" id="modal-file-delete">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">请确认</h4>
           
            <button type="button" data-dismiss="modal" class="close">
                x
            </button>
        </div>
        <div class="modal-body">
            <p class="lead">
                <i class="fa fa-question-circle fa-lg"></i>
                确定要删除
                <kbd><span id="delete-file-name1">file</span></kbd>
            </p>
        </div>
        <div class="modal-footer">
        <form action="{{route('upload.file.delete')}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="folder" value="{{$folder}}">
            <input type="hidden" name="del_file" id="delete-file-name2">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">
                取消
            </button>
            <button type="submit" class="btn btn-danger">
                删除文件
            </button>
        </form>
        </div>
    </div>
</div>
</div>

{{--删除目录--}}
<div class="modal fade" id="modal-folder-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">请确认</h4>
                <button data-dismiss='modal' class="close">
                    x
                </button>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i>
                    确认要删除
                    <kbd><span id="delete-folder-name1">folder</span></kbd>
                </p>
            </div>
            <div class="modal-footer">
            <form action="{{route('upload.folder.delete')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="folder" value="{{ $folder }}">
                <input type="hidden" name="del_folder" id="delete-folder-name2">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">
                    取消
                </button>
                <button type="submit" class="btn btn-danger">
                    删除目录
                </button>
            </form>
            </div>
        </div>
    </div>
</div>



{{--上传文件--}}
<div class="modal fade" id="modal-file-upload">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{route('upload.file')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="folder" value="{{$folder}}"> 
            <div class="modal-header">
                <h4 class="modal-title">上传新文件</h4>
                <button type="button"  data-dismiss='modal' class="close">
                    x
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <label for="file" class="col-sm-3 col-form-label">
                        文件
                    </label>
                    <div class="col-sm-8">
                        <input type="file" name="file" id="file">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fiel_name" class="col-sm-3 col-form-label">
                        文件名(可选)
                    </label>
                    <div class="col-sm-8">
                        <input type="text" name="file_name" id="file_name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">
                    取消
                </button>
                <button type="submit" class="btn btn-primary">
                    上传文件
                </button>
            </div>
        </form>
        </div>
    </div>
</div>

{{--浏览 图片--}}
<div class="modal fade" id="modal-image-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">图片预览</h4>
                <button type="button"  data-dismiss="modal" class="colse">
                    x
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-responsive" style="max-width:100%;" id="preview-image">
            </div>
            <div class="modal-footer">
                <button  type="button" data-dismiss="modal" class="btn btn-secondary">
                    取消
                </button>
            </div>
        </div>
    </div>
</div>