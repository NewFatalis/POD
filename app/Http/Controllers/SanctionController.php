<?php

namespace App\Http\Controllers;
use App\Sanction;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SanctionController extends Controller
{

    //Elementary school

    /**
     * Elem sanction
     */
    public function sanction_elem() {
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $sanction = DB::table('sanctions')
            ->select('sanctions.*')
            ->where('sanctions.group_id', '=', 3)
            ->get();
        return view('elementary.sanctions.index',['sanctions' => $sanction]);
    }

    /**
     * Elem adding sanction
     */
    public function add_sanction_elem(Request $request) {
         if ($request->isMethod('post')) {
            $sanction = new Sanction();
            $sanction->fill($request->all());
             $sanction->group_id = 3;
            if ($sanction->save()) {
                Session::flash('message','Your sanction has been succesfully added!');
                Session::flash('alert-class', 'alert-info'); 
            } else {
                Session::flash('message','Your sanction has been failed to saved!');
                Session::flash('alert-class', 'alert-danger'); 
            }
            return redirect('/elem/sanction/');
        }
    }

    /**
     * Elem delete sanction
     */
    public function delete_sanction_elem($id) {
        $sanction = Sanction::find($id);
        if ($sanction) {
            $sanction->delete();
            Session::flash('message','Your sanction has been deleted!');
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('/elem/sanction/');
        } else {
            return redirect('/elem/sanction/');
        }
    }

    /**
     * Elem update sanction
     */
    public function update_sanction_elem(Request $request) {
        $update = Sanction::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your sanction has been succesfully update!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/elem/sanction/');
        } else {
            return redirect('/elem/sanction/');
        }
    }

    //Junior high school

    /**
     * Junior high sanction
     */
    public function sanction_junior() {
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $sanction = DB::table('sanctions')
            ->select('sanctions.*')
            ->where('sanctions.group_id', '=', 2)
            ->get();
        return view('junior.sanctions.index',['sanctions' => $sanction]);
    }

    /**
     * Junior high adding sanction
     */
    public function add_sanction_junior(Request $request) {
         if ($request->isMethod('post')) {
            $sanction = new Sanction();
            $sanction->fill($request->all());
             $sanction->group_id = 2;
            if ($sanction->save()) {
                Session::flash('message','Your sanction has been succesfully added!');
                Session::flash('alert-class', 'alert-info'); 
            } else {
                Session::flash('message','Your sanction has been failed to saved!');
                Session::flash('alert-class', 'alert-danger'); 
            }
            return redirect('/junior/sanction/');
        }
    }

    /**
     * Junior high delete sanction
     */
    public function delete_sanction_junior($id) {
        $sanction = Sanction::find($id);
        if ($sanction) {
            $sanction->delete();
            Session::flash('message','Your sanction has been deleted!');
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('/junior/sanction/');
        } else {
            return redirect('/junior/sanction/');
        }
    }

    /**
     * Junior high update sanction
     */
    public function update_sanction_junior(Request $request) {
        $update = Sanction::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your sanction has been succesfully update!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/junior/sanction/');
        } else {
            return redirect('/junior/sanction/');
        }
    }

     //Senior high school

    /**
     * Senior high sanction
     */
    public function sanction_senior() {
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $sanction = DB::table('sanctions')
            ->select('sanctions.*')
            ->where('sanctions.group_id', '=', 1)
            ->get();
        return view('senior.sanctions.index',['sanctions' => $sanction]);
    }

    /**
     * Senior high adding sanction
     */
    public function add_sanction_senior(Request $request) {
         if ($request->isMethod('post')) {
            $sanction = new Sanction();
            $sanction->fill($request->all());
             $sanction->group_id = 1;
            if ($sanction->save()) {
                Session::flash('message','Your sanction has been succesfully added!');
                Session::flash('alert-class', 'alert-info'); 
            } else {
                Session::flash('message','Your sanction has been failed to saved!');
                Session::flash('alert-class', 'alert-danger'); 
            }
            return redirect('/senior/sanction/');
        }
    }

    /**
     * Senior high delete sanction
     */
    public function delete_sanction_senior($id) {
        $sanction = Sanction::find($id);
        if ($sanction) {
            $sanction->delete();
            Session::flash('message','Your sanction has been deleted!');
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('/senior/sanction/');
        } else {
            return redirect('/senior/sanction/');
        }
    }

    /**
     * Senior high update sanction
     */
    public function update_sanction_senior(Request $request) {
        $update = Sanction::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your sanction has been succesfully update!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/senior/sanction/');
        } else {
            return redirect('/senior/sanction/');
        }
    }
}
