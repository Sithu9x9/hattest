<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnnualReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class AnnualReportController extends Controller
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
        $annuals = AnnualReport::all();
        return view('admin.annual.index',compact('annuals'));
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
            'title' => 'required',
        ],[
            'title.required'=>'Annual Report Title is required.',
        ]);

        $annual = new AnnualReport();
        if ($validator->passes()) {
            if ($request->hasFile('file')) {
                $root_path = public_path() . '/uploads/annual_reports/';
                // $_SERVER['SERVER_ADDR']
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $fileName = $request->title .'-'. $request->des . '.' . $extension;
                $file->move($root_path, $fileName);
                $annual->file = '/uploads/annual_reports/' . $fileName;
            }else{
                $validator->errors()->add('file', "You haven't selected any file. Please select the file.");
                return Response::json(['errors' => $validator->errors()]);
            }

            $user = Auth::user();
            $annual->title = $request->title;
            $annual->des = $request->des;
            $annual->created_by = $user->name;
            $annual->updated_by = $user->name;

            $annual->save();

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
            'title.required'=>'Annual Report Title is required.',
        ]);

        $annual = AnnualReport::find($request->annual_id);
        if ($validator->passes()) {
            if ($request->hasFile('file')) {
                if (file_exists(public_path() . $request->old_file)) {
                    unlink(public_path() . $request->old_file);
                }
                $root_path = public_path() . '/uploads/annual_reports/';
                // $_SERVER['SERVER_ADDR']
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $fileName = $request->title .'-'. $request->des . '.' . $extension;
                $file->move($root_path, $fileName);
                $annual->file = '/uploads/annual_reports/' . $fileName;
            }else{
                $annual->file = $request->old_file;
            }

            $user = Auth::user();

            $annual->title = $request->title;
            $annual->des = $request->des;
            $annual->updated_by = $user->name;

            $annual->save();

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
        $annual = DB::table('annual_reports')->where('id',$id)->first();
        if ($annual->file) {
            $path = public_path() . $annual->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        DB::table('annual_reports')->where('id',$id)->delete();
        $nonedata = DB::table('annual_reports')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('annual_reports')->truncate();
        }else {
            $last_id = DB::table('annual_reports')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `annual_reports` AUTO_INCREMENT = $last_id");
        }

        return redirect()->back();
    }
}
