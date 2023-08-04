<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('upload_form');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filePath = 'images/' . uniqid() . '.' . $imageFile->getClientOriginalExtension();

            // Upload to S3
            Storage::disk('s3')->put($filePath, file_get_contents($imageFile));

            // Save the public URL or $filePath in your database
            $image = new Image();
            $image->path = $filePath;
            $image->save();

            return redirect()->back()->with('success', 'Image uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Failed to upload image.');
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);

        // Generate the S3 URL based on the path stored in the database
        $imageUrl = Storage::disk('s3')->temporaryUrl(
            $image->path, now()->addMinutes(15)
        );

        return view('show_image', compact('imageUrl'));
    }
}


