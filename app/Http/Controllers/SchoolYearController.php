<?php

namespace App\Http\Controllers;
use App\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
class SchoolYearController extends Controller
{

    public function schoolyear_elem(){
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $school_years = DB::table('school_years')
            ->select('school_years.*')
            ->where('school_years.group_id', '=', 3)
            ->get();
        return view('elementary.schoolyear.index',['school_years' => $school_years]);
    }

    public function add_schoolyear_elem(Request $request){
        if ($request->isMethod('post')) {
            $schoolyear = new SchoolYear();
            $schoolyear->school_year = $request['school_year'];
            $schoolyear->group_id = 3;
            if($schoolyear->save()){
                Session::flash('message','Your school year has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/elementary/schoolyear/');
            }

        }
    }

    public function delete_sy_elem($id) {

        $sy = SchoolYear::find($id);
        if ($sy) {
            $sy->delete();
            Session::flash('message','Your school year has been deleted!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elementary/schoolyear/');
        } else {
            return redirect('/elementary/schoolyear/');
        }
    }

    public function update_sy_elem(Request $request) {
        $update = SchoolYear::find($request['id']);
        if ($update) {
            $update->school_year = $request['school_year'];
            $update->save();
            Session::flash('message','Your school year has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elementary/schoolyear/');
        } else {
            return redirect('/elementary/schoolyear/');
        }
    }

    //Senior high

    /**
     * Senior high school year dashboard
     */
    public function schoolyear_senior(){
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $school_years = DB::table('school_years')
            ->select('school_years.*')
            ->where('school_years.group_id', '=', 1)
            ->get();
        return view('senior.schoolyear.index',['school_years' => $school_years]);
    }
    
    /**
     * Senior high school year add
     */
    public function add_schoolyear_senior(Request $request){
        if ($request->isMethod('post')) {
            $schoolyear = new SchoolYear();
            $schoolyear->school_year = $request['school_year'];
            $schoolyear->group_id = 1;
            if($schoolyear->save()){
                Session::flash('message','Your school year has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/senior/schoolyear/');
            }

        }
    }

    /**
     * Senior high school year delete
     */
    public function delete_sy_senior($id) {

        $sy = SchoolYear::find($id);
        if ($sy) {
            $sy->delete();
            Session::flash('message','Your school year has been deleted!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/schoolyear/');
        } else {
            return redirect('/senior/schoolyear/');
        }
    }

    /**
     * Senior high school year update
     */
    public function update_sy_senior(Request $request) {
        $update = SchoolYear::find($request['id']);
        if ($update) {
            $update->school_year = $request['school_year'];
            $update->save();
            Session::flash('message','Your school year has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/schoolyear/');
        } else {
            return redirect('/senior/schoolyear/');
        }
    }

    //Junior high

    /**
     * Junior high school year dashboard
     */
    public function schoolyear_junior(){
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $school_years = DB::table('school_years')
            ->select('school_years.*')
            ->where('school_years.group_id', '=', 2)
            ->get();
        return view('junior.schoolyear.index',['school_years' => $school_years]);
    }
    
    /**
     * Junior high school year add
     */
    public function add_schoolyear_junior(Request $request){

        if ($request->isMethod('post')) {
            $schoolyear = new SchoolYear();
            $schoolyear->school_year = $request['school_year'];
            $schoolyear->group_id = 2;
            if($schoolyear->save()){
                Session::flash('message','Your school year has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/junior/schoolyear/');
            }

        }
    }

    /**
     * Junior high school year delete
     */
    public function delete_sy_junior($id) {

        $sy = SchoolYear::find($id);
        if ($sy) {
            $sy->delete();
            Session::flash('message','Your school year has been deleted!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/junior/schoolyear/');
        } else {
            return redirect('/junior/schoolyear/');
        }
    }

    /**
     * Junior high school year update
     */
    public function update_sy_junior(Request $request) {
        $update = SchoolYear::find($request['id']);
        if ($update) {
            $update->school_year = $request['school_year'];
            $update->save();
            Session::flash('message','Your school year has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/junior/schoolyear/');
        } else {
            return redirect('/junior/schoolyear/');
        }
    }
}
