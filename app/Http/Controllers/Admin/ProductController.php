<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::latest();
        return inertia('admin.products.index', [
            'products' => $products->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return inertia('admin.products.create', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $valid = $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'unique:products'],
            'details' => ['required', 'string'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'rent_status' => ['required','numeric'],
            'max_rent_duration' => ['required','integer'],
            'rent_price' => ['required','numeric'],
            'sales_price' => ['nullable','numeric'],
            'discount_price' => ['required','numeric'],
            'quantity' => ['integer','numeric'],
            'image' => ['required','mimes:png,jpg,jpeg'],
            'featured' => ['required','integer'],
            'images' => ['nullable'],
            'description' => ['nullable','string'],
        ]);

        // dd($request->file('images'));
        
        DB::beginTransaction();
        try {
            // $test = array_merge($valid, [
            //     'image' => $this->uploadFile($request, 'image'),
            //     'images' => $this->uploadFile($request, 'images')
            // ]);
            // dd($test);
            Product::create(array_merge($valid, [
                'image' => $this->uploadFile($request->file('image')),
                'images' => $this->uploadFile($request->file('images'))
                
            ]));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.products.index')->withSuccess('Settings Saved successfully');
    

    }

    private function uploadFile(UploadedFile|array $key) : string|array
    {
        if(!is_array($key)) return $this->handleUpload($key);
        return collect($key)->map(function(UploadedFile $file){
            return $this->uploadFile($file);
        })->all();

    }

    private function handleUpload(UploadedFile $file){

        $filename = time().$file->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'products',
          $file,
          $filename
        );
        return $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return inertia('admin.products.edit', ['product' => $product, 
                                               'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        // dd($request);
        $data = $request->validate([
            'name' => ['required'],
            'slug' => ['required', Rule::unique('products')->ignore($product)],
            'details' => ['required', 'string'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'rent_status' => ['required','numeric'],
            'max_rent_duration' => ['required','integer'],
            'rent_price' => ['required','numeric'],
            'sales_price' => ['nullable','numeric'],
            'discount_price' => ['required','numeric'],
            'quantity' => ['integer','numeric'],
            'image' => ['nullable'],
            'featured' => ['required','integer'],
            'images' => ['nullable'],
            'description' => ['nullable','string'],
         ]);
         
        // dd($request->file('image'));
        if($request->file('image')!=null){
            $file = $this->uploadFile($request->file('image'));
            is_null($file) ?: $data['image'] = $file;
        }
        

        if($request->file('images')!=null){
            $images = $this->uploadFile($request->file('images'));
            is_null($images) ?: $data['images'] = $images;
        }
        

        DB::beginTransaction();
        try {
            $product->update($data);
            DB::commit();
        } catch (\Throwable $th) { 
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.products.index')->withSuccess('Asset updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return back()->withSuccess('Product deleted');
       
    }
}
