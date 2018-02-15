<?php

namespace App\Http\Controllers;
use App\Violation;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ViolationController extends Controller
{
    public function violation_elem() {
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
    	$violation = DB::table('violations')
            ->select('violations.*')
            ->where('violations.group_id', '=', 3)
            ->get();
        return view('elementary.violations.index',['violations' => $violation]);
    }

    public function add_violation_elem(Request $request) {
    	 if ($request->isMethod('post')) {
            $violation = new Violation();
            $violation->fill($request->all());
            $violation->group_id = Auth::user()['group_id'];
            if ($violation->save()) {
            	Session::flash('message','Your violation has been succesfully added!');
    			Session::flash('alert-class', 'alert-info'); 
            } else {
            	Session::flash('message','Your violation has been failed to saved!');
    			Session::flash('alert-class', 'alert-danger'); 
            }
            return redirect('/elementary/violation/');
        }
    }

    public function delete_violation_elem($id) {
    	$violation = Violation::find($id);
    	if ($violation) {
    		$violation->delete();
    		Session::flash('message','Your violation has been deleted!');
    		Session::flash('alert-class', 'alert-info'); 
    		return redirect('/elementary/violation/');
    	} else {
    		return redirect('/elementary/violation/');
    	}
    }

    public function update_violation_elem(Request $request) {
    	$update = Violation::find($request['id']);
    	if ($update) {
    		$update->fill($request->all());
    		$update->save();
    		Session::flash('message','Your violation has been succesfully update!');
    		Session::flash('alert-class', 'alert-info'); 
    		return redirect('/elementary/violation/');
    	} else {
    		return redirect('/elementary/violation/');
    	}
    }

    //Senior high school

    /**
     * Senior high violation
     */
    public function violation_senior() {
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $violation = DB::table('violations')
            ->select('violations.*')
            ->where('violations.group_id', '=', 1)
            ->get();
        return view('senior.violations.index',['violations' => $violation]);
    }

    /**
     * Senior high adding violation
     */
    public function add_violation_senior(Request $request) {
         if ($request->isMethod('post')) {
            $violation = new Violation();
            $violation->fill($request->all());
            if ($violation->save()) {
                Session::flash('message','Your violation has been succesfully added!');
                Session::flash('alert-class', 'alert-info'); 
            } else {
                Session::flash('message','Your violation has been failed to saved!');
                Session::flash('alert-class', 'alert-danger'); 
            }
            return redirect('/senior/violation/');
        }
    }

    /**
     * Senior high delete violation
     */
    public function delete_violation_senior($id) {
        $violation = Violation::find($id);
        if ($violation) {
            $violation->delete();
            Session::flash('message','Your violation has been deleted!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/senior/violation/');
        } else {
            return redirect('/senior/violation/');
        }
    }

    /**
     * Senior high update violation
     */
    public function update_violation_senior(Request $request) {
        $update = Violation::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your violation has been succesfully update!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/senior/violation/');
        } else {
            return redirect('/senior/violation/');
        }
    }

    //Junior high school

    /**
     * Junior high violation
     */
    public function violation_junior() {
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $violation = DB::table('violations')
            ->select('violations.*')
            ->where('violations.group_id', '=', 2)
            ->get();
        return view('junior.violations.index',['violations' => $violation]);
    }

    /**
     * Junior high adding violation
     */
    public function add_violation_junior(Request $request) {
         if ($request->isMethod('post')) {
            $violation = new Violation();
            $violation->fill($request->all());
             $violation->group_id = 2;
            if ($violation->save()) {
                Session::flash('message','Your violation has been succesfully added!');
                Session::flash('alert-class', 'alert-info'); 
            } else {
                Session::flash('message','Your violation has been failed to saved!');
                Session::flash('alert-class', 'alert-danger'); 
            }
            return redirect('/junior/violation/');
        }
    }

    /**
     * Junior high delete violation
     */
    public function delete_violation_junior($id) {
        $violation = Violation::find($id);
        if ($violation) {
            $violation->delete();
            Session::flash('message','Your violation has been deleted!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/junior/violation/');
        } else {
            return redirect('/junior/violation/');
        }
    }

    /**
     * Junior high update violation
     */
    public function update_violation_junior(Request $request) {
        $update = Violation::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your violation has been succesfully update!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/junior/violation/');
        } else {
            return redirect('/junior/violation/');
        }
    }
}
