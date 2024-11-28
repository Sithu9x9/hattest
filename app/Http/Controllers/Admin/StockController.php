<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Stock_posts_images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class StockController extends Controller
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
        $stks = Stock::all();
        return view('admin.stock.index', compact('stks'));
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
            'title' => 'required|unique:stocks',
        ], [
            'title.required' => 'Stock Title is required.',
            'title.unique' => 'Stock Title is already exist!.',

        ]);

        $data1 = DB::table('stocks')->latest('id')->first();
        if ($data1 == null) {
            $last_id = 1;
        } else {
            $id = Stock::latest()->first()->id;
            $last_id = $id + 1;
        }

        if ($request->hasfile('image')) {
            $image       = $request->file('image');
            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $last_id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/images/' . $filename . '.jpg'));
            $path = '/images/' . $filename . '.jpg';
        } else {
            $path = "/images/mti-logo.png";
        }

        if ($validator->passes()) {
            $user = Auth::user();
            $stk = new Stock();
            $stk->title = $request->title;
            $stk->image = $path;
            $stk->created_by = $user->name;
            $stk->updated_by = $user->name;

            $stk->save();
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
            'title.required' => 'Stock Title is required.',
        ]);

        if ($request->hasfile('image')) {
            $image       = $request->file('image');

            $oldpath = public_path() . $request->oldphoto;

            if (file_exists($oldpath)) {
                unlink($oldpath);
            }

            $filenamewithextension    = $image->getClientOriginalName();
            $file = time();
            $filename = $request->stock_id . $file;

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/images/' . $filename . '.jpg'));
            $path = '/images/' . $filename . '.jpg';
        } else {
            $path = $request->oldphoto;
        }

        if ($validator->passes()) {
            $user = Auth::user();
            $stock = Stock::find($request->stock_id);
            $stock->title = $request->title;
            $stock->image = $path;
            $stock->updated_by = $user->name;
            $stock->update();
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
        $stk = Stock::find($id);
        $stk_path = public_path() . $stk->image;

        if (file_exists($stk_path)) {
            unlink($stk_path);
        }

        $stock_posts = DB::table('stock_posts')->where('stock_id', '=', $id)->get();

        foreach ($stock_posts as $stock_post) {
            $stock_post_images = DB::table('stock_posts_images')->where('stock_posts_id', $stock_post->id)->get();
            foreach ($stock_post_images as $image) {
                if ($image->image_name) {
                    $path = public_path() . '/uploads/stocks/' . $image->image_name;

                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
            DB::table('stock_posts_images')->where('stock_posts_id', $stock_post->id)->delete();
            DB::table('stock_posts')->where('stock_id', $id)->delete();

            $existimage = DB::table('stock_posts_images')->count() == 0 ? true : false;
            $existpost = DB::table('stock_posts')->count() == 0 ? true : false;

            if ($existimage) {
                DB::table('stock_posts_images')->truncate();
            } else {
                $last_id = Stock_posts_images::latest()->first()->id + 1;
                DB::statement("ALTER TABLE `stock_posts_images` AUTO_INCREMENT = $last_id");
            }

            if ($existpost) {
                DB::table('stock_posts')->truncate();
            } else {
                $last_id1 = DB::table('stock_posts')->latest('id')->first()->id + 1;
                DB::statement("ALTER TABLE `stock_posts` AUTO_INCREMENT = $last_id1");
            }
        }

        DB::table('stocks')->where('id', $id)->delete();
        $nonedata = DB::table('stocks')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('stocks')->truncate();
        } else {
            $last_id = Stock::latest()->first()->id + 1;
            DB::statement("ALTER TABLE `stocks` AUTO_INCREMENT = $last_id");
        }

        return redirect()->route('admin.stock.index');
    }
}
