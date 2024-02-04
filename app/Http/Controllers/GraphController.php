<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\fullfillmentcases;
use App\Models\declinecases;
use App\Models\pendingcases;
use App\Models\client_profile_ext;
use Illuminate\Support\Facades\DB;


class GraphController extends Controller
{
    // 

    // fullfilled cases
    public function fetchData() {
        $data = fullfillmentcases:: select
        (DB::raw('YEAR(daterequested) as year'),
         DB::raw('MONTH(daterequested) as month'),
         DB::raw('COUNT(*) as count'))
        ->groupBy('year', 'month')
        ->get();

  

        return response()->json($data);
        }


        //decline cases
        public function fetchDeclinedCaseData(){
        $declineData = declinecases::select
        (
         'reason',    
       
         DB::raw('COUNT(*) as count'))
         ->groupBy('reason')
         ->get();
      //   dd($declineData);
         return response()->json($declineData);

        }


        // case referal type

        public function fetchCaseReferalType() {
            $casereferaltypedata = client_profile_ext::select(
                DB::raw("CASE WHEN `CaseReferalType` IS NOT NULL THEN TRIM(TRAILING ',' FROM `CaseReferalType`) ELSE NULL END as `referral_types`"),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('referral_types')
            ->get();
        
            // Consolidate referral types and counts into an associative array
            $referralTypeData = [];
            foreach ($casereferaltypedata as $item) {
                $referralTypes = explode(',', $item->referral_types);
                foreach ($referralTypes as $referralType) {
                    $trimmedReferralType = trim($referralType);
                    if (!isset($referralTypeData[$trimmedReferralType])) {
                        $referralTypeData[$trimmedReferralType] = $item->count;
                    } else {
                        $referralTypeData[$trimmedReferralType] += $item->count;
                    }
                }
            }
        
            $result = [];
            foreach ($referralTypeData as $referralType => $count) {
                $result[] = [
                    'referral_type' => $referralType,
                    'count' => $count,
                ];
            }
        
            return response()->json($result);
        }
        


    // get total cases

    public function totalcases() {
      
        $fullfillecase_count = fullfillmentcases::count('id'); // count the number of cases in the fullfillment table 
        $declinedcases_count = declinecases::count('id'); // count the number of cases in the declined table 
        $pendingcases_count  = pendingcases::count('id'); // count the number of cases in the pending table 
        $totalcases_count    =  $fullfillecase_count +  $declinedcases_count +  $pendingcases_count ; // sum the fullfilment, declined and pending cases to get total cases


        $data = [
        'year' => date('Y'),
        'total_cases' => $totalcases_count,
        ];
        return response()->json([ $data]);

    }

    public function fetchCaseDataByYear() {
        $data = []; // Initialize an empty array to store data
    
        // Get the distinct years from the models
        $years = collect();
    
        $models = [fullfillmentcases::class, declinecases::class, pendingcases::class];
    
        foreach ($models as $model) {
            $modelYears = $model::selectRaw('YEAR(daterequested) as year')
                ->distinct()
                ->orderBy('year', 'asc')
                ->pluck('year');
            
            $years = $years->merge($modelYears);
        }
    
        $years = $years->unique(); // Remove duplicate years
    
        foreach ($years as $year) {
            $totalCases = 0;
    
            foreach ($models as $model) {
                $totalCases += $model::whereYear('daterequested', $year)->count();
            }
    
            // Cast the year to an integer to ensure consistent data types
            $data[] = [
                'year' => $year,
                'total_cases' => $totalCases
            ];
        }
    
        return response()->json($data);
    }
    
    
    public function fetchPendingCaseDataByYear()
    {
        $data = [];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    
        // Query your database to get data for each year
        $years = pendingcases::selectRaw('YEAR(daterequested) as year')
            ->distinct()
            ->orderBy('year', 'asc')
            ->pluck('year');
    
        foreach ($years as $year) {
            $totalPendingCases = [];
            foreach ($months as $month) {
                $totalPendingCases[$month] = pendingcases::whereYear('daterequested', $year)
                    ->whereMonth('daterequested', array_search($month, $months) + 1)
                    ->count();
            }
    
            $data[] = array_merge(['y' => (string)$year], $totalPendingCases);
        }
    
        return response()->json($data);
    }
    
    
    
}
