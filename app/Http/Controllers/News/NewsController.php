<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News\News;

class NewsController extends Controller
{
    public function index()
    {

        $newsPosts = News::with(['authors', 'newstags'])->get();

        return view('pages.news', compact('newsPosts'));
    }

    public function show($id)
    {

        $news = News::with(['authors', 'newstags'])->findOrFail($id);

        return view('pages.news-detail', ['news' => $news]);
    }
}
