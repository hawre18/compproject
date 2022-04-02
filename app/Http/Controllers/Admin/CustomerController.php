<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use SweetAlert;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::with('image')->paginate(10);
        return view('v1.index.admin.customer.index',compact(['customers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.index.admin.customer.create');
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
            'name' => 'required|min:8',
            'body' => 'required|min:150',
            'title' => 'required|min:8',
            'start_date' => 'required|date',
            'customer_image' => 'required'
        ]);
        
        try{
            $customer=new Customer();
            $customer->name=$request->input('name');
            $customer->title=$request->input('title');
            $customer->start_date=new Carbon($request->input('start_date'));
            $customer->end_date=$request->input('end_date');
            $customer->body=$request->input('body');
            $customer->image_id=$request->input('customer_image');;
            $customer->status=$request->input('status');
            $customer->save();
            alert()->success('عملیات درج موفقیت آمیز بود', 'موفقیت آمیز')->autoclose(2000)->persistent('ok');
            return redirect('/admin/customers');
        }
        catch (\Exception $m){
            return $m;
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/customers');
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
        $customer=Customer::with('image')->findorfail($id);
        return view('v1.index.admin.customer.show',compact(['customer']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::with('image')->findorfail($id);
        return view('v1.index.admin.customer.edit',compact(['customer']));
        
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
            'customer_image' => 'required'
        ]);
        
        try{
            $customer=Customer::findorfail($id);
            $customer->title=$request->input('title');
            $customer->body=$request->input('body');
            $customer->image_id=$request->input('customer_image');;
            $customer->status=$request->input('status');
            $customer->save();
            alert()->success('عملیات ویرایش موفقیت آمیز بود')->autoclose(2000)->persistent('ok');
            return redirect('/admin/customers');
        }
        catch (\Exception $m){
            alert()->error('oops', 'خطا')->autoclose(2000)->persistent('ok');
            return redirect('/admin/customers');
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
        $row = Customer::where('id', $id)->first();
        $row->delete();
        return back();
    }
    public function imageUpload(Request $request)
    {
        $uploadedFile=$request->file('file');
        $filename=time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileas(
            'public/images/customers',$uploadedFile,$filename
        );
        $image=new Image();
        $image->original_name=$original_name;
        $image->path=$filename;
        $image->save();
        return response()->json([
            'customer_image'=>$image->id
        ]);
    }
}
