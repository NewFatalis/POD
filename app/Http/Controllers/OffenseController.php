<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Offense;
use App\Student;

use App\SchoolYear;
use App\Section;
use DB;
use App\Violation;
use Illuminate\Support\Facades\Session;
use Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class OffenseController extends Controller
{
    public function offense_elem(){
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $students = DB::table('students')
            ->join('school_years', 'students.sy_id', '=', 'school_years.id')
            ->select('students.*', 'school_years.school_year')
            ->where('students.group_id', '=', 3)
            ->get();
        $violations =  DB::table('violations')
            ->select('violations.*')
            ->where('violations.group_id', '=', 3)
            ->get();
        return view('elementary.stud_offense.index',['violations' => $violations, 'students' => $students]);
    }

    public function offense_records_elem(){
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $sections = DB::table('sections')
            ->select('sections.*')
            ->where('sections.group_id', '=', 3)
            ->get();
        $school_years = DB::table('school_years')
            ->select('school_years.*')
            ->where('school_years.group_id', '=', 3)
            ->get();
        $offenses= DB::table('offenses')
            ->join('students', 'offenses.student_id', '=', 'students.student_id')
            ->join('violations', 'offenses.violation_id', '=', 'violations.id')
            ->join('school_years','students.sy_id', '=', 'school_years.id')
            ->join('sections','students.section_id', '=', 'sections.id')
            ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
            ->where('students.group_id', '=', 3)
            ->get();
        return view('elementary.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
    }


    public function add_offense_elem(Request $request){
        if ($request->isMethod('post')) {
            $data = [];
            if(empty($request->persons_involve) ) {
                Session::flash('message','Persons involved is required');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/elementary/offense/');
            }
            foreach($request->persons_involve as $person_involve) {
                unset($request['datatable_length']);
                unset($request['violation']);
                $student = Student::where('student_id', $person_involve)->first();
                $data = [
                    'student_id'      => $person_involve,
                    'date_commit'     => $request->date_commit,
                    'violation_id'    => $request->violation_id,
                    'student_offense' => $request->student_offense,
                    'description'     => $request->description,
                    'sanction'       => $request->sanction,
                    'schoolyear_id'  => $student->sy_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                Offense::insert($data);
            }

            Session::flash('message','Your student offense has been succesfully added!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elementary/offense/');
        }
    }

    //Senior high school

    /**
     * Senior high offenses
     */
    public function offense_senior(){
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $students = DB::table('students')
            ->join('school_years', 'students.sy_id', '=', 'school_years.id')
            ->select('students.*', 'school_years.school_year')
            ->where('students.group_id', '=', 1)
            ->get();
        $violations =  DB::table('violations')
            ->select('violations.*')
            ->where('violations.group_id', '=', 1)
            ->get();
        return view('senior.stud_offense.index',['violations' => $violations, 'students' => $students]);
    }

    /**
     * Senior high offense record
     */
    public function offense_records_senior(){
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $sections = DB::table('sections')
            ->select('sections.*')
            ->where('sections.group_id', '=', 1)
            ->get();
        $school_years = DB::table('school_years')
            ->select('school_years.*')
            ->where('school_years.group_id', '=', 1)
            ->get();
        $offenses= DB::table('offenses')
            ->join('students', 'offenses.student_id', '=', 'students.student_id')
            ->join('violations', 'offenses.violation_id', '=', 'violations.id')
            ->join('school_years','students.sy_id', '=', 'school_years.id')
            ->join('sections','students.section_id', '=', 'sections.id')
            ->selectRaw('students.first_name,students.middle_name,students.last_name,students.adviser, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
            ->where('students.group_id', '=', 1)
            ->get();

        return view('senior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
    }

    /**
     * Senior high add offense
     */
    public function add_offense_senior(Request $request){
        if ($request->isMethod('post')) {
            $data = [];
            if(empty($request->persons_involve) ) {
                Session::flash('message','Persons involved is required');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/senior/offense/');
            }
            foreach($request->persons_involve as $person_involve) {
                unset($request['datatable_length']);
                unset($request['violation']);
                $student = Student::where('student_id', $person_involve)->first();
                $data = [
                    'student_id'      => $person_involve,
                    'date_commit'     => $request->date_commit,
                    'violation_id'    => $request->violation_id,
                    'student_offense' => $request->student_offense,
                    'description'     => $request->description,
                    'sanction'       => $request->sanction,
                    'schoolyear_id'  => $student->sy_id,
                    'class_id'  => $student->class,
                    'semester_id'    => $student->semester,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                Offense::insert($data);
            }

            Session::flash('message','Your student offense has been succesfully added!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/offense/');
        }
    }

    //Junior high school

    /**
     * Junior high offenses
     */
    public function offense_junior(){
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $students = DB::table('students')
            ->join('school_years', 'students.sy_id', '=', 'school_years.id')
            ->select('students.*', 'school_years.school_year')
            ->where('students.group_id', '=', 2)
            ->get();
        $violations =  DB::table('violations')
            ->select('violations.*')
            ->where('violations.group_id', '=', 2)
            ->get();
        return view('junior.stud_offense.index',[
            'violations' => $violations, 
            'students' => $students
        ]);
    }

    /**
     * Junior high offense record
     */
    public function offense_records_junior(){
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $sections = DB::table('sections')
            ->select('sections.*')
            ->where('sections.group_id', '=', 2)
            ->get();
        $school_years = DB::table('school_years')
            ->select('school_years.*')
            ->where('school_years.group_id', '=', 2)
            ->get();
        $offenses= DB::table('offenses')
            ->join('students', 'offenses.student_id', '=', 'students.student_id')
            ->join('violations', 'offenses.violation_id', '=', 'violations.id')
            ->join('school_years','students.sy_id', '=', 'school_years.id')
            ->join('sections','students.section_id', '=', 'sections.id')
            ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
            ->where('students.group_id', '=', 2)
            ->get();
        return view('junior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
    }

    /**
     * Junior high add offense
     */
    public function add_offense_junior(Request $request){
        if ($request->isMethod('post')) {
            $data = [];
            if(empty($request->persons_involve) ) {
                Session::flash('message','Persons involved is required');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/junior/offense/');
            }
            foreach($request->persons_involve as $person_involve) {
                unset($request['datatable_length']);
                unset($request['violation']);
                $student = Student::find(1)->where('student_id', '=', $person_involve)->first();
                $data = [
                    'student_id'      => $person_involve,
                    'date_commit'     => $request->date_commit,
                    'violation_id'    => $request->violation_id,
                    'student_offense' => $request->student_offense,
                    'description'     => $request->description,
                    'sanction'       => $request->sanction,
                    'schoolyear_id'  => $student->first_name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                Offense::insert($data);
            }

            Session::flash('message','Your student offense has been succesfully added!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/junior/offense/');
        }
    }

    public function search_elem_offense(Request $request)
    {
        if ($request->isMethod('get')) {
            if(!empty($request->sy) && !empty($request->section)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 3)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 3)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 3],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('elementary.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(!empty($request->section)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 3)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 3)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 3],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('elementary.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(!empty($request->sy)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 3)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 3)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 3],['students.sy_id','=', $request->sy]])
                    ->get();
                return view('elementary.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 3)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 3)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where('students.group_id', '=', 3)
                    ->get();
                return view('elementary.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
        }
    }

    public function search_junior_offense(Request $request)
    {
        if ($request->isMethod('get')) {
            if(!empty($request->sy) && !empty($request->section)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 2)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 2)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 2],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('junior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(!empty($request->section)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 2)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 2)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 2],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('junior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(!empty($request->sy)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 2)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 2)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 2],['students.sy_id','=', $request->sy]])
                    ->get();
                return view('junior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 2)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 2)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where('students.group_id', '=', 2)
                    ->get();
                return view('junior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
        }
    }

    public function search_senior_offense(Request $request)
    {
        if ($request->isMethod('get')) {
            if(!empty($request->sy) && !empty($request->section) &&  !empty($request->semester)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 1)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 1],['students.semester', '=', $request->semester],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('senior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(!empty($request->sy) && !empty($request->section) && empty($request->semester)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 1)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 1],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('senior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(!empty($request->sy) && empty($request->section) && !empty($request->semester)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 1)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 1],['students.semester', '=', $request->semester],['students.sy_id','=', $request->sy]])
                    ->get();
                return view('senior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(empty($request->sy) && !empty($request->section) && !empty($request->semester)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 1)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 1],['students.semester', '=', $request->semester],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('senior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(!empty($request->section)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 1)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 1],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('senior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(!empty($request->sy)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 1)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 1],['students.sy_id','=', $request->sy]])
                    ->get();
                return view('senior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else if(!empty($request->semester)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 1)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where([['students.group_id', '=', 1],['students.semester','=', $request->semester]])
                    ->get();
                return view('senior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
            else {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=', 1)
                    ->get();
                $offenses= DB::table('offenses')
                    ->join('students', 'offenses.student_id', '=', 'students.student_id')
                    ->join('violations', 'offenses.violation_id', '=', 'violations.id')
                    ->join('school_years','students.sy_id', '=', 'school_years.id')
                    ->join('sections','students.section_id', '=', 'sections.id')
                    ->selectRaw('students.*, offenses.*,violations.category,violations.violation,school_years.school_year,sections.section,sections.grade')
                    ->where('students.group_id', '=', 1)
                    ->get();
                return view('senior.offense_records.index',['sections' => $sections,'school_years' => $school_years,'offenses' => $offenses]);
            }
        }
    }

    public function update_elem_offense(Request $request) {
        $update = Offense::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your Offense has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elementary/records/');
        } else {
            return redirect('/elementary/records/');
        }
    }


    public function update_senior_offense(Request $request) {;
        $update = Offense::find($request['id']);
        if ($update) {

            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your Offense has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/records/');
        } else {
            Session::flash('message','Your Offense has been failed to update!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/senior/records/');
        }
    }

     public function update_junior_offense(Request $request) {
        $update = Offense::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your Offense has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/junior/records/');
        } else {
            return redirect('/junior/records/');
        }
    }
}
