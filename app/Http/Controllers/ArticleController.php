<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {

        $data['articles']=Article::all();
        $data['categories']=Category::all();
        return view('articles.index')->with($data);
    }

public function create()
{

   $data['categories']=Category::all();
return view('articles.add')->with($data);
}

public function store(Request $request)
{
           Article::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>Auth::id(),
            'cat_id'=>$request->cat_id

        ]);
           return redirect()->route('articles');

}

public function comment($id)
{

     $data['article']= Article::findOrFail($id);

     $data['comments']=Comment::where('article_id',$id)->get();

     return view('articles.comment')->with($data);
}

public function store_comment(Request $request,$id)
{

Comment::create([
    'description'=>$request->comment,
    'user_id'=>Auth::id(),
    'article_id'=>$id

]);

return back();
}


public function filter_category(Request $request)
{
// dd($request->all());
       $data['articles']=Article::where('cat_id',$request->cat_id)->get();
    //    $data['articles']=Article::all();

       $data['categories']=Category::all();
        return view('articles.index')->with($data);


}
}
