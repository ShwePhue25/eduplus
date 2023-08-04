<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\MediaInfo\MediaInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllVideos()
    {
        $videos = Video::with('categories');
        // Update the video URLs to use the S3 URLs
        foreach ($videos as $video) {
            $video->url = Storage::disk('s3')->url($video->url);
        }

        $categories = Category::all();

        return view('admin.videos.index', compact('videos', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.videos.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimetypes:video/mp4',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $filePath = 'videos/' . uniqid() . '.' . $videoFile->getClientOriginalExtension();

            // Upload to S3
            Storage::disk('s3')->put($filePath, file_get_contents($videoFile));

            // Get video duration using a package like "spatie\media-info"
            // $videoInfo = MediaInfo::get($videoFile);
            // $durationInSeconds = $videoInfo->get('duration') ?? 0;

            // Create a new video record in the database
            $video = new Video();
            $video->title = $request->input('title');
            $video->url = $filePath;
            $video->duration = $request->input('duration');
            $video->save();

            // Sync the video with selected categories
            $video->categories()->attach($request->input('category_id'));

            return redirect()->back()->with('success', 'Video uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Failed to upload video.');
    }
}
