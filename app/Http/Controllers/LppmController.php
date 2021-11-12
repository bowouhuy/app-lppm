<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penelitian;
use Yajra\DataTables\Facades\DataTables;

class LppmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'=> 'LPPM',
        );

        return view('lppm.index', $data);
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
                    return '<div class="text-center"><span class="badge badge-danger">Reject</span></div>';
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
                    return '<div class="text-center"><span class="badge badge-danger">Reject</span></div>
                    <div class="text-center"><span class="">'.$row->lppm_note.'</span></div>';
                } else if ($row->reviewer_approval == '1'){
                    return '<div class="text-center"><span class="badge badge-warning">Process</span></div>';
                } else {
                    return '<div class="text-center"><span class="badge badge-warning">Waiting</span></div>';
                }
            })
            ->addColumn('action', function($row){
                return '<div class="text-center">
                <button onclick=edit("'.$row->id.'") 
                class="btn btn-sm btn-danger mr-1"><b><i class="fa fa-edit mr-1"></i>
                Reject
                </b>
                </button>
                <form action="'.url('lppm/store').'" class="notes" id="notes" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="'.csrf_token().'" />
                    <input type="hidden" name="id" value="'.$row->id.'">
                <button type="submit" 
                class="btn btn-sm btn-success mr-1"><b><i class="fa fa-check mr-1"></i>
                Submit
                </b>
                </button>
                </form>
                </div>
                ';
            })
            ->rawColumns(['download','lppm_st','reviewer_st','action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $note = $request->input('notes');
        $lppm_approval = $request->input('approve');
        $penelitian = Penelitian::find($id);
        if(isset($lppm_approval)){
            $penelitian->lppm_note = $note;
            $penelitian->lppm_approval = $lppm_approval;
        }else{
            $penelitian->reviewer_approval = '1';
            $penelitian->lppm_approval = '3';
        }
        

        if ($penelitian->save()){
            return redirect('/lppm');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
