<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use DB;

class KaryawanController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        //
        return view('formkaryawan.formkaryawan');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function viewRecord()
    {
        $data = DB::table('karyawan')->get();
        return view('view_karyawan.viewrecord',compact('data'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function viewDetail($id)
    {
        //
        $data = DB::table('karyawan')->where('id',$id)->get();
        return view('view_karyawan.viewdetail',compact('data'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Karyawan  $karyawan
    //  * @return \Illuminate\Http\Response
    //  */
    public function viewUpdate(Request $request)
    {
        //
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
            Toastr::success('Data updated successfully :)','Success');
            return redirect()->route('karyawan/view/detail');
        }catch(\Exception $e){

            Toastr::error('Data updated fail :)','Error');
            return redirect()->route('karyawan/view/detail');
        }
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateKaryawanRequest  $request
    //  * @param  \App\Models\Karyawan  $karyawan
    //  * @return \Illuminate\Http\Response
    //  */

    public function saveRecord(Request $request)
    {
        //
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

            Toastr::success('Data added successfully :)','Success');
            return redirect()->back();

        }catch(\Exception $e){

            Toastr::error('Data added fail :)','Error');
            return redirect()->back();
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Karyawan  $karyawan
    //  * @return \Illuminate\Http\Response
    //  */
    public function viewDelete($id)
    {
        //
        $delete = Karyawan::find($id);
        $delete->delete();
        Toastr::success('Data berhasil dihapus :)','Success');
        return redirect()->route('karyawan/view/detail');
    }
}
