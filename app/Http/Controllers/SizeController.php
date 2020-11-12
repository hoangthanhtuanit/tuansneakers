<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    //
    public function index()
    {
        $sizes = Size::all();
        return view('admin.sizes.index', compact('sizes'));
    }

    public function getCreate()
    {
        return view('admin.sizes.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'size' => 'required|unique:sizes|numeric'
        ];
        $messages = [
            'size.required' => 'Kích thước không được để trống',
            'size.unique' => 'Kích thước này đã tồn tại',
            'size.numeric' => 'Kích thước phải là số'
        ];

        $this->validate($request,$rules,$messages);

        $size = new Size();
        $size->size = $request->size;
        $isInsert = $size->save();

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
        return redirect('admin/size/index');
    }

    public function delete($id)
    {
        $size = Size::find($id);
        $isDelete = $size->delete();

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
        return redirect('admin/size/index');
    }
}
