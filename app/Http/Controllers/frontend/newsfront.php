<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\newscategory;
class newsfront extends Controller
{
    public function shownews()
    {
        $newsview = news::with('categories')->get();
        $categories = newscategory::get();
        return view('frontend.news', compact('newsview', 'categories'));
    }
    public function newsbyslug($slug){
        $news= news::with('categories')->whereLike('slug', $slug)->first();
        $related_news = news::where('news_title_category', $news->categories->id)->get();
        
        return view('Frontend.particularnews',['news' => $news,'related_news'=>$related_news]);
    }
    public function newsbytitle($newscat)
    {
        $category = newscategory::with('news')->where('seo_title', $newscat)->first();
    
        if (!$category) {
            abort(404, 'Category not found');
        }
    
        $related_title_news = $category->news;
    
        return view('Frontend.newscategory', [
            'related_title_news' => $related_title_news,
        ]);
    }
}
