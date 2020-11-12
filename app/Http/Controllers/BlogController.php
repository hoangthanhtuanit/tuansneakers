<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function getCreate()
    {
        return view('admin.blogs.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'title' => 'required',
            'image' => 'image|max:10000',
            'summary' => 'required'
        ];
        $messages = [
            'title.required' => 'Tiêu đề tin không được để trống',
            'image.image' => 'Định dạng ảnh không cho phép',
            'image.max' => 'Dung lượng ảnh quá lớn',
            'summary.required' => 'Nội dung tin không được để trống'
        ];
        $this->validate($request, $rules, $messages);

        $blog = new Blog();
        $file_name = '';
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'blog-' . str_random(5) . '-' . $image->getClientOriginalName();

            $dir_uploads = public_path() . '/uploads/blogs';
            $image->move($dir_uploads, $file_name);
        }

        $image = $file_name;
        $blog->image = $image;
        $blog->title = $request->title;
        $blog->summary = $request->summary;
        $blog->status = $request->status;
        $isInsert = $blog->save();

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
        return redirect('admin/blog/index');
    }

    public function getUpdate($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.update', compact('blog'));
    }

    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'image' => 'image|max:10000',
            'summary' => 'required'
        ];
        $messages = [
            'title.required' => 'Tiêu đề tin không được để trống',
            'image.image' => 'Định dạng ảnh không cho phép',
            'image.max' => 'Dung lượng ảnh quá lớn',
            'summary.required' => 'Nội dung tin không được để trống'
        ];
        $this->validate($request, $rules, $messages);

        $blog = Blog::find($id);
        $file_name = $blog->image;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'blog-' . str_random(5) . '-' . $image->getClientOriginalName();
            $dir_uploads = public_path() . '/uploads/blogs';
            @unlink($dir_uploads . '/' . $blog->image);
            $image->move($dir_uploads, $file_name);
        }

        $blog->image = $file_name;
        $blog->title = $request->title;
        $blog->summary = $request->summary;
        $blog->status = $request->status;
        $isUpdate = $blog->save();

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

        return redirect('admin/blog/index');
    }

    public function Active($action, $id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            switch ($action) {
                case 'disable':
                    $blog->status = 0;
                    break;
                case 'active':
                    $blog->status = 1;
                    break;
            }
            $isActive = $blog->save();
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
        $blog = Blog::find($id);
        $dir_uploads = public_path() . '/uploads/blogs';
        @unlink($dir_uploads . '/' . $blog->image);
        $isDelete = $blog->delete();

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
        return redirect('admin/blog/index');
    }
}
