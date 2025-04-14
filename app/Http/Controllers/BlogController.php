<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search', '');
    
        $blogs = Blog::leftJoin('users', 'blogs.created_by', '=', 'users.id')
                    ->select('blogs.*', 'users.name as created_by')
                    ->where('title', 'like', '%' . $searchTerm . '%')
                    ->whereNull('deleted_at')
                     ->get();
    
        return response()->json($blogs);
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return response()->json($blog);
    }

    // Create a new blog
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:Published,Hidden',
        ]);
    
        $blog = Blog::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'created_by' => auth()->user()->id, 
        ]);
    
        return response()->json($blog, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:Published,Hidden',
        ]);
    
        $blog = Blog::find($id);
    
        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }
    
        $blog->title = $validated['title'];
        $blog->content = $validated['content'];
        $blog->status = $validated['status'];
        $blog->save();
    
        // Return the updated blog
        return response()->json($blog);
    }

    public function changeStatus(Request $request, $id)
    {
        $blog = Blog::with('user')->find($id);
    
        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }
    
        $blog->status = ($blog->status === 'Published') ? 'Hidden' : 'Published';
        $blog->save();
    
        $blog->created_by = $blog->user->name;

        return response()->json($blog);
    }
    
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(['message' => 'Blog archived successfully']);
    }
}
