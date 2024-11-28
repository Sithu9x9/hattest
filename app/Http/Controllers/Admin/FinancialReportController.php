<?php

namespace App\Http\Controllers\Admin;

use App\Models\FinancialReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;


class FinancialReportController extends Controller
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
        $financials = FinancialReport::all();
        return view('admin.financial.index',compact('financials'));
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
            'title.required'=>'Financial Report Title is required.',

        ]);

        $financial = new FinancialReport();
        if ($validator->passes()) {
            if ($request->hasFile('file')) {
                $root_path = public_path() . '/uploads/financial_reports/';
                // $_SERVER['SERVER_ADDR']
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $fileName = $request->title .'-'. $request->des . '.' . $extension;
                $file->move($root_path, $fileName);
                $financial->file = '/uploads/financial_reports/'. $fileName;
            }else{
                $validator->errors()->add('file', "You haven't selected any file. Please select the file.");
                return Response::json(['errors' => $validator->errors()]);
            }

            $user = Auth::user();
            $financial->title = $request->title;
            $financial->des = $request->des;
            $financial->created_by = $user->name;
            $financial->updated_by = $user->name;

            $financial->save();

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
            'title.required'=>'Financial Report Title is required.',
        ]);

        $financial = FinancialReport::find($request->financial_id);
        if ($validator->passes()) {
            if ($request->hasFile('file')) {
                $path = public_path() . $financial->file;

                if (file_exists($path)) {
                    unlink($path);
                }
                $root_path = public_path() . '/uploads/financial_reports/';
                // $_SERVER['SERVER_ADDR']
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $fileName = $request->title .'-'. $request->des . '.' . $extension;
                $file->move($root_path, $fileName);
                $financial->file = '/uploads/financial_reports/' . $fileName;
            }

            $user = Auth::user();

            $financial->title = $request->title;
            $financial->des = $request->des;
            $financial->updated_by = $user->name;

            $financial->save();

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
        $financial = DB::table('financial_reports')->where('id',$id)->first();
        if ($financial->file) {
            $path = public_path() . $financial->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        DB::table('financial_reports')->where('id',$id)->delete();
        $nonedata = DB::table('financial_reports')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('financial_reports')->truncate();
        }else {
            $last_id = DB::table('financial_reports')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `financial_reports` AUTO_INCREMENT = $last_id");
        }

        return redirect()->back();
    }
}
