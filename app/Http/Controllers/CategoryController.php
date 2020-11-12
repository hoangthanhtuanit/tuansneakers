<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function getCreate()
    {
        return view('admin.categories.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories'
        ];
        $messages = [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Danh mục này đã tồn tại'
        ];

        $this->validate($request,$rules,$messages);

        $category = new Category();
        $category->name = mb_convert_case($request->name, MB_CASE_UPPER, 'utf8');
        $isInsert = $category->save();

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
        return redirect('admin/category/index');
    }

    public function getUpdate($id)
    {
        $category = Category::find($id);
        return view('admin.categories.update', compact('category'));
    }

    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:categories'
        ];
        $messages = [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Danh mục này đã tồn tại'
        ];
        $this->validate($request,$rules,$messages);

        $category = Category::find($id);
        $category->name = mb_convert_case($request->name, MB_CASE_UPPER, 'utf8');

        $isUpdate = $category->save();

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
        return redirect('admin/category/index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $isDelete = $category->delete();

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
        return redirect('admin/category/index');
    }
}
