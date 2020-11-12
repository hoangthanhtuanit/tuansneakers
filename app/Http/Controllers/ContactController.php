<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contacts =  Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function detail($id)
    {
        $contact =  Contact::find($id);
        return view('admin.contacts.detail', compact('contact'));
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $isDelete = $contact->delete();

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
        return redirect('admin/contact/index');
    }
}
