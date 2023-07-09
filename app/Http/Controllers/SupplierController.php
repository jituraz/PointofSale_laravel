<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use POST;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return view('backend.supplier.index',compact('suppliers'));
    }
    public function create(){
        return view('backend.supplier.create');
    }
    
    //store part with picture 
    public function store(Request $request){
        // dd($request->all());
         //validation part
        $validated = $request->validate(
            [
                'sup_code' => 'required',
                'sup_name'=> 'required',
                'sup_phone'=>'required',
                'sup_address'=>'required',
                'sup_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
            ]);
            
        //suplier sotore data section. 
     
        $supplier = new Supplier;
        $supplier->sup_code = $request->sup_code;
        $supplier->sup_name = $request->sup_name;
        $supplier->sup_email = $request->sup_email;
        $supplier->sup_phone = $request->sup_phone;
        $supplier->sup_country=$request->sup_country;
        $supplier->sup_address=$request->sup_address;
       
        //Supplier upload image section
        if($request->hasFile('sup_image'))
        {
            $file = $request->file('sup_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/suppliers/',$filename);
            $supplier->sup_image= $filename;
        
        }
        // $imageName =time().'.'.$request->sup_image->extension();
        // $request->sup_image->move(public_path('images'), $imageName);

        $supplier->save();
        return back()->withSuccess('Supplier Create Successfully !!!!! ');

    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('backend.supplier.edit', compact('supplier'));
    }
    public function update(Request $request , $id){
        $supplier = Supplier::find($id);
        $supplier->sup_code = $request->sup_code;
        $supplier->sup_name = $request->sup_name;
        $supplier->sup_email = $request->sup_email;
        $supplier->sup_phone = $request->sup_phone;
        $supplier->sup_country=$request->sup_country;
        $supplier->sup_address=$request->sup_address;
       
        //Supplier upload image section
        if($request->hasFile('sup_image'))
        {
            $distination = 'images/suppliers/'.$supplier->sup_image;
            if(File::exists($distination))
            {
                File::delete($distination);
            }
            $file = $request->file('sup_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/suppliers/',$filename);
            $supplier->sup_image= $filename;
        
        }
        // $imageName =time().'.'.$request->sup_image->extension();
        // $request->sup_image->move(public_path('images'), $imageName);

        $supplier->update();
        return back()->withSuccess('Supplier Update Successfully !!!!! ');

    }
    public function delete($id)
    {
        $supplier = Supplier::find($id);
        

        $distination = 'images/suppliers/'.$supplier->sup_image;
            if(File::exists($distination))
            {
                File::delete($distination);
            }
        $supplier->delete();
            
        return back()->withSuccess('Supplier Delete Successfully !!!!! ');

    }
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('backend.supplier.show', compact('supplier'));
    }
    public function changeStatus($id)
    {
        $getStatus = Supplier::select('sup_status')->where('id',$id)->first();
        if($getStatus->sup_status==1){
            $status = 0;

        }else{
            $status = 1;

        }
        Supplier::where('id',$id)->update(['sup_status'=>$status]);

        return back()->with('info','Supplier Status Change Successfully !!!!! ');
    }

}
