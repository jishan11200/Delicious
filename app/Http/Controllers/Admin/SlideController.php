<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Slider;
use Carbon\Carbon;
// use App\Http\Controllers\admin\Str;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sliders = Slider::all();
       return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'images' => 'required|mimes:png,jpg,jpeg'
       ]);
            $images = $request->file('images');
            $slug = Str::slug($request->title);
       if(isset($images))
       {
        $currentData = Carbon::now()->toDateString();
        $imagesname = $slug.'-'.$currentData.'.'.$images->getClientOriginalExtension();
        if(!file_exists('uploads/slider'))
        {
            mkdir('uploads/slider',077,true);
        }
        $images->move('uploads/slider',$imagesname);
       }
       else{
        $imagesname = 'default.png';
       }
       $slider = new Slider();
       $slider->title = $request->title;
       $slider->sub_title = $request->sub_title;
       $slider->images = $imagesname;
       $slider->save();
       return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
