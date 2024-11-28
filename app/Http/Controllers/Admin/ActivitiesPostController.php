<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activities;
use App\Models\Activities_posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ActivitiesPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $act = Activities::findOrFail($id);
        $act_posts = DB::table('activities_posts')->where('activities_id', $id)->get();

        return view('admin.activities_post.index', compact('act_posts', 'act'));
    }

    public function create($id)
    {
        $act_id = $id;
        return view('admin.activities_post.create', compact('act_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $act_posts = new Activities_posts();
        $act_posts->activities_id = $request->activities_id;
        $act_posts->title = $request->title;
        $act_posts->des = $request->des;
        $act_posts->created_by = $user->name;
        $act_posts->updated_by = $user->name;

        $act_posts->save();

        return redirect()->route('admin.act-post.index', $request->activities_id);
    }

    public function upload(Request $request)
    {
        if ($request->file('images')) {
            $data = DB::table('activities_posts')->latest('id')->first();
            if ($data == null) {
                $last_id = 1;
            } else {
                $id = Activities_posts::latest()->first()->id;
                $last_id = $id + 1;
            }

            $image       = $request->file('images');
            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $last_id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/uploads/activities/' . $filename . '.jpg'));
            $path = '/uploads/activities/' . $filename . '.jpg';

            DB::table('activities_posts_images')->insert([
                'activities_posts_id' => $last_id,
                'image_url' => $path,
                'image_name' => $filename . '.jpg',
            ]);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function edit($act_id, $act_post_id)
    {
        $act_post = Activities_posts::findOrFail($act_post_id);
        $act_post_images = DB::table('activities_posts_images')->where('activities_posts_id', '=', $act_post_id)->get();
        // dd($act_post_images);
        return view('admin.activities_post.edit', compact('act_post', 'act_id', 'act_post_images'));
    }

    public function imageDestroy($id)
    {
        $act_post_images = DB::table('activities_posts_images')->where('id', $id)->first();
        if ($act_post_images->image_name) {
            $path = public_path() . '/uploads/activities/' . $act_post_images->image_name;

            if (file_exists($path)) {
                unlink($path);
            }
        }

        DB::table('activities_posts_images')->where('id', $id)->delete();
        $nonedata = DB::table('activities_posts_images')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('activities_posts_images')->truncate();
        } else {
            $last_id = DB::table('activities_posts_images')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `activities_posts_images` AUTO_INCREMENT = $last_id");
        }

        return redirect()->back();
    }

    public function allimageDestroy($id)
    {
        $act_post_images = DB::table('activities_posts_images')->where('activities_posts_id', $id)->get();
        foreach ($act_post_images as $image) {
            if ($image->image_name) {
                $path = public_path() . '/uploads/activities/' . $image->image_name;

                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        DB::table('activities_posts_images')->where('activities_posts_id', $id)->delete();

        $nonedata = DB::table('activities_posts_images')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('activities_posts_images')->truncate();
        } else {
            $last_id = DB::table('activities_posts_images')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `activities_posts_images` AUTO_INCREMENT = $last_id");
        }

        return redirect()->back();
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
        // dd($request->all());
        $user = Auth::user();
        $act_posts = Activities_posts::find($id);
        $act_posts->activities_id = $request->activities_id;
        $act_posts->title = $request->title;
        $act_posts->des = $request->des;
        $act_posts->updated_by = $user->name;

        $act_posts->update();

        return redirect()->route('admin.act-post.index', $request->activities_id);
    }

    public function updateupload(Request $request, $id)
    {
        if ($request->file('images')) {
            $image       = $request->file('images');

            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/uploads/activities/' . $filename . '.jpg'));
            $path = '/uploads/activities/' . $filename . '.jpg';

            DB::table('activities_posts_images')->insert([
                'activities_posts_id' => $id,
                'image_url' => $path,
                'image_name' => $filename . '.jpg',
            ]);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
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
        $act_post_images = DB::table('activities_posts_images')->where('activities_posts_id', $id)->get();
        foreach ($act_post_images as $image) {
            if ($image->image_name) {
                $path = public_path() . '/uploads/activities/' . $image->image_name;

                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        DB::table('activities_posts_images')->where('activities_posts_id', $id)->delete();
        DB::table('activities_posts')->where('id', $id)->delete();
        $nonedata = DB::table('activities_posts')->count() == 0 ? true : false;
        $nonedata1 = DB::table('activities_posts_images')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('activities_posts')->truncate();
        } else {
            $last_id = Activities_posts::latest()->first()->id + 1;
            DB::statement("ALTER TABLE `activities_posts` AUTO_INCREMENT = $last_id");
        }

        if ($nonedata1) {
            DB::table('activities_posts_images')->truncate();
        } else {
            $last_id1 = DB::table('activities_posts_images')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `activities_posts_images` AUTO_INCREMENT = $last_id1");
        }

        return redirect()->back();
    }
}
