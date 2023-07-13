<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET['cate'])){
            $cate = $_GET['cate'];
            
            if($cate == '1'){
                $books = Product::where('category_id', '1')->get();
            }elseif($cate == '2'){
                $books = Product::where('category_id', '2')->get();
            }elseif($cate == '3'){
                $books = Product::where('category_id', '3')->get();
            }elseif($cate == '4'){
                $books = Product::where('category_id', '4')->get();
            }elseif($cate== '5'){
                $books = Product::where('category_id', '5')->get();
            }elseif($cate == '6'){
                $books = Product::where('category_id', '6')->get();
            }elseif($cate == '7'){
                $books = Product::where('category_id', '7')->get();
            }elseif($cate == '8'){
                $books = Product::all();
            }
        }else{
            $books = Product::all();
        }
        return view('admin.product.view', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cates = Category::all();
        return view('admin.product.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $books = $request->all();
        $books['slug'] = \Str::slug($request->title);

        if($request->hasFile('photo'))
        {
            $file = $request -> file('photo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
        }else
        {
            $imgName = null;
        }

        if($request->hasFile('photo1'))
        {
            $file = $request -> file('photo1');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName1 = $file->getClientOriginalName();
            $file->move('images', $imgName1);
        }else
        {
            $imgName1 = null;
        }

        if($request->hasFile('photo2'))
        {
            $file = $request -> file('photo2');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName2 = $file->getClientOriginalName();
            $file->move('images', $imgName2);
        }else
        {
            $imgName2 = null;
        }

        $books['image'] = $imgName;
        $books['image1'] = $imgName1;
        $books['image2'] = $imgName2;

        $request->validate([
            'title' => 'required|between: 3, 60',
            'price' => 'required|integer|digits_between: 3, 10|between: 5000, 1000000',
            'description' => 'required|between: 50, 1000',
            'category_id' =>'required'        
        ], 
        [
            'title.required' => 'Title is required.',
            'title.between' => 'Title must be between 3 and 60 characters.',
            'price.required' => 'Price is required.',
            'price.integer' => 'Price must be a number.',
            'price.digits_between' => 'Price must be betwwen 3 and 10 digits.',
            'price.between' => 'Price must be between 5.000 vnđ and 1.000.000 vnđ.',
            'description.required' => 'description is required.',
            'description.between' => 'description must be between 50 and 100 characters.',
            'category_id.required' => 'category_id is required.',
        ]);


        Product::create($books);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $cates = Category::all();
        return view('admin.product.edit', compact('cates', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $books = $request->all();
        $books['slug'] = \Str::slug($request->title);

        if($request->hasFile('photo'))
        {
            $file = $request -> file('photo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
        }else
        {
            $imgName = null;
        }

        if($request->hasFile('photo1'))
        {
            $file = $request -> file('photo1');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName1 = $file->getClientOriginalName();
            $file->move('images', $imgName1);
        }else
        {
            $imgName1 = null;
        }

        if($request->hasFile('photo2'))
        {
            $file = $request -> file('photo2');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName2 = $file->getClientOriginalName();
            $file->move('images', $imgName2);
        }else
        {
            $imgName2 = null;
        }

        $books['image'] = $imgName;
        $books['image1'] = $imgName1;
        $books['image2'] = $imgName2;

        $request->validate([
            'title' => 'required|between: 3, 60',
            'price' => 'required|integer|digits_between: 3, 10|between: 5000, 1000000',
            'description' => 'required|between: 50, 1000',
            'category_id' =>'required'        
        ], 
        [
            'title.required' => 'Title is required.',
            'title.between' => 'Title must be between 3 and 60 characters.',
            'price.required' => 'Price is required.',
            'price.integer' => 'Price must be a number.',
            'price.digits_between' => 'Price must be betwwen 3 and 10 digits.',
            'price.between' => 'Price must be between 5.000 vnđ and 1.000.000 vnđ.',
            'description.required' => 'description is required.',
            'description.between' => 'description must be between 50 and 100 characters.',
            'category_id.required' => 'category_id is required.',
        ]);
        $product->update($books);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
