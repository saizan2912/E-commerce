<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use Illuminate\Http\Request;
use function GuzzleHttp\choose_handler;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('status','1')->get();
        return view('admin.product.index',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNotNull('category_id',)->get();
        return view ('admin.product.add',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"),$fileName);
            $data['image'] = $fileName;
        }
            $create = Product::create($data);
            return back()->withSuccess('Data saved successfully');
            return redirect()->route('product.create');
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Product $product)
    {
        $id = $request->id;
        $categories = Category::whereNotNull('category_id',)->get();
        $product = Product::findorfail($id);
        return view('admin.product.edit',compact('categories','product'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $id = $request->id;
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"),$fileName);
            $data['image'] = $fileName;
        }
        $create = Product::where('id',$id)->update($data);
        // $create->update($data);
        return redirect()->route('product.list');
   }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Product $product)
    {
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();
        return response()->json('success');
    }
    public function extraDetails(Request $request){
        $id = $request->id;
        $product = Product::where('id', $id)->with('ProductDetail')->first();
        // $product = Product::with('ProductDetail')->find($id); // Eager load ProductDetail

        return view('admin.product.extraDetails',compact('id','product'));
    }
    public function extraDetailsStore(Request $request){
        $id = $request->id;
        $data = array(
            'product_id' => $id,
            'title' => $request->title,
            'total_items' => $request->total_items,
            'description' => $request->description,
        );
        $details = ProductDetail::updateOrCreate(['product_id'=> $id],$data);
        return redirect()->route('product.list');
    }
}
