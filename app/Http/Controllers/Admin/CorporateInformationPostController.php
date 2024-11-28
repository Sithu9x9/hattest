<?php

namespace App\Http\Controllers\Admin;

use App\Models\CorporateInformation;
use App\Models\CorporateInformation_posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CorporateInformationPostController extends Controller
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
    public function index($id)
    {
        $corporate = CorporateInformation::findOrFail($id);
        $corporate_posts = DB::table('corporate_information_posts')->where('corporate_information_id', $id)->get();

        return view('admin.corporate_information_post.index', compact('corporate_posts', 'corporate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cor_id = $id;
        return view('admin.corporate_information_post.create', compact('cor_id'));
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
        $act_posts = new CorporateInformation_posts();
        $act_posts->corporate_information_id = $request->corporate_information_id;
        $act_posts->title = $request->title;
        $act_posts->des = $request->des;
        $act_posts->created_by = $user->name;
        $act_posts->updated_by = $user->name;

        $act_posts->save();

        return redirect()->route('admin.corporate-post.index',$request->corporate_information_id);
    }

    public function upload(Request $request)
    {
        if ($request->file('images')) {
            $data = DB::table('corporate_information_posts')->latest('id')->first();
            if ($data == null) {
                $last_id = 1;
            } else {
                $id = CorporateInformation_posts::latest()->first()->id;
                $last_id = $id + 1;
            }

            $image       = $request->file('images');
            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $last_id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 200,function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/uploads/corporate_informations/' .$filename . '.jpg'));
            $path = '/uploads/corporate_informations/' . $filename . '.jpg';

            DB::table('corporate_information_posts_images')->insert([
                'corporate_information_posts_id' => $last_id,
                'image_url' => $path,
                'image_name' => $filename . '.jpg',
            ]);

            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        }
    }

    public function edit($cor_id, $cor_post_id)
    {
        $cor_post = CorporateInformation_posts::findOrFail($cor_post_id);
        $cor_post_images = DB::table('corporate_information_posts_images')->where('corporate_information_posts_id','=',$cor_post_id)->get();
        // dd($act_post_images);
        return view('admin.corporate_information_post.edit', compact('cor_post', 'cor_id','cor_post_images'));
    }

    public function imageDestroy($id)
    {
        $cor_post_images = DB::table('corporate_information_posts_images')->where('id',$id)->first();
        if ($cor_post_images->image_name) {
            $path = public_path() . '/uploads/corporate_informations/' . $cor_post_images->image_name;

            if (file_exists($path)) {
                unlink($path);
            }
        }

        DB::table('corporate_information_posts_images')->where('id',$id)->delete();
        $nonedata = DB::table('corporate_information_posts_images')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('corporate_information_posts_images')->truncate();
        }else {
            $last_id = DB::table('corporate_information_posts_images')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `corporate_information_posts_images` AUTO_INCREMENT = $last_id");
        }

        return redirect()->back();
    }

    public function allimageDestroy($id)
    {
        $cor_post_images = DB::table('corporate_information_posts_images')->where('corporate_information_posts_id',$id)->get();
        foreach($cor_post_images as $image)
        {
            if ($image->image_name) {
                $path = public_path() . '/uploads/corporate_informations/' . $image->image_name;

                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        DB::table('corporate_information_posts_images')->where('corporate_information_posts_id',$id)->delete();

        $nonedata = DB::table('corporate_information_posts_images')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('corporate_information_posts_images')->truncate();
        }else {
            $last_id = DB::table('corporate_information_posts_images')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `corporate_information_posts_images` AUTO_INCREMENT = $last_id");
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
        $act_posts = CorporateInformation_posts::find($id);
        $act_posts->corporate_information_id = $request->corporate_information_id;
        $act_posts->title = $request->title;
        $act_posts->des = $request->des;
        $act_posts->updated_by = $user->name;

        $act_posts->update();

        return redirect()->route('admin.corporate-post.index',$request->corporate_information_id);
    }

    public function updateupload(Request $request,$id)
    {
        if ($request->file('images')) {
            $image       = $request->file('images');

            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 200,function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/uploads/corporate_informations/' .$filename . '.jpg'));
            $path = '/uploads/corporate_informations/' . $filename . '.jpg';

            DB::table('corporate_information_posts_images')->insert([
                'corporate_information_posts_id' => $id,
                'image_url' => $path,
                'image_name' => $filename . '.jpg',
            ]);

            return response()->json(['success' => true]);
        }else{
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
        $cor_post_images = DB::table('corporate_information_posts_images')->where('corporate_information_posts_id',$id)->get();
        foreach($cor_post_images as $image)
        {
            if ($image->image_name) {
                $path = public_path() . '/uploads/corporate_informations/' . $image->image_name;

                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        DB::table('corporate_information_posts_images')->where('corporate_information_posts_id',$id)->delete();
        DB::table('corporate_information_posts')->where('id', $id)->delete();
        $nonedata = DB::table('corporate_information_posts')->count() == 0 ? true : false;
        $nonedata1 = DB::table('corporate_information_posts_images')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('corporate_information_posts')->truncate();
        }else {
            $last_id = CorporateInformation_posts::latest()->first()->id + 1;
            DB::statement("ALTER TABLE `corporate_information_posts` AUTO_INCREMENT = $last_id");
        }

        if($nonedata1){
            DB::table('corporate_information_posts_images')->truncate();
        }else{
            $last_id1 = DB::table('corporate_information_posts_images')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `corporate_information_posts_images` AUTO_INCREMENT = $last_id1");
        }

        return redirect()->back();
    }
}
