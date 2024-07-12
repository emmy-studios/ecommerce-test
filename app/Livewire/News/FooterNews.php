<?php

namespace App\Livewire\News;

use App\Models\News\News;
use Livewire\Component;



class FooterNews extends Component
{
    public function render()
    {
        $threeNews = News::latest()->take(2)->get();

        return view('livewire.news.footer-news', compact('threeNews'));
    }
}
