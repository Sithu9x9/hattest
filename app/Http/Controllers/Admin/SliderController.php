<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alt' => 'required|min:2',
        ], [
            'alt.required' => 'Overlay Text is required!',
            'alt.min' => 'Overlay Text must be 3 character at least!',
        ]);

        $data1 = DB::table('sliders')->latest('id')->first();
        if ($data1 == null) {
            $last_id = 1;
        } else {
            $id = Slider::latest()->first()->id;
            $last_id = $id + 1;
        }

        if ($request->hasfile('image')) {
            $image       = $request->file('image');
            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $last_id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(1200, 537,function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/uploads/slider/' .$filename . '.jpg'));
            $path = '/uploads/slider/' . $filename . '.jpg';
        } else {
            return Response::json(['errors' => 'image missing']);
        }

        if ($validator->passes()) {
            $slider = new Slider();
            $slider->alt = $request->alt;
            $slider->image = $path;

            $slider->save();
            return Response::json(['success' => 'success']);
        }else{
            return Response::json(['errors' => $validator->errors()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all());
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            $oldpath = public_path() . $request->oldphoto;

            if (file_exists($oldpath)) {
                unlink($oldpath);
            }

            $filenamewithextension = $image->getClientOriginalName();
            $file = time();
            $filename = $request->sliders_id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(1200, 537,function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/uploads/slider/' .$filename . '.jpg'));
            $path = '/uploads/slider/' . $filename . '.jpg';
        } else {
            $path = $request->oldphoto;
        }

        $slider = Slider::find($request->sliders_id);
        $slider->alt = $request->edit_alt;
        $slider->image = $path;
        if ($slider->update()) {
            return Response::json(['success' => 'success']);
        } else {
            return Response::json(['errors' => $validator->errors()]);
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
        $slider = Slider::find($id);
        $slider_path = public_path() . $slider->image;

        if (file_exists($slider_path)) {
            unlink($slider_path);
        }

        DB::table('sliders')->where('id', $id)->delete();
        $nonedata = DB::table('sliders')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('sliders')->truncate();
        } else {
            $last_id = Slider::latest()->first()->id + 1;
            DB::statement("ALTER TABLE `sliders` AUTO_INCREMENT = $last_id");
        }

        return redirect()->route('admin.slider.index');
    }
}
