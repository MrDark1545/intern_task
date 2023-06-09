<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\stock;
use App\Exports\stockExport;
use App\Imports\stockImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
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
    public function index()
    {
        $stock = stock::paginate(10);
        return view('stock.index', ['stocks' => $stock]);
    }
    
   /**
     * Import Users 
     * @param Null
     * @return View File
     */
    public function importstock()
    {
        return view('stock.import');
    }

    public function uploadstock(Request $request)
    {
        Excel::import(new stockImport, $request->file);
        
        return redirect()->route('stock.index')->with('success', 'User Imported Successfully');
    }

    public function export() 
    {
        return Excel::download(new stockExport, 'stock.xlsx');
    }

    //----creating new user
    public function create()
    {
        return view('users.add');
    }
    
    public function store(Request $request)
{
    // Validations
    $request->validate([
        'first_name'    => 'required',
        'last_name'     => 'required',
        'email'         => 'required|unique:users,email',
        'mobile_number' => 'required|numeric|digits:11',
        'password'      => 'required',
    ]);

    try {
        // Start a database transaction
        DB::beginTransaction();

        // Create a new user using the create method
        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'mobile_number' => $request->mobile_number,
            'password'      => Hash::make($request->password)
        ]);

        // Commit the transaction
        DB::commit();

        return redirect()->route('stock.index')->with('success', 'User created successfully.');
    } catch (\Throwable $th) {
        // Rollback the transaction on exception
        DB::rollBack();

        return redirect()->back()->withInput()->withErrors([$th->getMessage()]);

    }
}


}
