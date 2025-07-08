<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'content'   => 'required',
            'status'    => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'status']);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Article::create($data);
        if (auth()->user()->role === 'staff') {
            return redirect()->route('staff.articles.index')->with('success', 'Artikel berhasil diperbarui.');
        } else {
            return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
        }
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'     => 'required',
            'content'   => 'required',
            'status'    => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'status']);

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $article->update($data);
        if (auth()->user()->role === 'staff') {
            return redirect()->route('staff.articles.index')->with('success', 'Artikel berhasil diperbarui.');
        } else {
            return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
        }
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();

        if (auth()->user()->role === 'staff') {
            return redirect()->route('staff.articles.index')->with('success', 'Artikel berhasil diperbarui.');
        } else {
            return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
        }
    }
}
