<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penelitian;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function index()
    {
        $data = array(
            'title'=> 'Dosen',
        );

        return view('dosen.index', $data);
    }

    public function list() {
        $data = Penelitian::all();
        return DataTables::of($data)
            ->addColumn('download', function($row){
                return '<div class="text-center"><a href="dosen/download/'.$row->file.'" class="btn btn-sm btn-success"><b><i class="fa fa-download mx-1"> Download </b></a></div>';
            })
            ->addColumn('lppm_st', function($row){
                if ($row->lppm_approval == '3'){
                    return '<div class="text-center"><span class="badge badge-success">Verified</span></div>';
                } else if ($row->lppm_approval == '2'){
                    return '<div class="text-center"><span class="badge badge-danger">Reject</span></div>
                    <div class="text-center"><span class="">'.$row->lppm_note.'</span></div>';
                } else if ($row->lppm_approval == '1'){
                    return '<div class="text-center"><span class="badge badge-warning">Process</span></div>';
                } else {
                    return '<div class="text-center"><span class="badge badge-warning">Waiting</span></div>';
                }
            })
            ->addColumn('reviewer_st', function($row){
                if ($row->reviewer_approval == '3'){
                    return '<div class="text-center"><span class="badge badge-success">Verified</span></div>';
                } else if ($row->reviewer_approval == '2'){
                    return '<div class="text-center"><span class="badge badge-danger">Reject</span></div>';
                } else if ($row->reviewer_approval == '1'){
                    return '<div class="text-center"><span class="badge badge-warning">Process</span></div>';
                } else {
                    return '<div class="text-center"><span class="badge badge-warning">Waiting</span></div>';
                }
            })
            ->addColumn('action', function($row){
                return '<div class="text-center">
                <button onclick=edit("'.$row->id.'") 
                class="btn btn-sm btn-info mr-1"><b><i class="fa fa-edit mr-1"></i>
                Edit
                </b>
                </button>
                <button onclick=delete_process("'.$row->id.'") 
                class="btn btn-sm btn-danger mr-1"><b><i class="fa fa-trash mr-1"></i>
                Delete
                </b>
                </button>
                </div>
                ';
            })
            ->rawColumns(['download','lppm_st','reviewer_st','action'])
            ->toJson();
    }

    public function create()
    {
        //
    }

    public function store(Request $request){
        $id = $request->input('id');
        $file = $request->file('file');
        $title = $request->input('title');
        
        /** Upload files */
        $filename = date("dMYHis_").$file->getClientOriginalName();
        $file->move(public_path('files'),$filename);

        if (!$id){
            $penelitian = Penelitian::create([
                'dosen_id' => Auth::user()->id,
                'title' => $title,
                'file' => $filename,
                'dosen_date' => date('Y-m-d'),
                'lppm_approval' =>'1'
            ]);
        } else {
            $penelitian = Penelitian::find($id);
            $penelitian->title = $title;
            $penelitian->file = $filename;
        }
        
        if ($penelitian->save()){
            return response()->json(['success'=> 'Transaksi Created!']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $penelitian = Penelitian::find($id);
        if($penelitian->delete()){
            return redirect('/dosen');
        }
    }

    public function download($filename)
    {
    	$path = public_path('files/'.$filename);
    	$headers = ['Content-Type: application/pdf'];

    	return response()->download($path, $filename, $headers);
    }
}
