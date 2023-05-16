<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Karyawan;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class FormKaryawanController extends Controller
{
    //
    public function index()
    {
        return view('formkaryawan.viewkaryawan');
    }

    // view record
    public function viewRecord()
    {
        $data = DB::table('karyawan')->get();
        return view('viewkaryawan.lihatkaryawan',compact('data'));
    }

    // view detail
    public function viewDetail($id)
    {
        $data = DB::table('karyawan')->where('id',$id)->get();
        return view('viewkaryawan.lihatdetail',compact('data'));

    }

    // view update
    public function viewUpdate(Request $request)
    {
        try{
            $id           = $request->id;
            $rec_id       = $request->rec_id;
            $fullName     = $request->fullName;
            $sex          = $request->sex;
            $emailAddress = $request->emailAddress;
            $phone_number = $request->phone_number;
            $position     = $request->position;
            $department   = $request->department;
            $salary       = $request->salary;

            $update = [

                'id'            => $id,
                'rec_id'        => $rec_id,
                'full_name'     => $fullName,
                'sex'           => $sex,
                'email_address' => $emailAddress,
                'phone_number'  => $phone_number,
                'position'      => $position,
                'department'    => $department,
                'salary'        => $salary,
            ];
            Karyawan::where('id',$request->id)->update($update);
            Toastr::success('Data Berhasil di Update :)','Success');
            return redirect()->route('form/view/detail/karyawan');
        }catch(\Exception $e){

            Toastr::error('Data updated fail :)','Error');
            return redirect()->route('form/view/detail/karyawan');
        }
    }

    // save
    public function saveRecord(Request $request)
    {
        $request->validate([
            'fullName'     => 'required|string|max:255',
            'sex'          => 'required',
            'emailAddress' => 'required|string|email|max:255',
            'phone_number' => 'required|numeric|min:9',
            'position'     => 'required|string|max:255',
            'department'   => 'required|string|max:255',
            'salary'       => 'required|string|max:255',
        ]);
        try{
            $fullName     = $request->fullName;
            $sex          = $request->sex;
            $emailAddress = $request->emailAddress;
            $phone_number = $request->phone_number;
            $position     = $request->position;
            $department   = $request->department;
            $salary       = $request->salary;

            $Karyawan = new Karyawan();
            $Karyawan->full_name     = $fullName;
            $Karyawan->sex           = $sex;
            $Karyawan->email_address = $emailAddress;
            $Karyawan->phone_number  = $phone_number;
            $Karyawan->position      = $position;
            $Karyawan->department    = $department;
            $Karyawan->salary        = $salary;
            $Karyawan->save();

            Toastr::success('Data Berhasil Ditambahkan :)','Success');
            return redirect()->back();

        }catch(\Exception $e){

            Toastr::error('Data Gagal Ditambahkan :)','Error');
            return redirect()->back();
        }
    }

    // view delete
    public function viewDelete($id)
    {
        $delete = Karyawan::find($id);
        $delete->delete();
        Toastr::success('Data berhasil dihapus :)','Success');
        return redirect()->route('form/view/detail/karyawan');
    }
}
