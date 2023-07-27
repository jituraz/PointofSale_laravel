<?php

namespace App\Http\Controllers;


use App\Models\Coustomer;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use POST;
use View;

class CoustomerController extends Controller
{
    public function index(){
        $coustomers = Coustomer::all();
        return view('backend.coustomer.index',compact('coustomers'));
    }

    public function create(){
        return view('backend.coustomer.create');
    }

    public function store(Request $request){
        //Validitaion Part Start//
        $validated = $request->validate(
            [
               
                'cous_code' => 'required',
                'cous_name' => 'required',
                'cous_phone' => 'required',
                'cous_address' => 'required',
                'cous_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
            ]);

        //Coustemr Data Store Part start

        $coustomers = new Coustomer;
        $coustomers->cous_name= $request->cous_name;
        $coustomers->cous_email= $request->cous_email;
        $coustomers->cous_phone= $request->cous_phone;
        $coustomers->cous_country= $request->cous_country;
        $coustomers->cous_address= $request->cous_address;
        $coustomers->cous_code= $request->cous_code;

        if($request->hasFile('cous_image')){
            $file = $request->file('cous_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/coustomers/',$filename);
            $coustomers->cous_image=$filename;
        }

        $coustomers->save();
        return back()->withSuccess('Coustomer Create Successfully !!!!! ');
    }
    public function edit($id)
    {
        $coustomers = Coustomer::find($id);
        return view('backend.coustomer.edit', compact('coustomers'));
    }
}
