<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use POST;
use View;


class SupplierController extends Controller
{
    public function index(){
        // $suppliers = Supplier::all();
        $suppliers = Supplier::orderby('id','DESC')->paginate(100);
        return view('backend.supplier.index',compact('suppliers'));
    }
    public function trashed_supplier(){
        // $suppliers = Supplier::all();
        $suppliers = Supplier::onlyTrashed()->orderby('id','DESC')->paginate(100);
        return view('backend.supplier.trashed-list',compact('suppliers'));
    }
    public function restore($id){
        
        $suppliers = Supplier::withTrashed()->findOrFail($id);
        if(!is_null($suppliers)) {
            $suppliers->restore();
        }

        return redirect()->route('supplier.index')->with('success','Employee restored successfully');
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
        
        // $distination = 'images/suppliers/'.$supplier->sup_image;
        //     if(File::exists($distination))
        //     {
        //         File::delete($distination);
        //     }
        $supplier->delete();
            
        return back()->withSuccess('Supplier Delete Successfully !!!!! ');

    }
    public function per_delete($id)
   
    {
        $supplier = Supplier::withTrashed()->find($id);
        
        $distination = 'images/suppliers/'.$supplier->sup_image;
            if(File::exists($distination))
            {
                File::delete($distination);
            }
        $supplier->forceDelete();
            
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


    public function generatePDF(){
        $suppliers = Supplier::all();
        $data = [
            'title' => 'Welcome to Point of sale',
            'date' => date('m/d/Y'),
            'image'=> 'images/suppliers/',
            
        ];
        

        $pdf = PDF::loadView('backend.supplier.pdf',$data , compact('suppliers'))->setPaper('a4','landscape');
        return $pdf->download('mypdf'.time().'pdf');

        // return view('backend.supplier.downloadpdf',compact('suppliers'));
    
        // $supliers = Supplier::all();
        // foreach ($supliers as $supplier){
        //     // $imagePath = public_path('images/suppliers/'.$supplier['sup_image']);
        //     $imagePath = 'images/suppliers/'.$supplier['sup_image'];
        // //    print_r($imagePath);
        //     $imageData = Storage::get($imagePath);
        //     // print_r($imageData);
        //     $base64Image = base64_encode($imageData);
        //     $supplier->sup_image= 'data:image/jpeg;base64,'.$base64Image;
        // }
        // $data = ['Supplier' => $supliers];
        // $html =View::make('backend.supplier.downloadpdf', $data)->Blade::render();
        // // print_r($html);
        // $pdf = new Dompdf();
        // $pdf->loadHtml($html);
        // $pdf->render();
        // return $pdf->stream('supplier pdf.pdf');
    }

}
 