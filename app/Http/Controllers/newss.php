<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;
use App\Models\news;
use App\Models\newscategory;


class newss extends Controller
{
    public function seo_title()
    {
        $titles = newscategory::select('seo_title','id')->get();
        return view('newsadd', compact('titles'));
    }
    function createnews(Request $request) {
        $request->validate([
            'Title' => 'required',
            'Author_Name' => 'required',
            'news_title_category' => 'required',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Date' => 'required|date',
            'Description' => 'required',
        ]);
    
        $newsadd = new news();
        $newsadd->Title = $request->Title;
        $newsadd->Email = $request->Email;
        $newsadd->Number = $request->Number;
        $newsadd->Author_Name = $request->Author_Name;
        $newsadd->news_title_category = $request->news_title_category;
        $newsadd->Date = $request->Date;
        $newsadd->Description = $request->Description;
        $newsadd->Create_Date = now();
        $newsadd->Update_Date = now();
        $newsadd->recycle =1;


    
        if ($request->hasFile('Image')) {
            $Image = $request->file('Image');
            $imageName = time() . '_' . $Image->getClientOriginalName();
            $imagePath = 'news_images/' . $imageName;
            $Image->move(public_path('news_images'), $imageName);
            $newsadd->Image = $imagePath;
        }
    
        $slug = Str::slug($request->Title);
        $existingSlugCount = news::where('slug', $slug)->count();
        if ($existingSlugCount > 0) {
            $slug = $slug . '-' . time();
        }
        $newsadd->slug = $slug;
    
        $newsadd->save();
    
        if ($newsadd) {
            return redirect('/indexnews')->with('success', 'News added successfully!');
        } else {
            return back()->with('error', 'Failed to add the news.');
        }
    }
    public function getNewsAjax(Request $request)
    {
        try {
            $query = news::select('id', 'Author_Name', 'Title', 'news_title_category', 'Description', 'Create_Date', 'Update_Date', 'Date')->with('categories');
    
            if ($request->has('start_date') && $request->has('end_date')) {
                $startDate = $request->start_date;
                $endDate = $request->end_date;
    
                if ($startDate && $endDate) {
                    $query->whereBetween('Date', [$startDate, $endDate]);
                }
            }
    
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="/editnews/' . $row->id . '" class="btn btn-sm btn-primary"style="color:black"><i class="fas fa-edit"></i></a>';
                })
                ->addColumn('delete', function ($row) {
                    return '<form action="/destorynews/' . $row->id . '" method="POST" onsubmit="return confirm(\'Are you sure?\');">
                                ' . csrf_field() . '
                                <button type="submit" class="btn btn-sm btn-danger" style="border: none; outline: none;"><i class="fas fa-trash"></i></button>
                            </form>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function editnews($id){
        $news = news::find($id); 
    
        if (!$news) {
            return redirect()->back()->with('error', 'User not found');
        }
 
        if (!is_object($news)) {
            return redirect()->back()->with('error', 'Invalid user data');
        }
    
        $titles = newscategory::select('seo_title','id')->get();

        return view('newsedit', compact('news', 'titles'));
    }
    public function updatenews(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Author_Name' => 'required',
            'news_title_category' => 'required',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Date' => 'required|date',
            'Description' => 'required',
        ]);
    
        $newsedit = news::find($request->id);
    
        if (!$newsedit) {
            return redirect()->back()->withErrors(['error' => 'News not found']);
        }
    
        $newsedit->Title = $request->Title;
        $newsedit->Email = $request->Email;
        $newsedit->Number = $request->Number;
        $newsedit->Author_Name = $request->Author_Name;
        $newsedit->news_title_category = $request->news_title_category;
        $newsedit->Date = $request->Date;
        $newsedit->Description = $request->Description;
        $newsedit->Update_Date = now();
        $newsedit->recycle =1;
    
        if ($request->hasFile('Image')) {
            $Image = $request->file('Image');
            $imageName = time() . '_' . $Image->getClientOriginalName();
            $imagePath = 'news_images/' . $imageName;
            $Image->move(public_path('news_images'), $imageName);
            $newsedit->Image = $imagePath;
        }
    
        if ($newsedit->Title !== $request->Title) {
            $slug = Str::slug($request->Title);
            $existingSlugCount = news::where('slug', $slug)->where('id', '!=', $request->id)->count();
    
            if ($existingSlugCount > 0) {
                $slug = $slug . '-' . time();
            }
    
            $newsedit->slug = $slug;
        }
    
        $newsedit->save();
    
        return redirect('/indexnews')->with('success', 'News updated successfully');
    }
    public function destorynews($id){
        $news = news::find($id); 
    
        if (!$news) {
            return redirect()->back()->withErrors(['error' => 'News not found']);
        }
    
        $news->delete();
    
        return redirect('/indexnews')->with('success', 'News deleted successfully');
    }
    public function getNewsCategoryAjax(Request $request){
        try {
            $query = newscategory::select('id', 'seo_title', 'meta_keyword', 'seo_robat', 'meta_description');
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="/editnewscategory/' . $row->id . '" class="btn btn-sm btn-primary"style="color:black"><i class="fas fa-edit"></i></a>';
                })
                ->addColumn('delete', function ($row) {
                    return '<form action="/destorynewscategory/' . $row->id . '" method="POST" onsubmit="return confirm(\'Are you sure?\');">
                                ' . csrf_field() . '
                                <button type="submit" class="btn btn-sm btn-danger"style="border: none; outline: none;"><i class="fas fa-trash"></i></button>
                            </form>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function createnewscategory(Request $request){
        $request->validate([
            'seo_title' => 'required',
            'meta_keyword' => 'required',
            'seo_robat' => 'required',
            'meta_description' => 'required',
        ]);
    
        $categeryadd = new newscategory();
        $categeryadd->seo_title = $request->seo_title;
        $categeryadd->meta_keyword = $request->meta_keyword;
        $categeryadd->seo_robat = $request->seo_robat;
        $categeryadd->meta_description = $request->meta_description;
    
        $categeryadd->save();
    
        if ($categeryadd) {
            return redirect('/indexnewscategory')->with('success', 'Category added successfully!');
        } else {
            return back()->with('error', 'Failed to add the blog.');
        }
    }
    public function editnewscategory($id){
        $newscategory = newscategory::find($id); 
    
        if (!$newscategory) {
            return redirect()->back()->with('error', 'User not found');
        }
    
        if (!is_object($newscategory)) {
            return redirect()->back()->with('error', 'Invalid user data');
        }
    
        return view('newscategoryedit', compact('newscategory'));
    }
    public function updatenewscategery(Request $request)
{
    $request->validate([
        'seo_title' => 'required',
        'meta_keyword' => 'required',
        'seo_robat' => 'required',
        'meta_description' => 'required',
    ]);

    $categoryupdate = newscategory::find($request->id);

    if (!$categoryupdate) {
        return redirect()->back()->withErrors(['error' => 'news category not found']);
    }

    $categoryupdate->seo_title = $request->seo_title;
    $categoryupdate->meta_keyword = $request->meta_keyword;
    $categoryupdate->seo_robat = $request->seo_robat;
    $categoryupdate->meta_description = $request->meta_description;

    $categoryupdate->save();

    return redirect('/indexnewscategory')->with('success', 'News category updated successfully');
}
public function destorynewscategory($id){
    $newscategory = newscategory::find($id); 

    if (!$newscategory) {
        return redirect()->back()->withErrors(['error' => 'User not found']);
    }

    $newscategory->delete();

    return redirect('/indexnewscategory')->with('success', 'User deleted successfully');
}
}
