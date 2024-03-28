<?php

namespace App\Http\Controllers;

use App\Models\Dental;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Systemic;
use App\Models\SystemicDisease;
use Illuminate\Http\Request;
// use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;
// use Yajra\DataTables\Facades\DataTables;
// use Yajra\DataTables\Contracts\DataTable;
// use Yajra\DataTables\Facades\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function reg_number()
    {
        if (Patient::orderBy('created_at', 'desc')->first()) {
            $getId = Patient::orderBy('created_at', 'desc')->first()->id;
            $regNum = $getId + 1;
            $uniqueId = str_pad($regNum, 5, '0', STR_PAD_LEFT);
            $date = Jalalian::forge('today')->format(' %Y');
            $newNum = $date.$uniqueId;

            return $newNum;
        } else {
            $uniqueId = str_pad(1, 5, '0', STR_PAD_LEFT);
            $date = Jalalian::forge('today')->format(' %Y');
            $newNum = $date.$uniqueId;

            return $newNum;
        }
    }

    public function index()
    {
        return view('admin.patient.index')->with('page_title', 'پرونده بیماران ثبت شده');
    }

    public function getData(Request $request)
    {
        $patient = Patient::all();

        // dd($patient->id);
        // dd($patient->id);
        return Datatables::of($patient)
            ->addColumn('action', function ($patient) {
                // return '<a href="#" class="btn btn-xs btn-primary edit" id="' . $patient->id . '"><i class="bi bi-pencil-square"></i> Edit</a> <a href="#" class="btn btn-xs btn-danger delete" id="' . $patient->id . '"><i class="bi bi-backspace-reverse-fill"></i> Delete</a>';
                return '<div class="btn-group">
                            <button type="button"
                                class="btn btn-info dropdown-toggle waves-effect waves-light dropdown-btn "
                                data-toggle="dropdown" aria-expanded="false">عملیات<i
                                    class="mdi mdi-chevron-down"></i></button>
                            <div class="dropdown-menu action-menu" x-placement="bottom-start"
                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                <!-- item-->
                                <a type="button" href="#"
                                    id="'.$patient->id.'"
                                    class="dropdown-item action-menu deleteIcon">حذف
                                     <li class=" fas fa-trash "></li></a>
                                <a href="'.route('patientPayment.payment', ['id' => $patient->id]).'" id="payment_id" at="'.$patient->id.'"
                                    class="dropdown-item action-menu payment_id"> پرونده مالی  <li class=" far fa-money-bill-alt "></li></a>
                                <a href="javascript:void(0);" class="dropdown-item action-menu">نوبت دهی <li class="  fas fa-calendar-check  "></li></a>
                                <a href="'.route('patient.treatment', ['id' => $patient->id]).'" class="dropdown-item action-menu">ثبت تداوی <li class=" fas fa-briefcase-medical "></li></a>
                                <a href="'.route('patient.details', ['id' => $patient->id]).'" class="dropdown-item">جزئیات <li class="fas fa-info"></li></a>
                            </div>
                        </div>';
            })
            ->addColumn('checkbox', '')
            // ->rawColumns(['checkbox', 'action'])
            ->make(true);
    }

    public function delete(Request $request, Patient $patient)
    {
        $id = $request->id;
        $patient = Patient::find($id);
        if (file_exists($patient->image)) {
            @unlink(public_path().'/'.$patient->image);
        }
        $patient->delete();
        session()->flash('success', 'بیمار انتخاب شده با موفقیت حذف گردید! .');
    }

    public function details($id)
    {
        $patient = Patient::find($id);
        $dental = Dental::all();
        // dd($patient->SystemicDisease->id);
        // dd($patient->systemicDisease_id);

        return view('admin.patient.details', compact('patient', 'dental'));
    }

    public function changeStatus(Request $request, Patient $patient)
    {
        $getpatient = Patient::find($request->id);
        $getpatient->status = $request->status;
        $getpatient->save();
        session()->flash('success', 'بیمار انتخاب شده با موفقیت ویرایش شد.');

        return redirect(route('patient.details', ['id' => $request->id]));
    }

    public function treatment($id)
    {
        return view('admin.patient.treatment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctor = Doctor::all();
        $systemic = Systemic::all();
        $patientLastId = Patient::orderBy('created_at', 'desc')->first();

        // dd($patientLastId);
        return view('admin.patient.create', compact('doctor'))->with(compact('patientLastId'))->with(compact('systemic'))->with('page_title', 'افزون بیمار جدید در سیستم');
    }

    public function easyCreate()
    {
        return view('admin.patient.easyCreate')->with('page_title', 'افزون سریع بیمار');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'regNumber' => 'required',
        //     'name' => 'required',
        //     'lastName' => 'required',
        //     'fatherName' => 'nullable',
        //     'doctor_id' => 'nullable',
        //     'phone' => 'required |min:10|max:10',
        //     'age' => 'nullable',
        //     'IDNumber' => 'nullable',
        //     'bloodType' => 'nullable',
        //     'address' => 'nullable',
        //     'education' => 'nullable',
        //     'registrationDate' => 'required',
        //     'image' => 'nullable',
        //     'systemicDisease_id' => 'nullable',
        //     'systemicDisease_description' => 'nullable',
        //     'surgeryHistory' => 'nullable',
        //     'gender' => 'nullable',
        //     'status' => 'nullable',
        //     'pregnant' => 'nullable',
        //     'marriage' => 'nullable'

        // ], [
        //     'name.required' => 'اسم بیمار الزامی است.',
        //     'lastName.required' => 'تخلص بیمار الزامی است.',
        //     'phone.required' => 'شماره تماس بیمار الزامی است و شامل 10 رقم می باشد.',
        //     'phone.min' => 'شماره تماس باید کمتر از 10 رقم نباشد.',
        //     'phone.max' => 'شماره تماس باید از 10 رقم بیشتر نباشد.',
        //     'registrationDate.required' => 'لطفا تاریخ ثبت را انتخاب کنید.'
        // ]);
        // dd($validate);
        $patient = new Patient();
        $patient['regNumber'] = $this->reg_number();
        $patient['name'] = $request->name;
        $patient['lastName'] = $request->lastName;
        $patient['fatherName'] = $request->fatherName;
        $patient['doctor_id'] = $request->doctor_id;
        $patient['phone'] = $request->phone;
        $patient['age'] = $request->age;
        $patient['IDNumber'] = $request->IDNumber;
        $patient['bloodType'] = $request->bloodType;
        $patient['address'] = $request->address;
        $patient['education'] = $request->education;
        $patient['registrationDate'] = $request->registrationDate;
        $patient['systemic_id'] = $request->systemic_id;
        $patient['systemicDisease_description'] = $request->systemicDisease_description;
        $patient['surgeryHistory'] = $request->surgeryHistory;
        $patient['gender'] = $request->gender;
        $patient['pregnant'] = $request->pregnant;
        $patient['marriage'] = $request->marriage;
        if ($request->image) {
            $fileName = $request->name.$request->lastName.date('Ymd_his').rand(10, 10000).'.'.$request->image->extension();
            $request->image->storeAs('/photos/patient', $fileName, 'public');
            $patient['image'] = '/storage/photos/patient/'.$fileName;
        }
        $patient->save();

        session()->flash('success', 'بیمار جدید با موفقیت ثبت گردید.');

        return redirect(route('patient.index'));
        // $vali->save();
        // Patient::create([
        //     'regNumber' => $this->reg_number(),
        //     'name' => $request->name,
        //     'lastName' => $request->lastName,
        //     'fatherName' => $request->fatherName,
        //     'doctor_id' => $request->doctor_id,
        //     'phone' => $request->phone,
        //     'birthDay' => $request->birthDay,
        //     'IDNumber' => $request->IDNumber,
        //     'bloodType' => $request->bloodType,
        //     'address' => $request->address,
        //     'education' => $request->education,
        //     'registrationDate' => $request->registrationDate,
        //     'image' => $request->image,
        //     'systemicDesease_id' => $request->systemicDesease_id,
        //     'systemicDesease_description' => $request->systemicDesease_description,
        //     'surgeryHistory' => $request->surgeryHistory,
        //     'gender' => $request->gender,
        //     'pregnant' => $request->pregnant,
        //     'marriage' => $request->marriage
        // ]);
    }

    public function newPatient(Request $request)
    {
        $data = new Patient();
        // Patient::create($request->all());
        // return 'ned patient method';
        $data->regNumber = $this->reg_number();
        $data->name = $request->name;
        $data->lastName = $request->lastName;
        $data->phone = $request->phone;
        $data->registrationDate = $request->registrationDate;
        $data->save();

        // $request->validate([
        //     'name' => 'required',
        //     'lastName' => 'required',
        //     'phone' => 'required',
        //     'registrationDate' => 'required',
        // ]);
        // Patient::create($request->all());
        // return response()->json(['success'=>'بیمار جدید با موفقیت اضافه گردید.']);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $doctor = Doctor::all();

        return view('admin.patient.show', compact('patient'), compact('doctor'))->with('page_title', 'ویرایش بیمار انتخاب شده!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        dd($patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $patient->fill($request->validate([
            'name' => 'required',
            'lastName' => 'required',
            'fatherName' => 'nullable',
            'phone1' => 'required |min:10|min:10|max:10',
            'phone2' => 'nullable',
            'doctor_id' => 'required',
            'gender' => 'nullable',
            'registrationDate' => 'required',
        ]))->save();
        session()->flash('success', 'بیمار انتخاب شده با موفقیت ویرایش شد.');

        return redirect(route('patient.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        // dd('book');
        // Patient::where('id', $id)->delete();
        $patient->delete();
        session()->flash('success', 'بیمار انتخاب شده با موفقیت حذف گردید! .');
        Alert::success('welcom', 'book');

        return back()->with('message', 'سطر انتخاب شده با موفقیت حذف گردید.');
        // return response()->json(['message' => 'Action successful!']);
    }

    public function action(Request $request)
    {
        // $patient = Patient::all();

        $query = $request->input('query');
        $results = Patient::where('name', 'like', "%$query%")->paginate(10); // Adjust the column_name according to your database schema

        return response()->json($results);
    }
}
