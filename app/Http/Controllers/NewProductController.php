<?php

namespace App\Http\Controllers;

use App\Models\NewProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\NewProductModule;
use App\Models\MainProduct;

class NewProductController extends Controller
{
   
    public function index()
    {
        $new_products = NewProduct::all();
        return view('backend.new_products.index', compact('new_products'));
    }

    public function create()
    {
        $main_products = MainProduct::all(); // Fetch all main products
        return view('backend.new_products.create', compact('main_products'));
    }

   
    public function store(Request $request)
{
    $request->validate([
        'main_product_id' => 'required|exists:main_products,id', // Ensure main_product_id is valid
        'name' => 'required|string|max:255',
        'short_description' => 'nullable|string',
        'description' => 'nullable|string',
        'thumb_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'brochure' => 'nullable|mimes:pdf|max:10000',
        'video_url' => 'nullable|string|max:255',
        'navmenu_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
    ]);

    $newProduct = new NewProduct();
    $newProduct->main_product_id = $request->main_product_id; // Assign main product ID here
    $newProduct->name = $request->name;
    $newProduct->slug = Str::slug($request->name);
    $newProduct->short_description = $request->short_description;
    $newProduct->description = $request->description;

    $newProduct->thumb_image = $this->uploadFile($request, 'thumb_image', 'new_product/thumbs');
    $newProduct->image = $this->uploadFile($request, 'image', 'new_product/images');
    $newProduct->logo = $this->uploadFile($request, 'logo', 'new_product/logos');
    $newProduct->brochure = $this->uploadFile($request, 'brochure', 'new_product/brochures');
    $newProduct->navmenu_image = $this->uploadFile($request, 'navmenu_image', 'new_product/navmenu_images');

    $newProduct->video_url = $this->formatYoutubeUrl($request->video_url);
    $newProduct->save();

    return redirect()->route('backend.new_products.index')->with('success', 'New Product created successfully.');
}


 
    private function formatYoutubeUrl($url)
    {
        if (preg_match('/youtu\.be\/([^\?]*)/', $url, $matches) || preg_match('/youtube\.com\/watch\?v=([^\&]*)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }
        return $url;
    }

    
    public function edit($id)
    {
        $new_product = NewProduct::findOrFail($id);
        $main_products = MainProduct::all(); // Fetch all main products
        return view('backend.new_products.edit', compact('new_product', 'main_products'));
    }
    
    public function update(Request $request, $id)
{
    $new_product = NewProduct::findOrFail($id);

    $request->validate([
        'main_product_id' => 'required|exists:main_products,id', // Validate main product ID
        'name' => 'required|string|max:255',
        'short_description' => 'nullable|string',
        'description' => 'nullable|string',
        'thumb_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'brochure' => 'nullable|file|mimes:pdf|max:10000',
        'navmenu_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $new_product->main_product_id = $request->main_product_id; // Save selected main product ID
    $new_product->name = $request->name;
    $new_product->slug = Str::slug($request->name);
    $new_product->short_description = $request->short_description;
    $new_product->description = $request->description;

    $new_product->thumb_image = $this->updateFile($request, 'thumb_image', 'new_product/thumbs', $new_product->thumb_image);
    $new_product->image = $this->updateFile($request, 'image', 'new_product/images', $new_product->image);
    $new_product->logo = $this->updateFile($request, 'logo', 'new_product/logos', $new_product->logo);
    $new_product->brochure = $this->updateFile($request, 'brochure', 'new_product/brochures', $new_product->brochure);
    $new_product->navmenu_image = $this->updateFile($request, 'navmenu_image', 'new_product/navmenu_images', $new_product->navmenu_image);

    $new_product->save();

    return redirect()->route('backend.new_products.index')->with('success', 'Product updated successfully.');
}


   
    public function destroy($id)
    {
        $new_product = NewProduct::findOrFail($id);

        $this->deleteFile('media/new_product/thumbs', $new_product->thumb_image);
        $this->deleteFile('media/new_product/images', $new_product->image);
        $this->deleteFile('media/new_product/logos', $new_product->logo);
        $this->deleteFile('media/new_product/brochures', $new_product->brochure);
        $this->deleteFile('media/new_product/navmenu_images', $new_product->navmenu_image);

        $new_product->delete();

        return redirect()->route('backend.new_products.index')->with('success', 'Product deleted successfully.');
    }

    
    private function uploadFile(Request $request, $fieldName, $folder)
    {
        if ($request->hasFile($fieldName)) {
            $this->ensureDirectoryExists(public_path('media/' . $folder));

            $file = $request->file($fieldName);
            $fileName = time() . '_' . $file->getClientOriginalName();

            try {
                $file->move(public_path('media/' . $folder), $fileName);
                return $fileName;
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload file: ' . $e->getMessage());
            }
        }
        return null;
    }

    private function updateFile(Request $request, $fieldName, $folder, $oldFileName)
    {
        if ($request->hasFile($fieldName)) {
            $this->deleteFile('media/' . $folder, $oldFileName);
            return $this->uploadFile($request, $fieldName, $folder);
        }
        return $oldFileName;
    }

   
    private function ensureDirectoryExists($path)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }

 
    private function deleteFile($folder, $fileName)
    {
        if ($fileName && File::exists(public_path($folder . '/' . $fileName))) {
            File::delete(public_path($folder . '/' . $fileName));
        }
    }

    public function show($slug)
    {
        $new_product = NewProduct::where('slug', $slug)->firstOrFail();
        $new_products = NewProduct::all();
        $modules = NewProductModule::where('new_product_id', $new_product->id)->get();

        return view('frontend.products.show', compact('new_product', 'new_products', 'modules'));
    }
}
