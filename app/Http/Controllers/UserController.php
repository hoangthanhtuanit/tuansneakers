<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function getCreate()
    {
        if (Auth::user()->level == 2) {
            return view('admin.users.create');
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Bạn chưa được cấp quyền này'
            ]);
            return back();
        }
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'full_name' => 'required',
            'avatar' => 'image|max:10000',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:5|max:32',
            're_password' => 'required|same:password',
            'address' => 'required',
            'phone_number' => 'required|numeric'
        ];
        $messages = [
            'full_name.required' => 'Họ tên không được để trống',
            'avatar.image' => 'Định dạng không cho phép',
            'avatar.max' => 'Kích thước file quá lớn',
            'email.email' => 'Không đúng định dạng email',
            'email.required' => 'Địa chỉ email không được để trống',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 5 ký tự',
            'password.max' => 'Mật khẩu tối đa 32 ký tự',
            're_password.required' => 'Bạn chưa nhập lại mật khẩu',
            're_password.same' => 'Mật khẩu chưa khớp',
            'address.required' => 'Địa chỉ không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.numeric' => 'Số điện thoại sai định dạng'
        ];
        $this->validate($request, $rules, $messages);

        $user = new User();

        $file_name = '';
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $file_name = 'user-' . str_random(5) . '-' . $avatar->getClientOriginalName();
            $dir_uploads = public_path() . '/uploads/users';
            $avatar->move($dir_uploads, $file_name);
        }
        $avatar = $file_name;
        $user->full_name = $request->full_name;
        $user->avatar = $avatar;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;
        $user->level = $request->level;
        $user->confirmed = $request->status;
        $isInsert = $user->save();

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
        return redirect('admin/user/index');
    }

    public function detail($id)
    {
        $user = User::find($id);
        return view('admin.users.detail', compact('user'));
    }

    public function getUpdate($id)
    {
        if (Auth::user()->level == 2) {
            $user = User::find($id);
            return view('admin.users.update', compact('user'));
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Bạn chưa được cấp quyền này'
            ]);
            return back();
        }
    }

    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'full_name' => 'required',
            'avatar' => 'image|max:10000',
            'email' => 'email|required',
            'address' => 'required',
            'phone_number' => 'required|numeric'
        ];
        $messages = [
            'full_name.required' => 'Họ tên không được để trống',
            'avatar.image' => 'Định dạng không cho phép',
            'avatar.max' => 'Kích thước file quá lớn',
            'email.email' => 'Không đúng định dạng email',
            'email.required' => 'Địa chỉ email không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.numeric' => 'Số điện thoại sai định dạng'
        ];
        $this->validate($request,$rules,$messages);

        $user = User::find($id);

        $file_name = '';
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $file_name = 'user-' . str_random(5) . '-' . $avatar->getClientOriginalName();
            $dir_uploads = public_path() . '/uploads/users';
            @unlink($dir_uploads . '/' . $user->avatar);
            $avatar->move($dir_uploads, $file_name);
        }
        $avatar = $file_name;
        $user->full_name = $request->full_name;
        $user->avatar = $avatar;
        $user->email = $request->email;
        if (isset($request->changePassword)) {
            $this->validate($request,
                [
                    'password' => 'required|min:5|max:32',
                    're_password' => 'required|same:password'
                ],
                [
                    'password.required' => 'Mật khẩu không được để trống',
                    'password.min' => 'Mật khẩu tối thiểu 5 ký tự',
                    'password.max' => 'Mật khẩu tối đa 32 ký tự',
                    're_password.required' => 'Bạn chưa nhập lại mật khẩu',
                    're_password.same' => 'Mật khẩu chưa khớp'
                ]
            );
            $user->password = bcrypt($request->password);
        }
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        if ($user->gender != $request->gender || $user->level != $request->level || $user->status != $request->status) {
            $user->gender = $request->gender;
            $user->level = $request->level;
            $user->confirmed = $request->status;
        }
        $isUpdate = $user->save();

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
        return redirect('admin/user/index');
    }

    public function Active($action, $id)
    {
        $user = User::find($id);
        if ($user) {
            switch ($action) {
                case 'disable':
                    $user->confirmed = 0;
                    break;
                case 'active':
                    $user->confirmed = 1;
                    break;
            }
            $isActive = $user->save();
        }
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
        return back();
    }

    public function getLoginAdmin()
    {
        if (Auth::check()) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function postLoginAdmin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            if(Auth::user()->confirmed == 0){
                $request->session()->flush();
                $request->session()->regenerate();
                session()->flash('toastr', [
                    'type' => 'error',
                    'message' => 'Tài khoản của bạn chưa xác thực'
                ]);
                return back();
            }
            session()->flash('toastr', [
                'type' => 'success',
                'message' => 'Đăng nhập thành công'
            ]);
            return redirect('admin/dashboard');
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Email hoặc mật khẩu không đúng'
            ]);
            return back();
        }
    }

    public function logoutAdmin(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('admin/login');
    }

    public function delete($id)
    {
        if (Auth::user()->level == 2) {
            $user = User::find($id);
            $dir_uploads = public_path() . '/uploads/users';
            @unlink($dir_uploads . '/' . $user->avatar);
            $isDelete = $user->delete();

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
            return redirect('admin/user/index');
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Bạn chưa được cấp quyền này'
            ]);
            return back();
        }
    }
}
