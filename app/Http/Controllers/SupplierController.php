<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use File;

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
        //Supplier upload image section
        if($image= $request->file('sup_image')){
        $imageName =time().'.'.$request->sup_image->extension();
        $request->sup_image->move(public_path('images'), $imageName);
        }
        //suplier sotore data section. 
        $supplier = new Supplier;
        $supplier->sup_code = $request->sup_code;
        $supplier->sup_name = $request->sup_name;
        $supplier->sup_email = $request->sup_email;
        $supplier->sup_phone = $request->sup_phone;
        $supplier->sup_country=$request->sup_country;
        $supplier->sup_address=$request->sup_address;

        $supplier->sup_image= $image;
        


        $supplier->save();
        return back()->withSuccess('Supplier Create Successfully !!!!! ');

    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('backend.supplier.edit', compact('supplier'));
    }
    public function update(Request $request , $id){
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
            $supplier = Supplier::where('id',$id)->first();
            $imageName='';
            $deleteOldImage ='images'.$supplier->sup_image;

            if(isset($request->sup_image)){
                if(file_exists($deleteOldImage)){
                    File::delete($deleteOldImage);
                }
                $imageName =time().'.'.$request->sup_image->extension();
                $request->sup_image->move(public_path('images'), $imageName);
                $supplier->sup_image= $imageName;
            } else{
                $imageName=$supplier->sup_image;
            }
        //Supplier upload image section

        //suplier sotore data section. 
  
        $supplier->sup_code = $request->sup_code;
        $supplier->sup_name = $request->sup_name;
        $supplier->sup_email = $request->sup_email;
        $supplier->sup_phone = $request->sup_phone;
        $supplier->sup_country=$request->sup_country;
        $supplier->sup_address=$request->sup_address;

        $supplier->save();
        return back()->withSuccess('Supplier updated Successfully !!!!! ');

    }
    public function delete($id)
    {
        $supplier = Supplier::find($id);
        

        $image_path = public_path('images/'.$supplier->sup_image);
        if(File::exists($image_path)){
           File::delete($image_path);
        }
    
        $supplier->delete();

        return redirect()->back()->with('message','Suppler deleted successfully');

    }

}
