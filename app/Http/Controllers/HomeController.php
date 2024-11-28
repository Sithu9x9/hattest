<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Activities_posts;
use App\Models\AnnualReport;
use App\Models\Career;
use App\Models\CorporateInformation;
use App\Models\CorporateInformation_posts;
use App\Models\FinancialReport;
use App\Models\MeetingMinute;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Stock_posts;
use Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();

        $activities = Activities::all();
        $cors = CorporateInformation::all();
        // dd($acts);
        return view('home', compact('sliders', 'activities', 'cors'));
    }

    public function about()
    {
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('about', compact('activities', 'cors'));
    }

    public function team()
    {
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('Board-CEO', compact('activities', 'cors'));
    }

    public function OrgStructure()
    {
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('org-structure', compact('activities', 'cors'));
    }

    public function policy()
    {
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('policy', compact('activities', 'cors'));
    }


    public function privacy()
    {
        return view('privacy');
    }

    public function contactus()
    {
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('contactus', compact('activities', 'cors'));
    }

    public function career()
    {
        $activities = Activities::all();
        $careers = Career::all();
        $cors = CorporateInformation::all();
        return view('career', compact('activities', 'cors', 'careers'));
    }

    public function CareerDetail($id)
    {
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        $career = Career::find($id);
        return view('careerDetail', compact('activities', 'cors', 'career'));
    }

    public function investment()
    {
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('investment', compact('activities', 'cors'));
    }

    public function corporateshow()
    {
        $activities = Activities::all();
        $cors = CorporateInformation::paginate(8);
        return view('corporate-information.index', compact('activities', 'cors'));
    }

    public function corporate($id)
    {
        $activities = Activities::all();
        $cor_posts = CorporateInformation_posts::find($id);
        $cors = CorporateInformation::all();
        // dd($cors->corporate_information_posts);
        return view('corporate-information.single', compact('activities', 'cor_posts', 'cors'));
    }

    public function corporateChose($id)
    {
        $activities = Activities::all();
        $cor = DB::table('corporate_information_posts')
            ->select('corporate_information.title as cor_title', 'corporate_information.image as cor_image', 'corporate_information_posts.*')
            ->where('corporate_information_posts.corporate_information_id', $id)
            ->join('corporate_information', 'corporate_information.id', '=', 'corporate_information_posts.corporate_information_id')
            ->paginate(8);
        if ($cor[0] == null) {
            return redirect()->back();
        }
        $cors = CorporateInformation::all();
        // dd($cors->corporate_information_posts);
        return view('corporate-information.show', compact('activities', 'cor', 'cors'));
    }

    public function stockChose($id)
    {
        $activities = Activities::all();
        $stk = DB::table('stock_posts')
            ->select('stocks.title as stk_title', 'stocks.image as stk_image', 'stock_posts.*')
            ->where('stock_posts.stock_id', $id)
            ->join('stocks', 'stocks.id', '=', 'stock_posts.stock_id')
            ->paginate(8);
        // dd($stk[0]);
        if ($stk[0] == null) {
            return redirect()->back();
        }
        $cors = CorporateInformation::all();
        // dd($cors->corporate_information_posts);
        return view('stock-information.show', compact('activities', 'stk', 'cors'));
    }

    public function stockshow()
    {
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        $stks = Stock::paginate(8);
        return view('stock-information.index', compact('activities', 'cors', 'stks'));
    }

    public function stock($id)
    {
        $activities = Activities::all();
        $stk_posts = Stock_posts::find($id);
        $cors = CorporateInformation::all();
        return view('stock-information.single', compact('activities', 'stk_posts', 'cors'));
    }

    public function partners()
    {
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('partners', compact('activities', 'cors'));
    }

    public function activityshow()
    {
        $activities = Activities::all();
        $activitie_view = Activities::paginate(8);
        $cors = CorporateInformation::all();
        return view('activities.activities-show', compact('activities', 'cors', 'activitie_view'));
    }

    public function activities($id)
    {
        $activities = Activities::all();
        $act_posts = Activities_posts::find($id);
        $cors = CorporateInformation::all();
        return view('activities.activities', compact('activities', 'act_posts', 'cors'));
    }

    public function activityIndex($id)
    {
        $activities = Activities::all();
        $acts = DB::table('activities_posts')
            ->select('activities.title as act_title', 'activities.image as act_image', 'activities_posts.*')
            ->leftJoin('activities', 'activities.id', '=', 'activities_posts.activities_id')
            ->where('activities_id', $id)
            ->paginate(8);
        if ($acts[0] == null) {
            return redirect()->back();
        }
        $cors = CorporateInformation::all();
        return view('activities.index', compact('activities', 'acts', 'cors'));
    }

    public function financialshow()
    {
        $all_financials = FinancialReport::all();
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('financials.financial-show', compact('activities', 'all_financials', 'cors'));
    }

    public function financial($id)
    {
        $file = FinancialReport::find($id);
        $filename = $file->title;
        $path = $file->file;
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }

    public function annualshow()
    {
        $all_annuals = AnnualReport::all();
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('annuals.annual-show', compact('activities', 'all_annuals', 'cors'));
    }

    public function annual($id)
    {
        $file = AnnualReport::find($id);
        $filename = $file->title;
        $path = $file->file;
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }

    public function meetingminuteshow()
    {
        $all_meetings = MeetingMinute::all();
        $activities = Activities::all();
        $cors = CorporateInformation::all();
        return view('meetingminutes.index', compact('all_meetings', 'activities', 'cors'));
    }

    public function sendEmail(Request $request)
    {
        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$request->secret&response=$request->response");

        if (isset(json_decode($verify)->success) && json_decode($verify)->success == true) {
            $time = Carbon\Carbon::now();
            $datetime = $time->toDateTimeString();
            $DT = explode(' ', $datetime);

            Mail::send(
                'contact_email',
                array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'user_message' => $request->msg,
                    'date' => $DT[0],
                    'time' => $DT[1],
                ),
                function ($message) use ($request) {
                    // dd($request->email);
                    $message->from($request->email);
                    $message->subject($request->subject);
                    $message->to('office@mti.com.mm');
                }
            );

            return response()->json(['success' => 'Thank you for contact us!']);
        } else {
            return response()->json(['error' => 'Recaptcha Failed!']);
        }
    }

    public function applyJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'cv' => 'required|max:10000|mimes:doc,docx,pdf'
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid Email.',
            'cv.required' => "Curriculum vitae is required.",
            'cv.max' => "Your file size is too Large.",
            'cv.mimes' => "Invaild File Type. Only allow for Docs or PDF"
        ]);

        if ($validator->passes()) {
            $time = Carbon\Carbon::now();
            $datetime = $time->toDateTimeString();
            $DT = explode(' ', $datetime);
            $file = $request->file('cv');
            Mail::send(
                'apply-job-form',
                array(
                    'coverletter' => $request->cl,
                    'email' => $request->email,
                    'date' => $DT[0],
                    'time' => $DT[1],
                ),
                function ($message) use ($request, $file) {
                    $message->from($request->email);
                    $message->subject('Apply Job');
                    $message->to('office@mti.com.mm');
                    $message->attach($file->getRealPath(), array(
                        'as' => $file->getClientOriginalName(), // If you want you can chnage original name to custom name
                        'mime' => $file->getMimeType()
                    ));
                }
            );

            return Response::json(['success' => 'success']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }
}
