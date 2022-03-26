<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use SweetAlert;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::with('image')->paginate(10);
        return view('v1.index.admin.article.index',compact(['articles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.index.admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'body' => 'required|min:150',
            'title' => 'required|min:10',
            'article_image' => 'required'
        ]);
        
        try{
            $article=new Article();
            $article->title=$request->input('title');
            $article->body=$request->input('body');
            $article->image_id=$request->input('article_image');;
            $article->status=$request->input('status');
            $article->user_id=Auth::user()->id;
            $article->save();
            alert()->success('عملیات درج موفقیت آمیز بود', 'موفقیت آمیز')->autoclose(2000)->persistent('ok');
            return redirect('/admin/articles');
        }
        catch (\Exception $m){
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/articles');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::with('image')->findorfail($id);
        return view('v1.index.admin.article.show',compact(['article']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::with('image')->findorfail($id);
        return view('v1.index.admin.article.edit',compact(['article']));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'body' => 'required|min:150',
            'title' => 'required|min:10',
            'article_image' => 'required'
        ]);
        
        try{
            $article=Article::findorfail($id);
            $article->title=$request->input('title');
            $article->body=$request->input('body');
            $article->image_id=$request->input('article_image');;
            $article->status=$request->input('status');
            $article->user_id=Auth::user()->id;
            $article->save();
            alert()->success('عملیات ویرایش موفقیت آمیز بود')->autoclose(2000)->persistent('ok');
            return redirect('/admin/articles');
        }
        catch (\Exception $m){
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/articles');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Article::where('id', $id)->first();
        $row->delete();
        return back();
    }
    public function imageUpload(Request $request)
    {
        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/images/article',$uploadedFile,$filename
        );
        $image=new Image();
        $image->original_name=$original_name;
        $image->path=$filename;
        $image->save();
        return response()->json([
            'article_image'=>$image->id
        ]);
    }
}
