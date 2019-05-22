<?php

namespace App\Http\Controllers\Admin;

use App\Services\UploadsManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;

class UploadController extends Controller
{
    //
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);

        return view('admin.upload.index', $data);
    }
    /**
     * 新建文件夹
     *
     * @param UploadNewFolderRequest $request
     * @return void
     */
    public function createFolder(UploadNewFolderRequest $request)
    {
        //如:new=abc;
        $new_folder = $request->get('new_folder');
        //当前等public 现在是public/abc
        $folder = $request->get('folder') . '/' . $new_folder;


        $result = $this->manager->createDirectory($folder);

        if ($result === true) {
            return redirect()
                ->back()
                ->with('success', '目录[' . $new_folder . ']创建成功');
        }
        $error = $request ?: '创建目录出错.';
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * 删除文件夹
     *
     * @param Request $request
     * @return void
     */
    public function deleteFolder(Request $request)
    {
        $del_folder = $request->get('del_folder');
        $folder = $request->get('folder') . '/' . $del_folder;

        $result = $this->manager->deleteDirectory($folder);

        if ($result === true) {
            return redirect()
                ->back()
                ->with('success', '目录[' . $del_folder . ']已删除');
        }

        $error = $result ?: 'An error occurred deleting directory';
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * 删除文件
     */
    public function deleteFile(Request $request)
    {
        $del_file = $request->get('del_file');
        $path = $request->get('folder') . '/' . $del_file;

        $result = $this->manager->deleteFiles($path);

        if ($result === true) {
            return redirect()
                ->back()
                ->with('success','文件['.$del_file.']已删除');
        }

        $error = $result ?: '文件删除出错.';

        return redirect()
            ->back()
            ->withErrors([$error]);
    }
    /**
     * 上传文件
     *
     * @param UploadFileRequest $request
     * @return void
     */
    public function uploadFile(UploadFileRequest $request)
    {
        $file = $_FILES['file'];
        $fileName = $request->get('file_name');
        $fileName = $fileName ?: $file['name'];
        $path = str_finish($request['folder'], '/') . $fileName;
        $content = File::get($file['tmp_name']);

        $result = $this->manager->saveFile($path, $content);

        if ($result === true) {
            return redirect()
                ->back()
                ->with('success', '文件[' . $fileName . ']上传成功');
        }
        $error = $result ?: '文件上传错误.';
        return redirect()
            ->back()
            ->withErrors([$error]);
    }
}
