<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function saveIp(Request $request) {
        if (isset($request->ip)) {
            $check = Visitor::where('ip', $request->ip)->whereDate('created_at', Carbon::today())->first();
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
                    'org' => $request->org,
                    'postal' => $request->postal,
                    'timezone' => $request->timezone,
                    'readme' => $request->readme,
                    'domain' => request()->headers->get('origin'),
                ]);
            }
        }
    }
//     protected function visitorsChart() {
//     $monthlyRecord = [];
//     $year = date('Y');
//     $month = date('m');
//     $dayNumber = cal_days_in_month(CAL_GREGORIAN, $month, $year);
//     for($i = 1; $i <= $dayNumber; $i++){
//         $date = $year . '-' . $month . '-'. sprintf("%02d", $i);
//         $visit = Visitor::where('date', $date);
//         // $amount = ($sale->sum('subtotal') - $sale->sum('discount') + $sale->sum('vat_amount'));
//         // $totalVisit = $visit->count('hits');
//         $visits = ['date' => sprintf("%02d", $i)];
//         array_push($monthlyRecord, $visits);
//     }
//     return $monthlyRecord;
// }
}
