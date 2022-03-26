<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use SweetAlert;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides=Slide::with('image')->paginate(10);
        return view('v1.index.admin.slide.index',compact(['slides']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.index.admin.slide.create');
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
            'title' => 'required|min:10',
            'slide_image' => 'required'
        ]);
        
        try{
            $slide=new Slide();
            $slide->title=$request->input('title');
            $slide->link=$request->input('link');
            $slide->image_id=$request->input('slide_image');;
            $slide->status=$request->input('status');
            $slide->save();
            alert()->success('عملیات درج موفقیت آمیز بود', 'موفقیت آمیز')->autoclose(2000)->persistent('ok');
            return redirect('/admin/slides');
        }
        catch (\Exception $m){
            return $m;
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/slides');
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
        $slide=Slide::with('image')->findorfail($id);
        return view('v1.index.admin.slide.show',compact(['slide']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide=Slide::with('image')->findorfail($id);
        return view('v1.index.admin.slide.edit',compact(['slide']));
        
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
            'title' => 'required|min:10',
            'slide_image' => 'required'
        ]);
        
        try{
            $slide=Slide::findorfail($id);
            $slide->title=$request->input('title');
            $slide->link=$request->input('link');
            $slide->image_id=$request->input('slide_image');;
            $slide->status=$request->input('status');
            $slide->save();
            alert()->success('عملیات ویرایش موفقیت آمیز بود')->autoclose(2000)->persistent('ok');
            return redirect('/admin/slides');
        }
        catch (\Exception $m){
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/slides');
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
        $row = Slide::where('id', $id)->first();
        $row->delete();
        return back();
    }
    public function imageUpload(Request $request)
    {
        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/images/slides',$uploadedFile,$filename
        );
        $image=new Image();
        $image->original_name=$original_name;
        $image->path=$filename;
        $image->save();
        return response()->json([
            'slide_image'=>$image->id
        ]);
    }
}
