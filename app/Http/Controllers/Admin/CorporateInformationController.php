<?php

namespace App\Http\Controllers\Admin;

use App\Models\CorporateInformation;
use App\Models\CorporateInformation_posts_images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CorporateInformationController extends Controller
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
        $corporates = CorporateInformation::all();
        return view('admin.corporate_information.index',compact('corporates'));
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
            'title' => 'required|unique:corporate_information',
        ],[
            'title.required'=>'Corporate Information Title is required.',
            'title.unique'=>'Corporate Information is already exist!.',

        ]);

        $data1 = DB::table('corporate_information')->latest('id')->first();
        if ($data1 == null) {
            $last_id = 1;
        } else {
            $id = CorporateInformation::latest()->first()->id;
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
            $cor = new CorporateInformation();
            $cor->title = $request->title;
            $cor->image = $path;
            $cor->created_by = $user->name;
            $cor->updated_by = $user->name;

            $cor->save();
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
        ],[
            'title.required'=>'Coporate Information Title is required.',
        ]);

        if ($request->hasfile('image')) {
            $image       = $request->file('image');

            $oldpath = public_path() . $request->oldphoto;

            if (file_exists($oldpath)) {
                unlink($oldpath);
            }

            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $request->corporate_information_id . $file;

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
            $corporate = CorporateInformation::find($request->corporate_information_id);
            $corporate->title = $request->title;
            $corporate->image = $path;
            $corporate->updated_by = $user->name;
            $corporate->update();
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
        $cor = CorporateInformation::find($id);
        $cor_path = public_path() . $cor->image;

        if (file_exists($cor_path)) {
            unlink($cor_path);
        }

        $cor_posts = DB::table('corporate_information_posts')->where('corporate_information_id','=',$id)->get();

        foreach($cor_posts as $cor_post)
        {
            $cor_post_images = DB::table('corporate_information_posts_images')->where('corporate_information_posts_id',$cor_post->id)->get();
            foreach($cor_post_images as $image)
            {
                if ($image->image_name) {
                    $path = public_path() . '/uploads/corporate_informations/' . $image->image_name;

                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
            DB::table('corporate_information_posts_images')->where('corporate_information_posts_id',$cor_post->id)->delete();
            DB::table('corporate_information_posts')->where('corporate_information_id',$id)->delete();

            $existimage = DB::table('corporate_information_posts_images')->count() == 0 ? true : false;
            $existpost = DB::table('corporate_information_posts')->count() == 0 ? true : false;

            if ($existimage) {
                DB::table('corporate_information_posts_images')->truncate();
            }else {
                $last_id = CorporateInformation_posts_images::latest()->first()->id + 1;
                DB::statement("ALTER TABLE `corporate_information_posts_images` AUTO_INCREMENT = $last_id");
            }

            if($existpost){
                DB::table('corporate_information_posts')->truncate();
            }else{
                $last_id1 = DB::table('corporate_information_posts')->latest('id')->first()->id + 1;
                DB::statement("ALTER TABLE `corporate_information_posts` AUTO_INCREMENT = $last_id1");
            }
        }

        DB::table('corporate_information')->where('id', $id)->delete();
        $nonedata = DB::table('corporate_information')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('corporate_information')->truncate();
        } else {
            $last_id = CorporateInformation::latest()->first()->id + 1;
            DB::statement("ALTER TABLE `corporate_information` AUTO_INCREMENT = $last_id");
        }

        return redirect()->route('admin.corporate.index');
    }
}
