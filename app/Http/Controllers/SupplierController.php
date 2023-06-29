<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $supliers = Supplier::all();
        return view('backend.supplier.index',compact('supliers'));
    }
    public function create(){
        return view('backend.supplier.create');
    }
    // public function store(Request $request){
    //     // dd($request->all());
    //     $supplier = new Supplier;
    //     $supplier->sup_code = $request->sup_code;
    //     $supplier->supplier_name = $request->supplier_name;
    //     $supplier->supplier_details = $request->supplier_details;

    //     $supplier->save();
    //     return back();

    // }
}
