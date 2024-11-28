<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Models\MeetingMinute;
use Illuminate\Support\Facades\DB;

class MeetingMinuteController extends Controller
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
        $meetings = MeetingMinute::all();
        return view('admin.meetingminute.index',compact('meetings'));
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
            'title.required'=>'Meeting Minute Title is required.',

        ]);

        $meeting = new MeetingMinute();
        if ($validator->passes()) {
            if ($request->hasFile('file')) {
                $root_path = public_path() . '/uploads/meeting_minutes/';
                // $_SERVER['SERVER_ADDR']
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $fileName = $request->title .'-'. $request->des . '.' . $extension;
                $file->move($root_path, $fileName);
                $meeting->file =  '/uploads/meeting_minutes/'. $fileName;
            }else{
                $validator->errors()->add('file', "You haven't selected any file. Please select the file.");
                return Response::json(['errors' => $validator->errors()]);
            }

            $user = Auth::user();
            $meeting->title = $request->title;
            $meeting->des = $request->des;
            $meeting->created_by = $user->name;
            $meeting->updated_by = $user->name;

            $meeting->save();

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
            'title.required'=>'Meeting Minute Title is required.',
        ]);

        $meeting = MeetingMinute::find($request->meeting_id);
        if ($validator->passes()) {
            if ($request->hasFile('file')) {
                $path = public_path() . $meeting->file;

                if (file_exists($path)) {
                    unlink($path);
                }
                $root_path = public_path() . '/uploads/meeting_minutes/';
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $fileName = $request->title .'-'. $request->des . '.' . $extension;
                $file->move($root_path, $fileName);
                $meeting->file =  '/uploads/meeting_minutes/' . $fileName;
            }

            $user = Auth::user();

            $meeting->title = $request->title;
            $meeting->des = $request->des;
            $meeting->updated_by = $user->name;

            $meeting->save();

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
        $meeting = DB::table('meeting_minutes')->where('id',$id)->first();
        if ($meeting->file) {
            $path = public_path() . $meeting->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        DB::table('meeting_minutes')->where('id',$id)->delete();
        $nonedata = DB::table('meeting_minutes')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('meeting_minutes')->truncate();
        }else {
            $last_id = DB::table('meeting_minutes')->latest('id')->first()->id + 1;
            DB::statement("ALTER TABLE `meeting_minutes` AUTO_INCREMENT = $last_id");
        }

        return redirect()->back();
    }
}
