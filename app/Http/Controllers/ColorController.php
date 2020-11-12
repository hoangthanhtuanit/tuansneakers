<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function getCreate()
    {
        return view('admin.colors.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'color' => 'required|unique:colors'
        ];
        $messages = [
            'color.required' => 'Màu không được để trống',
            'color.unique' => 'Màu này đã tồn tại'
        ];

        $this->validate($request,$rules,$messages);

        $color = new Color();
        $color->color = $request->color;
        $isInsert = $color->save();

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
        return redirect('admin/color/index');
    }

    public function delete($id)
    {
        $color = Color::find($id);
        $isDelete = $color->delete();

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
        return redirect('admin/color/index');
    }
}
