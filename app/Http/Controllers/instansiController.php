<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi;
use App\Http\Requests\instansiRequest;
use DataTables;
use Session;

class instansiController extends Controller
{
    public function index(Request $request)
    {
        if(Session::get('username')) {
            if ($request->ajax()) {
                $data = Instansi::orderBy("id", "desc")->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                            $btn = '<a href="#" class="editInstansi" data-id='.$row->id.' data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fa fa-edit fa-fw text-warning"></i></a> &nbsp;
                            <a href="#" data-id='.$row->id.' class="delete"><i class="fa fa-trash fa-fw text-danger"></i></a> &nbsp;';
                            return $btn;
                    })
                ->rawColumns(['action'])
                ->make(true);
                }
                return view('instansi');
        } else {
            return redirect('/')->with(['error' => 'anda harus login terlebih dahulu !']);
        }
    }

    public function create(instansiRequest $request) {
        $instansi = new Instansi();
        $instansi->instansi =  $request->instansi;
        $instansi->deskripsi =  $request->deskripsi;
        $instansi->save();

        return response()->json(['message'=>'success !']);
    }

    public function edit(Request $request, $id) {
        $where = array('id' => $request->id);
        $instansi = Instansi::where($where)->first();
        return Response()->json($instansi);
    }

    public function update(instansiRequest $request, $id) {
        $instansi = Instansi::find($id);
        $instansi->instansi =  $request->instansi;
        $instansi->deskripsi =  $request->deskripsi;
        $instansi->save();

        return response()->json(['message'=>'success !']);
    }

    public function delete($id)
    {
        $instansi = Instansi::find($id);
        $instansi->delete();
        return response()->json(['message'=>'success !']);
    }
}
