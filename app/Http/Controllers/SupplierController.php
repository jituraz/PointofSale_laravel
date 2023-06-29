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
    public function store(Request $request){
        // dd($request->all());
        $supplier = new Supplier;
        $supplier->sup_code = $request->sup_code;
        $supplier->sup_name = $request->sup_name;
        $supplier->sup_email = $request->sup_email;
        $supplier->sup_phone = $request->sup_phone;
        $supplier->sup_country=$request->sup_country;
        $supplier->sup_address=$request->sup_address;
        $supplier->sup_image=$request->sup_image;

        $supplier->save();
        return back();

    }
}
