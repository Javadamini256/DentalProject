<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientPayment;
use Illuminate\Http\Request;
// use App\config\MorilogJalaliJalalian;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\DataTables;

class PatientPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $datas = PatientPayment::where('patient_id', $request->id)->get();

            return datatables()->of($datas)
                ->addColumn('action', function ($datas) {
                    return
                        '<button class="btn btn-success btn-round btn-just-icon btn-sm edit-btn" id="' . $datas->id . '"> <i
                class="material-icons">edit</i> </button>

        <button type="button" id="' . $datas->id . '"
            class="  btn btn-danger btn-round btn-just-icon btn-sm deletePayment ">
            <i class="material-icons">close</i>

        </button>
        ';
                })
                ->toJson();
        }
    }

    public function payment(Request $request, $id)
    {
        // dd($request->id);
        $date = Jalalian::forge('today')->format(' %Y/%m/%d');
        $patient = Patient::find($id);
        $data = PatientPayment::all()->where('patient_id', $id);

        return view('admin.patient.payment.index', compact('patient'), compact('date'))->with(compact('data'))->with('page_title', 'صورت حساب بیمار');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            // return datatables()->of('book')->toJson();
            $datas = PatientPayment::where('patient_id', $request->id)->get();

            // $datas = PatientPayment::all();
            return datatables()->of($datas)
                ->addColumn('action', function ($datas) {
                    return
                        '<button class="btn btn-success btn-round btn-just-icon btn-sm editPayment-btn" id="' . $datas->id . '" > <i class="material-icons">edit</i> </button>

                        <button type="button" id="' . $datas->id . '" class="  btn btn-danger btn-round btn-just-icon btn-sm deletePayment "> <i class="material-icons">close</i>

                </button>
                ';
                })
                ->toJson();
        }
    }

    public function saveDebit(Request $request)
    {
        $data = new PatientPayment();
        $data->patient_id = $request->patient_id;
        // $data->credit=null;
        $data->debit = $request->debit;
        $data->date = $request->date;
        $data->description = $request->description;
        $data->save();

        return response()->json($data);
    }

    public function savecredit(Request $request)
    {
        $data = new PatientPayment();
        $data->patient_id = $request->patient_id;
        // $data->credit=null;
        $data->credit = $request->credit;
        $data->date = $request->date;
        $data->description = $request->description;
        $data->save();

        return response()->json($data);
    }

    public function expense($id)
    {
        $expense = Patient::find($id);

        return view('admin.patient.payment.credit', compact('expense'))->with('page_title', 'ثبت مبلغ قابل پرداخت بیمار');
    }

    public function delete(Request $request, PatientPayment $patientPayment)
    {
        $id = $request->id;
        $patientPayment = PatientPayment::find($id);
        $patientPayment->delete();
    }

    public function showData(Request $request)
    {
        if ($request->ajax()) {
            // $where = array('id' => $request->id);
            $getData = PatientPayment::where('id', $request->id)->first();
            // $data = PatientPayment::where($where)->first();

            return Response()->json($getData);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patient.payment.credit')->with('page_title', 'ثبت مبلغ دریافتی از بیمار');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientPayment $patientPayment)
    {
        dd($patientPayment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientPayment $patientPayment, $id)
    {
        $datas = PatientPayment::find($id);

        return response()->json($datas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientPayment $patientPayment)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, PatientPayment $patientPayment, $id)
    {
        $id = $request->id;
        $patientPayment = PatientPayment::find($id);
        // dd($patientPayment);
        // if (file_exists($patient->image)) {
        //     @unlink(public_path() . '/' . $patient->image);
        // }
        $patientPayment->delete();
        // session()->flash('success', 'بیمار انتخاب شده با موفقیت حذف گردید! .');
    }
}
