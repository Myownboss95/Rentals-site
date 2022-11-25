<?php
 
namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tag = Tag::latest()->with('category'); 
        // dd($tag);
        return inertia('admin.tags.index', [
            'tags' => $tag->paginate(),
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
        return inertia('admin.tags.create', ['categories'=> $categories]);
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
            'name'=>['required', 'string'],
            'slug'=>['required', 'string', 'unique:tags'],
            'category_id'=>['required', 'integer', 'exists:categories,id']
        ]);
        Tag::create($valid);
        session()->flash('success', 'Tags created successfully');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        $categories = Category::all();
        return inertia('admin.tags.edit', [
            'tags' => $tag,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $valid = $request->validate([
            'name'=>['required', 'string'],
            'category_id'=>['required', 'integer', 'exists:categories,id'],
            'slug'=>['required', 'string', Rule::unique('products')->ignore($tag)]
        ]);
        $tag->update($valid);
        session()->flash('success', 'Tag updated successfully');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->delete();
        session()->flash('success', 'Tag Deleted successfully');
        return redirect()->route('admin.tags.index');
    }
}
