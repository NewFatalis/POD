<?php

namespace App\Http\Controllers;
use App\Adviser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App;
class AdviserController extends Controller
{

    //Elementary

    /**
     * Elem adviser dashboard
     */
    public function adviser_elem(){
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $advisers = DB::table('advisers')
            ->select('advisers.*')
            ->where('advisers.group_id', '=', 3)
            ->get();
        return view('elementary.adviser.index',['advisers' => $advisers]);
    }

    /**
     * Elem add adviser
     */
    public function add_adviser_elem(Request $request){
        if ($request->isMethod('post')) {
            $adviser = new Adviser();
            $adviser->fill($request->all());
            $adviser->group_id = 3;
            if($adviser->save()){
                Session::flash('message','Your adviser has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/elem/adviser/');
            }
        }
    }

    /**
     * Elem delete adviser
     */
     public function delete_adviser_elem($id) {
        $adviser = Adviser::find($id);
           if ($adviser) {
               $adviser->delete();
                Session::flash('message','Your adviser has been deleted!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/elem/adviser/');
           } else {
                return redirect('/elem/adviser/');
           }
    }

    /**
     * Elem update adviser
     */
    public function update_adviser_elem(Request $request) {
        $update = Adviser::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your adviser has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elem/adviser/');
        } else {
            return redirect('/elem/adviser/');
        }
    }

    //Junior high

    /**
     * Junior high adviser dashboard
     */
    public function adviser_junior(){
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $advisers = DB::table('advisers')
            ->select('advisers.*')
            ->where('advisers.group_id', '=', 2)
            ->get();
        return view('junior.adviser.index',['advisers' => $advisers]);
    }

    /**
     * Junior high add adviser
     */
    public function add_adviser_junior(Request $request){
        if ($request->isMethod('post')) {
            $adviser = new Adviser();
            $adviser->fill($request->all());
            $adviser->group_id = 2;
            if($adviser->save()){
                Session::flash('message','Your adviser has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/junior/adviser/');
            }
        }
    }

    /**
     * Junior high delete adviser
     */
    public function delete_adviser_junior($id) {
        $adviser = Adviser::find($id);
           if ($adviser) {
               $adviser->delete();
                Session::flash('message','Your adviser has been deleted!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/junior/adviser/');
           } else {
                return redirect('/junior/adviser/');
           }
    }

    /**
     * Junior high update adviser
     */
    public function update_adviser_junior(Request $request) {
        $update = Adviser::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your adviser has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/junior/adviser/');
        } else {
            return redirect('/junior/adviser/');
        }
    }   

    //Senior High School

    /**
     * Senior adviser dashboard
     */
    public function adviser_senior(){
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $advisers = DB::table('advisers')
            ->select('advisers.*')
            ->where('advisers.group_id', '=', 1)
            ->get();
        return view('senior.adviser.index',['advisers' => $advisers]);
    }

    /**
     * Senior add adviser
     */
    public function add_adviser_senior(Request $request){
        if ($request->isMethod('post')) {
            $adviser = new Adviser();
            $adviser->fill($request->all());
            $adviser->group_id = 1;
            if($adviser->save()){
                Session::flash('message','Your adviser has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/senior/adviser/');
            }
        }
    }

    /**
     * Senior delete adviser
     */
     public function delete_adviser_senior($id) {
        $adviser = Adviser::find($id);
           if ($adviser) {
               $adviser->delete();
                Session::flash('message','Your adviser has been deleted!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/senior/adviser/');
           } else {
                return redirect('/senior/adviser/');
           }
    }

    /**
     * Senior update adviser
     */
    public function update_adviser_senior(Request $request) {
        $update = Adviser::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your adviser has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/adviser/');
        } else {
            return redirect('/senior/adviser/');
        }
    }
}
