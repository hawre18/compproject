<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use SweetAlert;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::with('image')->paginate(10);
        return view('v1.index.admin.news.index',compact(['news']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.index.admin.news.create');
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
            'news_image' => 'required'
        ]);
        
        try{
            $article=new News();
            $article->title=$request->input('title');
            $article->body=$request->input('body');
            $article->image_id=$request->input('news_image');;
            $article->status=$request->input('status');
            $article->user_id=1;
            $article->save();
            alert()->success('عملیات درج موفقیت آمیز بود', 'موفقیت آمیز')->autoclose(2000)->persistent('ok');
            return redirect('/admin/news');
        }
        catch (\Exception $m){
            return $m;
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/news');
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
        $news=News::with('image')->findorfail($id);
        return view('v1.index.admin.news.show',compact(['news']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news=News::with('image')->findorfail($id);
        return view('v1.index.admin.news.edit',compact(['news']));
        
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
            'news_image' => 'required'
        ]);
        
        try{
            $news=News::findorfail($id);
            $news->title=$request->input('title');
            $news->body=$request->input('body');
            $news->image_id=$request->input('news_image');;
            $news->status=$request->input('status');
            $news->user_id=1;
            $news->save();
            alert()->success('عملیات ویرایش موفقیت آمیز بود')->autoclose(2000)->persistent('ok');
            return redirect('/admin/news');
        }
        catch (\Exception $m){
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/news');
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
        $row = News::where('id', $id)->first();
        $row->delete();
        return back();
    }
    public function imageUpload(Request $request)
    {
        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/images/news',$uploadedFile,$filename
        );
        $image=new Image();
        $image->original_name=$original_name;
        $image->path=$filename;
        $image->save();
        return response()->json([
            'news_image'=>$image->id
        ]);
    }
}
