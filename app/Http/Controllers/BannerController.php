<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function getCreate()
    {
        return view('admin.banners.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'image' => 'image|max:10000'
        ];
        $messages = [
            'image.image' => 'Định dạng không cho phép',
            'image.max' => 'Kích thước file quá lớn'
        ];
        $this->validate($request, $rules, $messages);

        $banner = new Banner();

        $file_name = '';
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'banner-' . str_random(5) . '-' . $image->getClientOriginalName();

            $dir_uploads = public_path() . '/uploads/banners';
            $image->move($dir_uploads, $file_name);
        }

        $image = $file_name;
        $banner->image = $image;
        $banner->status = $request->status;
        $isInsert = $banner->save();

        if ($isInsert) {
            session()->flash('toastr', [
                'type' => 'success',
                'message' => 'Thêm mới thành công'
            ]);
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Thêm mới thất bại'
            ]);
        }
        return redirect('admin/banner/index');
    }

    public function getUpdate($id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.update', compact('banner'));
    }

    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'image' => 'image|max:10000'
        ];
        $messages = [
            'image.image' => 'Định dạng không cho phép',
            'image.max' => 'Kích thước file quá lớn'
        ];
        $this->validate($request, $rules, $messages);

        $banner = Banner::find($id);
        $file_name = $banner->image;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'banner-' . str_random(5) . '-' . $image->getClientOriginalName();
            $dir_uploads = public_path() . '/uploads/banners';
            @unlink($dir_uploads . '/' . $banner->image);
            $image->move($dir_uploads, $file_name);
        }

        $banner->image = $file_name;
        $banner->status = $request->status;
        $isUpdate = $banner->save();

        if ($isUpdate) {
            session()->flash('toastr', [
                'type' => 'success',
                'message' => 'Cập nhật thành công'
            ]);
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Cập nhật thất bại'
            ]);
        }

        return redirect('admin/banner/index');
    }

    public function Active($action, $id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            switch ($action) {
                case 'disable':
                    $banner->status = 0;
                    break;
                case 'active':
                    $banner->status = 1;
                    break;
            }
            $isActive = $banner->save();
            if ($isActive) {
                session()->flash('toastr', [
                    'type' => 'success',
                    'message' => 'Xử lý thành công'
                ]);
            } else {
                session()->flash('toastr', [
                    'type' => 'error',
                    'message' => 'Xử lý thất bại'
                ]);
            }
        }
        return back();
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $dir_uploads = public_path() . '/uploads/banners';
        @unlink($dir_uploads . '/' . $banner->image);
        $isDelete = $banner->delete();

        if ($isDelete) {
            session()->flash('toastr', [
                'type' => 'success',
                'message' => 'Xóa thành công'
            ]);
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Xóa thất bại'
            ]);
        }
        return redirect('admin/banner/index');
    }
}
