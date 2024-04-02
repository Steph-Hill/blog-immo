<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Index',[
            'articles' => Article::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' 
       ]);
    
        $article = new Article();
        $article->title = $request->title;
        $article->author = $request->author;
        $article->content = $request->content;

        

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $image->storeAs('uploads/images', $fileName, 'public');
            $article->image = '/storage/' . $filePath;
        }
    
        $article->save();
        return redirect()->route('article-list');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return Inertia::render('Show',[
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
        return Inertia::render('Edit',[
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            
            
        ]);
        $image = $request->validate(['image' => 'image']);

        

        if ($request->hasFile('image')) {

        if ($article->image && Storage::exists($article->image)) {
            Storage::delete($article->image);
        }

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/images', $fileName, 'public');
        $article->image = '/storage/' . $filePath;
        $article->save();
    }

    $article->update($data);

        return redirect()->route('article-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
    }
}
