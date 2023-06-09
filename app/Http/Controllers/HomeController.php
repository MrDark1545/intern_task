<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\stock;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // similar emails 
        $emailexists = DB::table('users')
        ->join('usersemail', 'users.email', '=', 'usersemail.email')
        ->count();
    
 //   echo 'Total Similar Emails: ' . $emailexists;

    $emailDoesNotExistCount = DB::table('users')
    ->leftJoin('usersemail', 'users.email', '=', 'usersemail.email')
    ->whereNull('usersemail.email')
    ->count();

   // echo 'Total non-similar Emails: ' . $emailDoesNotExistCount;

    $duplicateCount = DB::table('usersemail')
    ->selectRaw('COUNT(*) - COUNT(DISTINCT email) as duplicate_count')
    ->value('duplicate_count');

//   echo "Total duplicate records: $duplicateCount";

$data = [
    'existing_mails' => $emailexists,
    'non_existing_mails' => $emailDoesNotExistCount,
    'duplicate_emails' => $duplicateCount,
];
return view('home', $data);
}

}
