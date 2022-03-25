<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies=Technology::with('image')->paginate(10);
        return view('v1.index.admin.technology.index',compact(['technologies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.index.admin.technology.create');
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
            'technology_image' => 'required'
        ]);
        
        try{
            $technology=new Technology();
            $technology->title=$request->input('title');
            $technology->body=$request->input('body');
            $technology->image_id=$request->input('technology_image');;
            $technology->status=$request->input('status');
            $technology->user_id=1;
            $technology->save();
            alert()->success('عملیات درج موفقیت آمیز بود', 'موفقیت آمیز')->autoclose(2000)->persistent('ok');
            return redirect('/admin/technologies');
        }
        catch (\Exception $m){
            return $m;
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/technologies');
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
        $technology=Technology::with('image')->findorfail($id);
        return view('v1.index.admin.technology.show',compact(['technology']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technology=Technology::with('image')->findorfail($id);
        return view('v1.index.admin.technology.edit',compact(['technology']));
        
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
            'technology_image' => 'required'
        ]);
        
        try{
            $technology=Technology::findorfail($id);
            $technology->title=$request->input('title');
            $technology->body=$request->input('body');
            $technology->image_id=$request->input('technology_image');;
            $technology->status=$request->input('status');
            $technology->user_id=1;
            $technology->save();
            alert()->success('عملیات ویرایش موفقیت آمیز بود')->autoclose(2000)->persistent('ok');
            return redirect('/admin/technologies');
        }
        catch (\Exception $m){
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/technologies');
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
        $row = Technology::where('id', $id)->first();
        $row->delete();
        return back();
    }
    public function imageUpload(Request $request)
    {
        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/images/technologies',$uploadedFile,$filename
        );
        $image=new Image();
        $image->original_name=$original_name;
        $image->path=$filename;
        $image->save();
        return response()->json([
            'technology_image'=>$image->id
        ]);
    }
}
