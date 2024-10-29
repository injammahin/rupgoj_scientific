<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class AboutContentController extends Controller
{
    
    public function index()
    {
        $aboutContent = AboutContent::first() ?? new AboutContent();
        return view('backend.about', compact('aboutContent'));
    }

   
    public function updateAbout(Request $request)
    {
        $request->validate([
            'about_text' => 'nullable|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $aboutContent = AboutContent::firstOrNew();
        $this->ensureDirectoryExists(public_path('uploads/about'));

        $aboutContent->about_text = $request->about_text;
        $aboutContent->about_image = $this->handleFileUpload($request, 'about_image', 'uploads/about', $aboutContent->about_image);

        $aboutContent->save();

        return redirect()->route('backend.about.index')->with('success', 'About section updated successfully.');
    }

    public function updateVision(Request $request)
    {
        $request->validate([
            'vision_text' => 'nullable|string',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $aboutContent = AboutContent::firstOrNew();
        $this->ensureDirectoryExists(public_path('uploads/about'));

        $aboutContent->vision_text = $request->vision_text;
        $aboutContent->vision_image = $this->handleFileUpload($request, 'vision_image', 'uploads/about', $aboutContent->vision_image);

        $aboutContent->save();

        return redirect()->route('backend.about.index')->with('success', 'Vision updated successfully.');
    }

    
    public function updateMission(Request $request)
    {
        $request->validate([
            'mission_text' => 'nullable|string',
            'mission_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $aboutContent = AboutContent::firstOrNew();
        $this->ensureDirectoryExists(public_path('uploads/about'));

        $aboutContent->mission_text = $request->mission_text;
        $aboutContent->mission_image = $this->handleFileUpload($request, 'mission_image', 'uploads/about', $aboutContent->mission_image);

        $aboutContent->save();

        return redirect()->route('backend.about.index')->with('success', 'Mission updated successfully.');
    }

    
    private function handleFileUpload(Request $request, $fieldName, $uploadPath, $oldFile = null)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . Str::limit($originalFileName, 50) . '.' . $extension;
    
        
            if ($oldFile && File::exists(public_path($uploadPath . '/' . $oldFile))) {
                File::delete(public_path($uploadPath . '/' . $oldFile));
            }
    
            
            try {
                $file->move(public_path($uploadPath), $fileName);
                return $fileName;
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload file: ' . $e->getMessage());
            }
        }
    
        return $oldFile;
    }
    

   
    private function ensureDirectoryExists($path)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true, true);
        }
    }
}
