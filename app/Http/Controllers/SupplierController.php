<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return view('backend.supplier.index',compact('suppliers'));
    }
    public function create(){
        return view('backend.supplier.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $imageName =time().'.'.$request->sup_image->extension();
        $request->sup_image->move(public_path('images'), $imageName);

        $supplier = new Supplier;
        $supplier->sup_code = $request->sup_code;
        $supplier->sup_name = $request->sup_name;
        $supplier->sup_email = $request->sup_email;
        $supplier->sup_phone = $request->sup_phone;
        $supplier->sup_country=$request->sup_country;
        $supplier->sup_address=$request->sup_address;

        $supplier->sup_image= $imageName;
        


        $supplier->save();
        return back();

    }
}
