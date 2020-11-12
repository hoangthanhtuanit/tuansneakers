<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Blog;
use App\Category;
use App\Comment;
use App\Contact;
use App\Order;
use App\Order_detail;
use App\Product;
use App\Product_image;
use App\Size;
use App\User;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 1)->get();
        $newProducts = Product::where('status', 1)->orderByRaw('created_at DESC')->take(10)->get();
        $saleProducts = Product::where([['status', 1], ['discount', '>' ,0]])->get();
        $hotProducts = Product::where([['status', 1], ['quantity_sold', '>' ,50]])->get();
        $randomProducts = Product::where([['status', 1], ['discount', '>' ,0]])->inRandomOrder()->limit(2)->get();
        $blogs = Blog::where('status', 1)->get();
        return view('pages.home', compact('newProducts','saleProducts', 'hotProducts', 'banners', 'randomProducts', 'blogs'));
    }

    public function Shop(Request $request)
    {
        $categories = Category::all();
        $products = Product::where('status', 1);
        if ($request->sort) {
            $orderBy = $request->sort;
            switch ($orderBy) {
                case 1:
                    $products->orderBy('name', 'ASC');
                    break;
                case 2:
                    $products->orderBy('name', 'DESC');
                    break;
                case 3:
                    $products->orderBy('price', 'ASC');
                    break;
                case 4:
                    $products->orderBy('price', 'DESC');
                    break;
            }
        }
        $products = $products->paginate(12);
        return view('pages.shop', compact('products','categories'));
    }

    public function Category(Request $request, $id)
    {
        $categories = Category::all();
        $products = Product::where([['category_id', $id], ['status' , 1]]);
        if ($request->sort) {
            $orderBy = $request->sort;
            switch ($orderBy) {
                case 1:
                    $products->orderBy('name', 'ASC');
                    break;
                case 2:
                    $products->orderBy('name', 'DESC');
                    break;
                case 3:
                    $products->orderBy('price', 'ASC');
                    break;
                case 4:
                    $products->orderBy('price', 'DESC');
                    break;
            }
        }
        $products = $products->paginate(6);
        return view('pages.category', compact('products','categories'));
    }

    public function product($id)
    {
        $product = Product::find($id);
        $product_images = Product_image::where('product_id', $id)->get();
        $sizes = Size::all();
        $saleProducts = Product::where([['status', 1], ['discount', '>' ,0]])->get();
        $comments = Comment::where('product_id', $id)->orderBy('created_at', 'desc')->limit(10)->get();
        return view('pages.product', compact('product', 'product_images', 'sizes', 'saleProducts', 'comments'));
    }

    public function postProduct(Request $request, $id)
    {
        $comment = new Comment();
        if (Auth::check()) {
            $this->validate($request,
                [
                    'message' => 'required'
                ],
                [
                    'message.required' => 'Nội dung bình luận không được để trống'
                ]);
            $comment->customer_id = Auth::id();
            $comment->full_name = Auth::user()->full_name;
            $comment->email = Auth::user()->email;
            $comment->product_id = $id;
            $comment->message = $request->message;
        } else {
            $this->validate($request,
                [
                    'full_name' => 'required',
                    'email' => 'required|email',
                    'message' => 'required'
                ],
                [
                    'full_name.required' => 'Họ tên không được để trống',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Email chưa đúng định dạng',
                    'message.required' => 'Nội dung bình luận không được để trống'
                ]);
            $comment->full_name = $request->full_name;
            $comment->email = $request->email;
            $comment->product_id = $id;
            $comment->message = $request->message;
        }
        $isSended = $comment->save();
        if ($isSended) {
            session()->flash('toastr', [
                'type' => 'success',
                'message' => 'Đã đánh giá'
            ]);
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Đánh giá thất bại'
            ]);
        }

        return back();
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('pages.login');
        }
    }

    public function postLogin(Request $request)
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
            return redirect('home');
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Email hoặc mật khẩu không đúng'
            ]);
            return back();
        }
    }

    public function getRegister()
    {
        return view('pages.register');
    }

    public function PostRegister(Request $request)
    {
        $this->validate($request,
            [
                'full_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'avatar' => 'image|max:10000',
                'password' => 'required|min:5|max:32',
                're_password' => 'required|same:password',
                'address' => 'required',
                'phone_number' => 'required|numeric'
            ],
            [
                'full_name.required' => 'Họ tên không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email chưa đúng định dạng',
                'email.unique' => 'Email đã có người sử dụng',
                'avatar.image' => 'Định dạng không cho phép',
                'avatar.max' => 'Kích thước file quá lớn',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
                'password.max' => 'Mật khẩu tối đa 32 ký tự',
                're_password.required' => 'Bạn chưa nhập lại mật khẩu',
                're_password.same' => 'Mật khẩu chưa khớp',
                'address.required' => 'Địa chỉ không được để trống',
                'phone_number.required' => 'Số điện thoại không được để trống',
                'phone_number.numeric' => 'Số điện thoại sai định dạng'
            ]);
        $confirmation_code = time().uniqid(true);
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
        $user->level = 0;
        $user->confirmation_code = $confirmation_code;
        $user->confirmed = 0;
        $isInsert = $user->save();

        $data['confirmation_code'] = $confirmation_code;
        Mail::send('pages.user-activation', $data, function($message) use ($request) {
            $message->from('tuansneakerservice@gmail.com', 'TUAN SNEAKERS STORE');

            $message->to($request->email)->subject('Xác thực tài khoản');
        });


        if ($isInsert) {
            session()->flash('toastr', [
                'type' => 'success',
                'message' => 'Vui lòng xác nhận tài khoản email'
            ]);
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Đăng ký thất bại'
            ]);
        }

        return redirect('login');
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code);

        if ($user->count() > 0) {
            $user->update(['confirmed' => 1, 'confirmation_code' => null]);
            session()->flash('toastr', [
                'type' => 'success',
                'message' => 'Đã xác thực thành công'
            ]);
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Mã xác thực không chính xác'
            ]);
        }
        return redirect('login');
    }

    public function Logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('home');
    }

    public function AboutUs()
    {
        return view('pages.about-us');
    }

    public function AddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $quantity = $request->qtybutton;
        $size = $request->size;
        $color = $product->color;
        $price = $product->price;
        $price_old = $product->price;
        $discount = $product->discount;
        if ($discount) {
            $price = $price_old * (100 - $discount) / 100;
        }
        if ($quantity >= 1) {
            $carts = Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => $quantity, 'price' => $price, 'options' => array('img' => $product->image, 'color' => $color, 'size' => $size, 'old_price' => $price_old, 'discount' => $discount)));
            if ($carts) {
                session()->flash('toastr', [
                    'type' => 'success',
                    'message' => 'Thêm vào giỏ hàng thành công'
                ]);
            } else {
                session()->flash('toastr', [
                    'type' => 'error',
                    'message' => 'Thêm vào giỏ hàng thất bại'
                ]);
            }
        }
        return redirect('shop');
    }

    public function Cart()
    {
        $cart_items = Cart::content();
        $total_price = Cart::total(0, 3);
        return view('pages.cart', compact('cart_items', 'total_price'));
    }

    public function UpdateCart(Request $request)
    {
        $quantity = $request->quantity;
        $rowId = $request->rowId;
        Cart::update($rowId, $quantity);
        return back();
    }

    public function RemoveCart($id)
    {
        if ($id == 'all') {
            Cart::destroy();
        } else {
            Cart::remove($id);
        }
        return back();
    }

    public function GetPayment()
    {
        $cart_items = Cart::content();
        $total_price = Cart::total(0, 3);
        if ($cart_items->isEmpty()) {
            return redirect('home');
        } else {
            return view('pages.checkout', compact('cart_items','total_price'));
        }
    }

    public function PostPayment(Request $request)
    {
        $rules = [
            'full_name' => 'required',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'email|required',
            'address' => 'required'
        ];
        $messages = [
            'full_name.required' => 'Họ tên không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.numeric' => 'Số điện thoại không đúng định dạng',
            'phone_number.min' => 'Số điện thoại không đúng định dạng',
            'email.email' => 'Không đúng định dạng email',
            'email.required' => 'Địa chỉ email không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
        ];
        $this->validate($request, $rules, $messages);

        $total_price = str_replace(',', '', Cart::total(0, 3));
        if (Auth::check()) {
            $orderId = Order::insertGetId([
                'customer_id' => Auth::id(),
                'full_name' => $request->full_name,
                'date_order' => Carbon::now()->toDateString(),
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'postal_id' => str_random(9),
                'payment' => $request->payment,
                'note' => $request->note,
                'total_price' => (int)$total_price,
            ]);
        } else {
            $orderId = Order::insertGetId([
                'full_name' => $request->full_name,
                'date_order' => Carbon::now()->toDateString(),
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'postal_id' => str_random(9),
                'payment' => $request->payment,
                'note' => $request->note,
                'total_price' => (int)$total_price,
            ]);
        }

        if ($orderId) {
            $products = Cart::content();
            foreach ($products as $product) {
                Order_detail::insert([
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'quantity' => $product->qty,
                    'price' => $product->price,
                    'discount' => $product->options->discount,
                    'size' => $product->options->size,
                    'color' => $product->options->color
                ]);
            }
        }

        if ($orderId) {
            $products = Cart::content();
            foreach ($products as $product) {
                $p_update = Product::where('id', $product->id)->first();
                $p_update->quantity_in_stock = $p_update->quantity_in_stock - $product->qty;
                $p_update->quantity_sold = $p_update->quantity_sold + $product->qty;
                $p_update->save();
            }
        }

        if ($orderId) {
            session()->flash('success');
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Đặt hàng thất bại'
            ]);
        }

        $orderx = Order::where('id', $orderId)->get();
        $postal_id = '';
        foreach ($orderx as $value) {
            $postal_id = $value['postal_id'];
        }

        $data['info'] = $request->all();
        $email = $request->email;
        $data['total'] = Cart::total(0, 3);
        $data['cart'] = Cart::content();
        $data['postal_id'] = $postal_id;

        Mail::send('pages.order-successfully', $data, function($message) use ($email){
            $message->from('tuansneakerservice@gmail.com', 'TUAN SNEAKERS STORE');

            $message->to($email, $email);

            $message->cc('hoangthanhtuanit@gmail.com', 'Hoàng Thanh Tuấn');

            $message->subject('Xác nhận hóa đơn mua hàng TUAN SNEAKERS');
        });

        Cart::destroy();
        return redirect()->route('complete-order', [$postal_id]);
    }

    public function CompleteOrder($id)
    {
        $orderx = Order::where('postal_id', $id)->firstOrFail();
        if($id == null || $id != $orderx->postal_id){
            return back();
        }
        else {
            $products_info = Order_detail::where('order_id', $orderx->id)->get();
            return view('pages.complete-order', compact('orderx', 'products_info'));
        }
    }

    public function Contact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $rules = [
            'full_name' => 'required',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'email|required',
            'address' => 'required',
            'message' => 'required'
        ];
        $messages = [
            'full_name.required' => 'Họ tên không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.numeric' => 'Số điện thoại không đúng định dạng',
            'phone_number.min' => 'Số điện thoại không đúng định dạng',
            'email.email' => 'Không đúng định dạng email',
            'email.required' => 'Địa chỉ email không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'message.required' => 'Nội dung liên hệ không được để trống'
        ];
        $this->validate($request, $rules, $messages);

        $contact = new Contact();
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->address = $request->address;
        $contact->message = $request->message;
        $is_sended = $contact->save();
        if ($is_sended) {
            session()->flash('toastr', [
                'type' => 'success',
                'message' => 'Gửi thông tin liên hệ thành công'
            ]);
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Gửi thông tin liên hệ thất bại'
            ]);
        }
        return back();
    }

    public function WishList($id)
    {
        $product = Product::where('id', $id)->first();
        $product->liked = $product->liked + 1;
        $product->save();
        return back();
    }

    public function blog()
    {
        $blogs = Blog::where('status', 1)->paginate(10);
        $hotProducts = Product::where([['status', 1], ['quantity_sold', '>' ,50]])->inRandomOrder()->limit(5)->get();
        return view('pages.blog', compact('blogs','hotProducts'));
    }

    public function getSingleBlog($id)
    {
        $hotProducts = Product::where([['status', 1], ['quantity_sold', '>' ,50]])->inRandomOrder()->limit(5)->get();
        $blogs = Blog::where([['id', $id], ['status', 1]])->get();
        $blog = [];
        foreach ($blogs as $value){
            $blog = $value;
        }
        $relatedBlogs = Blog::where('status', 1)->get();
        $comments = Comment::where('blog_id', $id)->orderBy('created_at', 'desc')->limit(10)->get();
        return view('pages.single-blog', compact('blog','hotProducts', 'relatedBlogs', 'comments'));
    }

    public function postSingleBlog(Request $request, $id)
    {
        $comment = new Comment();
        if (Auth::check()) {
            $this->validate($request,
                [
                    'message' => 'required'
                ],
                [
                    'message.required' => 'Nội dung bình luận không được để trống'
                ]);
            $comment->customer_id = Auth::id();
            $comment->full_name = Auth::user()->full_name;
            $comment->email = Auth::user()->email;
            $comment->blog_id = $id;
            $comment->message = $request->message;
        } else {
            $this->validate($request,
                [
                    'full_name' => 'required',
                    'message' => 'required'
                ],
                [
                    'full_name.required' => 'Họ tên không được để trống',
                    'message.required' => 'Nội dung bình luận không được để trống'
                ]);
            $comment->full_name = $request->full_name;
            $comment->blog_id = $id;
            $comment->message = $request->message;
        }

        $isSended = $comment->save();
        if ($isSended) {
            session()->flash('toastr', [
                'type' => 'success',
                'message' => 'Đã bình luận'
            ]);
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Thao tác thất bại'
            ]);
        }

        return back();
    }

    public function ShoppingGuide()
    {
        return view('pages.shopping-guide');
    }

    public function Payments()
    {
        return view('pages.payment');
    }

    public function InformationSecurity()
    {
        return view('pages.information-security');
    }

    public function WarrantyPolicy()
    {
        return view('pages.warranty-policy');
    }

    public function ShippingPolicy()
    {
        return view('pages.shipping-policy');
    }

    public function ExchangePolicy()
    {
        return view('pages.exchange-policy');
    }

    public function MyAccount()
    {
        return view('pages.my-account');
    }

    public function CheckOrder(Request $request)
    {
        $postal_id = $request->postal_id;
        $user_id =  Auth::id();
        $orderx = Order::where([
            ['postal_id', $postal_id],
            ['customer_id', $user_id]
        ])->firstOrFail();
        if (empty($orderx)) {
            return back();
        } else {
            $products_info = Order_detail::where('order_id', $orderx->id)->get();
            return view('pages.my-order', compact('orderx', 'products_info'));
        }
    }

    public function postSearch(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->key . '%')
                            ->orwhere('price', $request->key)
                            ->get();
        return view('pages.search', compact('products'));
    }
}
