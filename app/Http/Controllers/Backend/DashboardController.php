<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Book;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Dealer;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Protfolio;
use App\Models\Qrcode;
use App\Models\Review;
use App\Models\Subscriber;
use App\Models\Team;
use App\Models\VerificationAttempt;
use App\Models\Video;
use App\Models\Visitor;
use App\Models\WarrentyClame;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function saveIp(Request $request)
    {
        if (isset($request->ip)) {
            $check = Visitor::where('ip', $request->ip)
                                ->where('url', $request->url)
                                ->whereDate('created_at', Carbon::today())
                                ->first();
            if ($check) {
                $check->increment('hits', 1);
            } else {
                Visitor::create([
                    'ip' => $request->ip,
                    'city' => $request->city,
                    'region' => $request->region,
                    'country' => $request->country,
                    'device' => $request->device,
                    'browser' => $request->browser,
                    'url' => $request->url,
                    'loc' => $request->loc,
                    'hits' => 1,
                    'org' => $request->org,
                    'postal' => $request->postal,
                    'timezone' => $request->timezone,
                    'readme' => $request->readme,
                    'domain' => request()->headers->get('origin'),
                ]);
            }
        }
    }
    protected function visitorsChart()
    {
        $monthlyRecord = [];
        $year = date('Y');
        $month = date('m');
        $dayNumber = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($i = 1; $i <= $dayNumber; $i++) {
            $date = $year . '-' . $month . '-' . sprintf("%02d", $i);
            $visit = Visitor::where('created_at', $date);
            $visits = [
                'date' => date('Y-m').'-'.sprintf("%02d", $i),
                'total' => $visit->count()
            ];
            array_push($monthlyRecord, $visits);
        }
        return $monthlyRecord;
    }
    public function index()
    {
        // $visitor_chart = [
        //     'dates' => collect($this->visitorsChart())->map(fn ($item) => $item['date']),
        //     'totals' => collect($this->visitorsChart())->map(fn ($item) => $item['total']),
        // ];



        // $totalVisitor = Visitor::whereMonth('created_at', Carbon::now())->whereYear('created_at', date('Y'))->count();
        // $previousMonthVisitor = Visitor::whereMonth('created_at', Carbon::now()->subMonth())->whereYear('created_at', date('Y'))->count();
        // // dd($previousMonthVisitor, $totalVisitor);
        // if ($previousMonthVisitor == 0) {
        //     $lastWeekVisitors = 0;
        // } else {
        //     $lastWeekVisitors = number_format((($totalVisitor - $previousMonthVisitor) / $previousMonthVisitor) * 100, 2);
        // }
        // $data['visitorsChart'] = $visitor_chart;
        // $data['totalVisitor'] = $totalVisitor;
        // $data['lastWeekVisitors'] = $lastWeekVisitors;
        // $data['brands'] = 0;
        // $data['teams'] = 0;
        // $data['offers'] = 0;
        // $data['reviews'] = Review::count();
        // $data['protfolios'] = 0;
        // $data['applications'] = 0;
        $data = [];

        $data['posts'] = Post::count();
        $data['categories'] = Category::count();
        $data['subscribers'] = Subscriber::count();
        $data['videos'] = Video::count();
        $data['books'] = Book::count();
        
        return view('pages.home', $data);
    }

    public function edit()
    {
        return view('pages.dealer.edit');
    }
}
