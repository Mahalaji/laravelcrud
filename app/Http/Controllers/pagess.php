<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\pages;

use Illuminate\Http\Request;

class pagess extends Controller
{
    public function getPagesAjax(Request $request)
    {
        try {
            $query = pages::select('id', 'name', 'title', 'Description', 'created_at', 'updated_at', 'Date');
    
            if ($request->has('start_date') && $request->has('end_date')) {
                $startDate = $request->start_date;
                $endDate = $request->end_date;
    
                if ($startDate && $endDate) {
                    $query->whereBetween('Date', [$startDate, $endDate]);
                }
            }
    
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="/editpages/' . $row->id . '" class="btn btn-sm btn-primary"style="color:black"><i class="fas fa-edit"></i></a>';
                })
                ->addColumn('delete', function ($row) {
                    return '<form action="/destorypages/' . $row->id . '" method="POST" onsubmit="return confirm(\'Are you sure?\');">
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
    public function editpages($id){
        $pages = pages::find($id); 
    
        if (!$pages) {
            return redirect()->back()->with('error', 'User not found');
        }
 
        if (!is_object($pages)) {
            return redirect()->back()->with('error', 'Invalid user data');
        }
    
        return view('pagesedit', compact('pages'));
    }
    public function updatepages(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'Date' => 'required|date',
            'Description' => 'required',
        ]);
    
        $pagesedit = pages::find($request->id);
    
        if (!$pagesedit) {
            return redirect()->back()->withErrors(['error' => 'News not found']);
        }
    
        $pagesedit->title = $request->title;
        $pagesedit->name = $request->name;
        $pagesedit->created_at = $request->created_at;
        $pagesedit->updated_at = now();
        $pagesedit->Date = $request->Date;
        $pagesedit->Description = $request->Description;

        $pagesedit->save();
    
        return redirect('/indexpages')->with('success', 'Pages updated successfully');
    }
    function createpages(Request $request) {
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'Date' => 'required|date',
            'Description' => 'required',
        ]);
    
        $pagesadd = new pages();
        $pagesadd->title = $request->title;
        $pagesadd->name = $request->name;
        $pagesadd->updated_at = now();
        $pagesadd->created_at = now();
        $pagesadd->Date = $request->Date;
        $pagesadd->Description = $request->Description;
    
        $pagesadd->save();
    
        if ($pagesadd) {
            return redirect('/indexpages')->with('success', 'Pages added successfully!');
        } else {
            return back()->with('error', 'Failed to add the pages.');
        }
    }
    public function destorypages($id){
        $pages = pages::find($id); 
    
        if (!$pages) {
            return redirect()->back()->withErrors(['error' => 'pages not found']);
        }
    
        $pages->delete();
    
        return redirect('/indexpages')->with('success', 'Pages deleted successfully');
    }
}
