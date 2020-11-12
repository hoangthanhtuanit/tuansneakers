<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Product;
use App\Product_image;
use App\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function getCreate()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.products.create', compact('categories', 'suppliers'));
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required',
            'image' => 'image|max:10000',
            'imageProduct[]' => 'image|max:10000',
            'color' => 'required',
            'price' => 'required|numeric',
            'quantity_in_stock' => 'required|numeric',
            'discount' => 'numeric|min:0|max:100'
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'image.image' => 'Định dạng ảnh không cho phép',
            'image.max' => 'Dung lượng ảnh quá lớn',
            'imageProduct[].image' => 'Định dạng ảnh không cho phép',
            'imageProduct.max' => 'Kích thước file quá lớn',
            'color.required' => 'Màu không được để trống',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là số',
            'quantity_in_stock.required' => 'Số lượng không được để trống',
            'quantity_in_stock.numeric' => 'Số lượng phải là số',
            'discount.numeric' => 'Khuyến mãi phải là số',
            'discount.min' => 'Khuyến mãi phải lớn hơn 0%',
            'discount.max' => 'Khuyến mãi phải nhỏ hơn hoặc bằng 100%',
        ];
        $this->validate($request, $rules, $messages);

        $product = new Product();
        $productChild = Product::where('name', $request->name)->first();
        if (isset($productChild) && ($productChild->price == $request->price) && ($productChild->supplier_id == $request->supplier_id)) {
            Product::where('quantity_in_stock', $productChild->quantity_in_stock)->update(['quantity_in_stock'=> $productChild->quantity_in_stock + $request->quantity_in_stock, 'summary' => $request->summary, 'description' => $request->description, 'status' => $request->status]);
        } else {
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $file_name = '';
            if ($request->hasFile('image')) {
                $image = $request->image;
                $file_name = 'product-' . str_random(5) . '-' . $image->getClientOriginalName();
                $dir_uploads = public_path() . '/uploads/products';
                $image->move($dir_uploads, $file_name);
            }
            $product->image = $file_name;
            $product->color = $request->color;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->quantity_in_stock = $request->quantity_in_stock;
            $product->summary = $request->summary;
            $product->description = $request->description;
            $product->status = $request->status;
            $isInsert = $product->save();
            $product_id = $product->id;
            if ($request->hasFile('imageProduct')) {
                foreach ($request->file('imageProduct') as $image) {
                    $imageProduct = new Product_image();
                    if (isset($image)) {
                        $imageDetail = 'productImage-' . str_random(5) . '-' . $image->getClientOriginalName();
                        $imageProduct->image = $imageDetail;
                        $imageProduct->product_id = $product_id;
                        $image->move(public_path() . '/uploads/image-products', $imageDetail);
                        $imageProduct->save();
                    }
                }
            }
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
        }
        return redirect('admin/product/index');
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('admin.products.detail', compact('product'));
    }

    public function imageDetail($id)
    {
        $images = Product_image::where('product_id', $id)->get()->groupBy('product_id');
        return view('admin.products.image-detail', compact('images'));
    }

    public function getUpdate($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.products.update', compact('product', 'categories', 'suppliers'));
    }

    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'image' => 'image|max:10000',
            'imageProduct[]' => 'image|max:10000',
            'price' => 'required|numeric',
            'quantity_in_stock' => 'required|numeric',
            'discount' => 'numeric|min:0|max:100'
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'image.image' => 'Định dạng ảnh không cho phép',
            'image.max' => 'Kích thước file quá lớn',
            'imageProduct[].image' => 'Định dạng ảnh không cho phép',
            'imageProduct.max' => 'Dung lượng ảnh quá lớn',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là số',
            'quantity_in_stock.required' => 'Số lượng không được để trống',
            'quantity_in_stock.numeric' => 'Số lượng phải là số',
            'discount.numeric' => 'Khuyến mãi phải là số',
            'discount.min' => 'Khuyến mãi phải lớn hơn 0%',
            'discount.max' => 'Khuyến mãi phải nhỏ hơn hoặc bằng 100%',
        ];
        $this->validate($request, $rules, $messages);

        $product = Product::find($id);

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;

        $file_name = $product->image;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'banner-' . str_random(5) . '-' . $image->getClientOriginalName();
            $dir_uploads = public_path() . '/uploads/products';
            @unlink($dir_uploads . '/' . $product->image);
            $image->move($dir_uploads, $file_name);
        }

        $product->image = $file_name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->quantity_in_stock = $request->quantity_in_stock;
        $product->summary = $request->summary;
        $product->description = $request->description;
        $product->status = $request->status;
        $isUpdate = $product->save();

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
        return redirect('admin/product/index');
    }

    public function Active($action, $id)
    {
        $product = Product::find($id);
        if ($product) {
            switch ($action) {
                case 'disable':
                    $product->status = 0;
                    break;
                case 'active':
                    $product->status = 1;
                    break;
            }
            $isActive = $product->save();
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
        $product = Product::find($id);
        $dir_uploads = public_path() . '/uploads/products';
        @unlink($dir_uploads . '/' . $product->image);
        $images = Product_image::where('product_id', '=' ,$id)->get();

        foreach ($images as $image) {
            $dir_uploads = public_path() . '/uploads/image-products';
            @unlink($dir_uploads . '/' . $image->image);
            $image->delete();
        }
        $isDelete = $product->delete();

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
        return redirect('admin/product/index');
    }
}
