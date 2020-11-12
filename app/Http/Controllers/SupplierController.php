<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function getCreate()
    {
        return view('admin.suppliers.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required|unique:suppliers',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email'
        ];
        $messages = [
            'name.required' => 'Tên nhà cung cấp không được để trống',
            'name.unique' => 'Nhà cung cấp này đã tồn tại',
            'address.required' => 'Địa chỉ không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.numeric' => 'Số điện thoại không đúng định dạng',
            'email.required' => 'Địa chỉ email không được để trống',
            'email.email' => 'Địa chỉ email không đúng định dạng'
        ];
        $this->validate($request, $rules, $messages);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone_number = $request->phone_number;
        $supplier->email = $request->email;
        $isInsert = $supplier->save();

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
        return redirect('admin/supplier/index');
    }

    public function getUpdate($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.suppliers.update', compact('supplier'));
    }

    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email'
        ];
        $messages = [
            'name.required' => 'Tên nhà cung cấp không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.numeric' => 'Số điện thoại không đúng định dạng',
            'email.required' => 'Địa chỉ email không được để trống',
            'email.email' => 'Địa chỉ email không đúng định dạng'
        ];
        $this->validate($request, $rules, $messages);

        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone_number = $request->phone_number;
        $supplier->email = $request->email;
        $isUpdate = $supplier->save();

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
        return redirect('admin/supplier/index');
    }

    public function delete($id)
    {
        $supplier = Supplier::find($id);
        $isDelete = $supplier->delete();

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
        return redirect('admin/supplier/index');
    }
}
