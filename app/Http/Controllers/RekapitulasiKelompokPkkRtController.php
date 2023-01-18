<?php

namespace App\Http\Controllers;

use App\Models\RekapitulasiKelompokPkkRt;
use Illuminate\Http\Request;
use App\Exports\RekapitulasiKelompokPkkRtExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class RekapitulasiKelompokPkkRtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RekapitulasiKelompokPkkRt::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '
                        <form onsubmit="return confirm(\'Apakah anda yakin ingin menghapus '.$row->id_rekapitulasi_kelompok_pkk_rt.' ?\');"  action="rekapitulasiKelompokPkkRts/'.$row->id_rekapitulasi_kelompok_pkk_rt.'" method="POST">

                            <a class="btn btn-primary" href="rekapitulasiKelompokPkkRts/'.$row->id_rekapitulasi_kelompok_pkk_rt.'/edit" >
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a>

                            '.csrf_field().'
                            '.method_field("DELETE").'

                            <button type="submit" class="btn btn-danger">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>
                        ';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('rekapitulasiKelompokPkkRts.index');
    }

    public function export_excel()
	{
        $name = 'Laporan Rekapitulasi Kelompok Pkk Rt '.date('Y-m-d', time());
		return Excel::download(new RekapitulasiKelompokPkkRtExport, $name . '.xlsx');
	}

    public function export_pdf()
    {
        $rekapitulasiKelompokPkkRt = RekapitulasiKelompokPkkRt::all();
        $pdf = PDF::loadview('rekapitulasiKelompokPkkRts.laporan_pdf', ['rekapitulasiKelompokPkkRt' => $rekapitulasiKelompokPkkRt])->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('rekapitulasi_kelompok_pkk_rt.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekapitulasiKelompokPkkRts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        RekapitulasiKelompokPkkRt::create($request->all());

        return redirect()->route('rekapitulasiKelompokPkkRts.index')
                        ->with('success','Rekapitulasi Kelompok Pkk Rt created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekapitulasiKelompokPkkRt  $rekapitulasiKelompokPkkRt
     * @return \Illuminate\Http\Response
     */
    public function show(RekapitulasiKelompokPkkRt $rekapitulasiKelompokPkkRt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekapitulasiKelompokPkkRt  $rekapitulasiKelompokPkkRt
     * @return \Illuminate\Http\Response
     */
    public function edit(RekapitulasiKelompokPkkRt $rekapitulasiKelompokPkkRt)
    {
        return view('rekapitulasiKelompokPkkRts.edit',compact('rekapitulasiKelompokPkkRt'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekapitulasiKelompokPkkRt  $rekapitulasiKelompokPkkRt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekapitulasiKelompokPkkRt $rekapitulasiKelompokPkkRt)
    {
        $request->validate([
            'keterangan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

         $rekapitulasiKelompokPkkRt->update($request->all());

         return redirect()->route('rekapitulasiKelompokPkkRts.index')
                         ->with('success','Rekapitulasi Kelompok Pkk Rt updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekapitulasiKelompokPkkRt  $rekapitulasiKelompokPkkRt
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekapitulasiKelompokPkkRt $rekapitulasiKelompokPkkRt)
    {
        $rekapitulasiKelompokPkkRt->delete();

        return redirect()->route('rekapitulasiKelompokPkkRts.index')
                        ->with('success','Rekapitulasi Kelompok Pkk Rt deleted successfully');
    }
}
