<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Termwind\Components\Dt;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    public function ContactForm()
    {

        return view('frontend.pages.contact_us');
    }
    public function ContactFormSubmit(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);


        setting::create($request->all());

        return redirect()->back()->with('success', 'Message sent successfully');
    }

    public function ContactFormView()
    {
        //  get all data from database in datatable

        if (request()->ajax()) {
            $data = setting::latest()->get();
            return DataTables::of($data)

                ->addindexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })->addColumn('email', function ($data) {
                    return $data->email;
                })->addColumn('message', function ($data) {
                    return $data->message;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteContact">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.setting.contact_us');
    }

    public function ContactFormDelete(Request $request)
    {
        $data = setting::findOrFail($request->id);
        $data->delete();
    }
public function PartnersView(){

    return view('backend.setting.partners');

}

}
