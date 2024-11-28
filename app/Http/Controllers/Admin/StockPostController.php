<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Stock_posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class StockPostController extends Controller
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
        $stk = Stock::findOrFail($id);
        $stk_posts = DB::table('stock_posts')->where('stock_id', $id)->get();

        return view('admin.stock_posts.index', compact('stk_posts', 'stk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $stk_id = $id;
        return view('admin.stock_posts.create', compact('stk_id'));
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
        $stk_posts = new Stock_posts();
        $stk_posts->stock_id = $request->stock_id;
        $stk_posts->title = $request->title;
        $stk_posts->des = $request->des;
        $stk_posts->created_by = $user->name;
        $stk_posts->updated_by = $user->name;

        $stk_posts->save();

        return redirect()->route('admin.stock-post.index',$request->stock_id);
    }

    public function upload(Request $request)
    {
        if ($request->file('images')) {
            $data = DB::table('stock_posts')->latest('id')->first();
            if ($data == null) {
                $last_id = 1;
            } else {
                $id = Stock_posts::latest()->first()->id;
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
            $image_resize->save(public_path('/uploads/stocks/' .$filename . '.jpg'));
            $path = '/uploads/stocks/' . $filename . '.jpg';

            DB::table('stock_posts_images')->insert([
                'stock_posts_id' => $last_id,
                'image_url' => $path,
                'image_name' => $filename .'.jpg',
            ]);

            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($stk_id, $stk_post_id)
    {
        $stk_post = Stock_posts::findOrFail($stk_post_id);
        $stk_post_images = DB::table('stock_posts_images')->where('stock_posts_id','=',$stk_post_id)->get();
        return view('admin.stock_posts.edit', compact('stk_post', 'stk_id','stk_post_images'));
    }

    public function imageDestroy($id)
    {
        $stk_post_images = DB::table('stock_posts_images')->where('id',$id)->first();
        if ($stk_post_images->image_name) {
            $path = public_path() . '/uploads/stocks/' . $stk_post_images->image_name;

            if (file_exists($path)) {
                unlink($path);
            }
        }

        DB::table('stock_posts_images')->where('id',$id)->delete();
        $nonedata = DB::table('stock_posts_images')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('stock_posts_images')->truncate();
        }else {
            $last_id = DB::table('stock_posts_images')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `stock_posts_images` AUTO_INCREMENT = $last_id");
        }

        return redirect()->back();
    }

    public function allimageDestroy($id)
    {
        $stk_post_images = DB::table('stock_posts_images')->where('stock_posts_id',$id)->get();
        foreach($stk_post_images as $image)
        {
            if ($image->image_name) {
                $path = public_path() . '/uploads/stocks/' . $image->image_name;

                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        DB::table('stock_posts_images')->where('stock_posts_id',$id)->delete();

        $nonedata = DB::table('stock_posts_images')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('stock_posts_images')->truncate();
        }else {
            $last_id = DB::table('stock_posts_images')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `stock_posts_images` AUTO_INCREMENT = $last_id");
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
        $stk_posts = Stock_posts::find($id);
        $stk_posts->stock_id = $request->stock_id;
        $stk_posts->title = $request->title;
        $stk_posts->des = $request->des;
        $stk_posts->updated_by = $user->name;

        $stk_posts->update();

        return redirect()->route('admin.stock-post.index',$request->stock_id);
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
            $image_resize->save(public_path('/uploads/stocks/' .$filename . '.jpg'));
            $path = '/uploads/stocks/' . $filename . '.jpg';

            DB::table('stock_posts_images')->insert([
                'stock_posts_id' => $id,
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
        $stk_post_images = DB::table('stock_posts_images')->where('stock_posts_id',$id)->get();
        foreach($stk_post_images as $image)
        {
            if ($image->image_name) {
                $path = public_path() . '/uploads/stocks/' . $image->image_name;

                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        DB::table('stock_posts_images')->where('stock_posts_id',$id)->delete();
        DB::table('stock_posts')->where('id', $id)->delete();
        $nonedata = DB::table('stock_posts')->count() == 0 ? true : false;
        $nonedata1 = DB::table('stock_posts_images')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('stock_posts')->truncate();
        }else {
            $last_id = Stock_posts::latest()->first()->id + 1;
            DB::statement("ALTER TABLE `stock_posts` AUTO_INCREMENT = $last_id");
        }

        if($nonedata1){
            DB::table('stock_posts_images')->truncate();
        }else{
            $last_id1 = DB::table('stock_posts_images')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `stock_posts_images` AUTO_INCREMENT = $last_id1");
        }

        return redirect()->back();
    }
}
