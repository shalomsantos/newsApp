<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\NewsService;

class NewsPageController extends Controller
{
    public function __construct(
        protected NewsService $NewsService,
        public readonly News $news
    ){}

    public function index()
    {
        $news = $this->NewsService->RetornaTodosOsDados();
        return view('home', ['news' => $news]);
    }
}
