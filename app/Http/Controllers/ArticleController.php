<?php

namespace App\Http\Controllers;

use App\Models\Article;
use DB;
use Illuminate\Http\Request;
use PDOException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allArticles = Article::with('doctor.user');
        if ($request->filled('search')) {
            $allArticles->where(function ($query) use ($request) {
                $query->where('article_name', 'like', '%' . $request->search . '%');
            });
        }

        $allArticles = $allArticles->get();
        return view('articles.index', compact('allArticles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Article::class);
        $data = new Article();
        $data->article_name = $request->article_name;
        $data->content = $request->get('content');
        $data->doctor_id = $request->doctor_id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')
                ->store('img/articles', 'public');

            $data->image = $path;
        }

        $data->save();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Successfully Created Data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
        $this->authorize('update', $article);
        $article->article_name = $request->article_name;
        $article->content = $request->get('content');
        $article->doctor_id = $request->doctor_id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')
                ->store('img/articles', 'public');

            $article->image = $path;
        }

        $article->save();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Successfully Updated Data.');
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        try {
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'Successfully Deleted A Article');
        } catch (PDOException $ex) {
            $msg = "Make Sure There Is No Related Data Before Deleting It. Please Contact Administrator To Know More About It.";
            return redirect()->route('articles.index')->with('status', $msg);
        }
    }

    public function showDetail()
    {
        $article = Article::with('doctor.user')->find($_POST['id']);

        return response()->json([
            'status' => 'ok',
            'title' => $article->article_name,
            'body' => view('articles.detail', compact('article'))->render()
        ]);
    }
}
