<?php

namespace App\Http\Controllers\Admin;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        return view('admin.career.index',compact('careers'));
    }

    public function create()
    {
        return view('admin.career.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'jd' => 'required',
            'jr' => 'required',            
            'salary' => 'required',
            'post' => 'required',
            'location' => 'required',
        ], [
            'position.required' => 'Job Position is required.',
            'jd.required' => 'Job Description is required.',
            'jr.required' => 'Job Requirement is required.',
            'salary.required' => 'Salary is required.',
            'post.required' => 'Post is required.',
            'location.required' => 'Location is required.',
        ]);

        if ($validator->passes()) {
            $user = Auth::user();
            $career = new Career();
            $career->position = $request->position;
            $career->salary = $request->salary;
            $career->explvl = $request->explvl;
            $career->gender = $request->gender;            
            $career->post = $request->post;
            $career->location = $request->location;
            $career->jt = $request->jt;
            $career->jd = $request->jd;
            $career->jr = $request->jr;
            $career->benefits = $request->benefits;
            $career->highlights = $request->highlights;
            $career->opportunities = $request->opportunities;
            $career->created_by = $user->name;
            $career->updated_by = $user->name;

            $career->save();
            return redirect()->route('admin.career.index');
        }else{
            return redirect('/admin/career/create')
                ->withErrors($validator, 'update')->withInput();
        }
        
    }

    public function show($id)
    {
        $career = Career::find($id);
        return view('admin.career.show',compact('career'));
    }

    public function edit($id)
    {
        $career = Career::find($id);
        return view('admin.career.edit',compact('career'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'jd' => 'required',
            'jr' => 'required',            
            'salary' => 'required',
            'post' => 'required',
            'location' => 'required',
        ], [
            'position.required' => 'Job Position is required.',
            'jd.required' => 'Job Description is required.',
            'jr.required' => 'Job Requirement is required.',
            'salary.required' => 'Salary is required.',
            'post.required' => 'Post is required.',
            'location.required' => 'Location is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.career.edit', $id)
                ->withErrors($validator, 'update')->withInput();
        }

        $user = Auth::user();   
        $career = Career::findOrFail($id);
        $career->position = $request->position;
        $career->salary = $request->salary;
        $career->explvl = $request->explvl;
        $career->gender = $request->gender;            
        $career->post = $request->post;
        $career->location = $request->location;
        $career->jt = $request->jt;
        $career->jd = $request->jd;
        $career->jr = $request->jr;
        $career->benefits = $request->benefits;
        $career->highlights = $request->highlights;
        $career->opportunities = $request->opportunities;            
        $career->updated_by = $user->name;

        $career->update();

        return redirect()->route('admin.career.index');
    }

    public function destroy($id)
    {
        DB::table('careers')->where('id', $id)->delete();
        $nonedata = DB::table('careers')->count() == 0 ? true : false;

        if ($nonedata) {
            DB::table('careers')->truncate();
        } else {
            $last_id = Career::latest()->first()->id + 1;
            DB::statement("ALTER TABLE `careers` AUTO_INCREMENT = $last_id");
        }

        return redirect()->route('admin.career.index');
    }
}
