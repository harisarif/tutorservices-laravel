<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::latest()->take(3)->get();
        return view('blog', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blogs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required', // Optional, must be an image and max size 2MB
            'image' => 'nullable|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public'); // Store image in 'public/blogs'
        } else {
            $imagePath = null; // No image uploaded
        }
        // Create the new blog
        Blog::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('all.blogs')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blogs = Blog::all();
        return view('blog-list', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $blogs = Blog::find($id);
        return view('edit-blog', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{    
    // Find the blog post
    $blog = Blog::findOrFail($id);

    // Validate the input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'image' => 'nullable|mimes:jpeg,jpg,png|max:2048',
    ]);

  if ($request->hasFile('image')) {
    // Delete the old image if it exists
    if ($blog->image && Storage::disk('public')->exists($blog->image)) {
        Storage::disk('public')->delete($blog->image);
    }

    // Store the new image in 'public/blogs'
    $imagePath = $request->file('image')->store('blogs', 'public');
    $blog->image = $imagePath; // Save full path like 'blogs/imagename.jpg'
}


    $blog->title = $request->input('title');
    $blog->description = $request->input('description');

    $blog->save();

    return redirect()->route('all.blogs')->with('success', 'Blog updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

            if ($blog) {
                $blog->delete();
                return redirect()->route('all.blogs')->with('success', 'Blog deleted successfully!');
            }

            return redirect()->route('all.blogs')->with('error', 'Blog not found.');
    }
    public function destroyBulk(Request $request)
    {
                $request->validate([
                    'ids' => 'required|array',
                    'ids.*' => 'exists:blogs,id', // Assuming 'tutors' is your table name
                ]);

                // Delete the selected tutors
                Blog::destroy($request->ids);

                return response()->json(['success' => 'Blogs deleted successfully.']);
    }
}
