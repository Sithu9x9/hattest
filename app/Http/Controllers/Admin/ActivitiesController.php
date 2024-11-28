<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activities;
use App\Models\Activities_posts_images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ActivitiesController extends Controller
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
        $acts = Activities::all();
        return view('admin.activities.index', compact('acts'));
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
            'title' => 'required|unique:activities',
        ], [
            'title.required' => 'Activities Title is required.',
            'title.unique' => 'Activities Title is already exist!.',

        ]);

        $data1 = DB::table('activities')->latest('id')->first();
        if ($data1 == null) {
            $last_id = 1;
        } else {
            $id = Activities::latest()->first()->id;
            $last_id = $id + 1;
        }

        if ($request->hasfile('image')) {
            $image       = $request->file('image');
            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $last_id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 200,function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/images/' .$filename . '.jpg'));
            $path = '/images/' . $filename . '.jpg';
        } else {
            $path = "/images/mti-logo.png";
        }

        if ($validator->passes()) {
            $user = Auth::user();
            $act = new Activities();
            $act->title = $request->title;
            $act->image = $path;
            $act->created_by = $user->name;
            $act->updated_by = $user->name;

            $act->save();
            return Response::json(['success' => 'success']);
        }
        return Response::json(['errors' => $validator->errors()]);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ], [
            'title.required' => 'Activities Title is required.',
        ]);

        if ($request->hasfile('image')) {
            $image       = $request->file('image');

            $oldpath = public_path() . $request->oldphoto;

            if (file_exists($oldpath)) {
                unlink($oldpath);
            }

            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $request->activities_id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 200,function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/images/' .$filename . '.jpg'));
            $path = '/images/' . $filename . '.jpg';
        } else {
            $path = $request->oldphoto;
        }

        if ($validator->passes()) {
            $user = Auth::user();
            $act = Activities::find($request->activities_id);
            $act->title = $request->title;
            $act->image = $path;
            $act->updated_by = $user->name;
            $act->update();
            return Response::json(['success' => 'success']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $act = Activities::find($id);
        $act_path = public_path() . $act->image;

        if (file_exists($act_path)) {
            unlink($act_path);
        }

        $act_posts = DB::table('activities_posts')->where('activities_id', '=', $id)->get();

        foreach ($act_posts as $act_post) {
            $act_post_images = DB::table('activities_posts_images')->where('activities_posts_id', $act_post->id)->get();
            foreach ($act_post_images as $image) {
                if ($image->image_url) {
                    $path = public_path() . $image->image_url;

                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
            DB::table('activities_posts_images')->where('activities_posts_id', $act_post->id)->delete();
            DB::table('activities_posts')->where('activities_id', $id)->delete();

            $existimage = DB::table('activities_posts_images')->count() == 0 ? true : false;
            $existpost = DB::table('activities_posts')->count() == 0 ? true : false;

            if ($existimage) {
                DB::table('activities_posts_images')->truncate();
            } else {
                $last_id = Activities_posts_images::latest()->first()->id + 1;
                DB::statement("ALTER TABLE `activities_posts_images` AUTO_INCREMENT = $last_id");
            }

            if ($existpost) {
                DB::table('activities_posts')->truncate();
            } else {
                $last_id1 = DB::table('activities_posts')->latest('id')->first()->id + 1;
                DB::statement("ALTER TABLE `activities_posts` AUTO_INCREMENT = $last_id1");
            }
        }

        DB::table('activities')->where('id', $id)->delete();
        $nonedata = DB::table('activities')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('activities')->truncate();
        } else {
            $last_id = Activities::latest()->first()->id + 1;
            DB::statement("ALTER TABLE `activities` AUTO_INCREMENT = $last_id");
        }

        return redirect()->route('admin.act.index');
    }
}
