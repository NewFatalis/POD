<?php

namespace App\Http\Controllers;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App;
class SectionController extends Controller
{

    public function section_elem(){
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $sections = DB::table('sections')
            ->select('sections.*')
            ->where('sections.group_id', '=', 3)
            ->get();
        return view('elementary.section.index',['sections' => $sections]);
    }
    public function add_section_elem(Request $request){
        if ($request->isMethod('post')) {
            $section = new Section();
            $section->fill($request->all());
            $section->group_id = Auth::user()['group_id'];
            if($section->save()){
                Session::flash('message','Your section has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/elementary/section/');
            }
        }
    }

    public function delete_section_elem($id) {
        $section = Section::find($id);
           if ($section) {
               $section->delete();
                Session::flash('message','Your section has been deleted!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/elementary/section/');
           } else {
                return redirect('/elementary/section/');
           }
    }


    public function update_section_elem(Request $request) {
        $update = Section::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your section has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elementary/section/');
        } else {
            return redirect('/elementary/section/');
        }
    }

    //Senior high

    /**
     * Senior high section dashboard
     */
    public function section_senior(){
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $sections = DB::table('sections')
            ->select('sections.*')
            ->where('sections.group_id', '=', 1)
            ->get();
        return view('senior.section.index',['sections' => $sections]);
    }

    /**
     * Senior high add section
     */
    public function add_section_senior(Request $request){
        if ($request->isMethod('post')) {
            $section = new Section();
            $section->fill($request->all());
            $section->group_id = 1;
            if($section->save()){
                Session::flash('message','Your section has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/senior/section/');
            }
        }
    }

    /**
     * Senior high delete section
     */
    public function delete_section_senior($id) {
        $section = Section::find($id);
           if ($section) {
               $section->delete();
                Session::flash('message','Your section has been deleted!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/senior/section/');
           } else {
                return redirect('/senior/section/');
           }
    }

    /**
     * Senior high update section
     */
    public function update_section_senior(Request $request) {
        $update = Section::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your section has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/section/');
        } else {
            return redirect('/senior/section/');
        }
    }

    //Junior high

    /**
     * Junior high section dashboard
     */
    public function section_junior(){
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $sections = DB::table('sections')
            ->select('sections.*')
            ->where('sections.group_id', '=', 2)
            ->get();
        return view('junior.section.index',['sections' => $sections]);
    }

    /**
     * Junior high add section
     */
    public function add_section_junior(Request $request){
        if ($request->isMethod('post')) {
            $section = new Section();
            $section->fill($request->all());
            $section->group_id = 2;
            if($section->save()){
                Session::flash('message','Your section has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/junior/section/');
            }
        }
    }

    /**
     * Junior high delete section
     */
    public function delete_section_junior($id) {
        $section = Section::find($id);
           if ($section) {
               $section->delete();
                Session::flash('message','Your violation has been deleted!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/junior/section/');
           } else {
                return redirect('/junior/section/');
           }
    }

    /**
     * Junior high update section
     */
    public function update_section_junior(Request $request) {
        $update = Section::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your student has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/junior/section/');
        } else {
            return redirect('/junior/section/');
        }
    }
}
