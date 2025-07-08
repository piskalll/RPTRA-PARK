<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ParkInfo;
use App\Models\Facility;
use App\Models\Gallery;

class PublicController extends Controller
{
    // Halaman Beranda
    public function home()
    {
        $articles = Article::where('status', 'published')->latest()->take(3)->get();
        $services = Service::latest()->take(6)->get();
        $galleries = Gallery::latest()->take(6)->get();
        $park_infos = ParkInfo::latest()->take(10)->get();
        $services = Service::latest()->take(10)->get();

        return view('visitor.home', compact('articles', 'services', 'galleries', 'park_infos', 'services'));
    }

    // Daftar Semua Artikel
    public function articles()
    {
        $articles = Article::where('status', 'published')->latest()->paginate(6);
        return view('visitor.articles', compact('articles'));
    }

    // Detail Artikel
    public function articleDetail($id)
    {
        $article = Article::where('id', $id)->where('status', 'published')->firstOrFail();
        return view('visitor.article-detail', compact('article'));
    }

    // Daftar Semua Layanan
    public function services()
    {
        $services = Service::latest()->paginate(6);
        return view('visitor.services.index', compact('services'));
    }

    // Detail Layanan
    public function serviceDetail($id)
    {
        $service = Service::findOrFail($id);
        return view('visitor.services.show', compact('service'));
    }

    public function parkInfo()
    {
        $infos = ParkInfo::latest()->paginate(6);
        return view('public.index', compact('infos'));
    }

    public function parkInfoShow(ParkInfo $parkInfo)
    {
        return view('public.show', compact('parkInfo'));
    }

    public function facilities()
    {
        $facilities = Facility::latest()->get();
        return view('visitor.facilities.index', compact('facilities'));
    }

    public function galleries()
    {
        $galleries = Gallery::latest()->paginate(6);
        return view('visitor.gallery', compact('galleries'));
    }
}
