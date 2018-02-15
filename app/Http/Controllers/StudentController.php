<?php

namespace App\Http\Controllers;
use App\Student;
use App\Violation;
use App\User;
use App\SchoolYear;
use App\Section;
use App\Adviser;
use DB;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Redirect;
use Charts;
class StudentController extends Controller
{
    public function elem_dashboard(Request $request) {

        
        if ($request->isMethod('get')) {
            if(Auth::user()['group_id'] !=3) {
                return redirect()->back();
            }
            $students = Student::where('group_id', 3)->count();
            $users = User::where('group_id', 3)->count();
            $advisers = Adviser::where('group_id', 3)->count();
            $sections = Section::where('group_id', 3)->count();
            $chart = Charts::database(Violation::all('violation'), 'bar', 'highcharts')
                ->loaderColor('#ff851b')
                ->colors(['#ff851b'])
                ->title('Number of Students Per Year')
                ->responsive(false)
                ->elementLabel('Total number of students')
                ->width(0)
                ->height(370)
                ->groupBy('violation', null, [3 => 'group_id']);
            return view('elementary.admin.home', ['chart' => $chart])->with('students', $students)->with('users', $users)->with('advisers', $advisers)->with('sections', $sections);  
        }
    }

    public function student_elem(Request $request){
        if ($request->isMethod('get')) {
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
            $students = DB::table('students')
                ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                ->join('sections', 'students.section_id', '=', 'sections.id')
                ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                ->where('students.group_id', '=', 3)
                ->get();
            return view('elementary.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);

        }

    }


    public function add_student_elem(Request $request){
        if ($request->isMethod('post')) {
            $students = new Student();
            $students->fill($request->all());
            $students->group_id = Auth::user()['group_id'];
            if($students->save()){
                Session::flash('message','Your student has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/elementary/students/');
            }

        }
    }


    public function update_student_elem(Request $request) {
        $update = Student::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your student has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elementary/students/');
        } else {
            return redirect('/elementary/students/');
        }
    }

    // Senior high school

    /**
     * senior high dashboard
     */
    public function dashboard_sr(Request $request){
        if ($request->isMethod('get')) {
            if(Auth::user()['group_id'] !=1) {
                return redirect()->back();
            }

            $students = Student::where('group_id', 1)->count();
            $users = User::where('group_id', 1)->count();
            $advisers = Adviser::where('group_id', 1)->count();
            $sections = Section::where('group_id', 1)->count();
            $chart = Charts::database(Violation::all(), 'bar', 'highcharts')
                ->loaderColor('#ff851b')
                ->colors(['#ff851b'])
                ->title('Number of Students Violation')
                ->responsive(false)
                ->elementLabel('Total number of students')
                ->width(0)
                ->height(370)
                ->groupBy('violation');
            return view('senior.admin.home', ['chart' => $chart])->with('students', $students)->with('users', $users)->with('advisers', $advisers)->with('sections', $sections);  
        }
    }

    public function student_senior(Request $request){
        if ($request->isMethod('get')) {
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
            $students = DB::table('students')
                ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                ->join('sections', 'students.section_id', '=', 'sections.id')
                ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                ->where('students.group_id', '=', 1)
                ->get();
            return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);

        }
    }

    /**
     * Senior high add students
     */
    public function add_student_senior(Request $request){
        if ($request->isMethod('post')) {
            $students = new Student();
            $students->fill($request->all());
            $students->group_id = Auth::user()['group_id'];
            if($students->save()){
                Session::flash('message','Your student has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/senior/students/');
            }

        }
    }

// ======  charts ======

    public function dashboard_jr(Request $request){
        if ($request->isMethod('get')) {
            if(Auth::user()['group_id'] !=2) {
                return redirect()->back();
            }

            $chart = Charts::database(Student::all(), 'line', 'highcharts')
                ->loaderColor('#ff851b')
                ->colors(['#ff851b'])
                ->title('Number of Students Per Year')
                ->responsive(false)
                ->elementLabel('Total number of students')
                ->width(0)
                ->height(370)
                ->groupByYear(6);
            return view('junior.admin.home', ['chart' => $chart]);  
        }
    }

    /**
     * Senior high update students
     */
    public function update_student_senior(Request $request) {
        $update = Student::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your student has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/students/');
        } else {
            return redirect('/senior/students/');
        }
    }

    // Junior high school

    /**
     * Junior high dashboard
     */


    public function student_junior(Request $request){

        if ($request->isMethod('get')) {
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
            $students = DB::table('students')
                ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                ->join('sections', 'students.section_id', '=', 'sections.id')
                ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                ->where('students.group_id', '=', 2)
                ->get();
            return view('junior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);

        }
    }

    /**
     * Junior high add students
     */
    public function add_student_junior(Request $request){
        if ($request->isMethod('post')) {
            $students = new Student();
            $students->fill($request->all());
            $students->group_id = Auth::user()['group_id'];
            if($students->save()){
                Session::flash('message','Your student has been succesfully added!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/junior/students/');
            }


        }
    }

    /**
     * Junior high update students
     */
    public function update_student_junior(Request $request) {
        $update = Student::find($request['id']);
        if ($update) {
            $update->fill($request->all());
            $update->save();
            Session::flash('message','Your student has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/junior/students/');
        } else {
            return redirect('/junior/students/');
        }
    }

    public function total_attempt_elem(Request $request)
    {
        if ($request->isMethod('post')) {
            $students = DB::table("offenses")
                ->join('students', 'students.student_id', '=', 'offenses.student_id')
                ->select(DB::raw("COUNT(offenses.student_id) count"))
                ->groupBy("offenses.student_id")
                ->where('offenses.student_id', '=', $request->studID)
                ->get();
            if(!empty($students[0])) {
                return json_encode($students[0]);
            } else {
                return json_encode(array('count' => 0 ));
            }

        }
    }

    public function total_attempt_junior(Request $request)
    {
        if ($request->isMethod('post')) {
            $students = DB::table("offenses")
                ->join('students', 'students.student_id', '=', 'offenses.student_id')
                ->select(DB::raw("COUNT(offenses.student_id) count"))
                ->groupBy("offenses.student_id")
                ->where('offenses.student_id', '=', $request->studID)
                ->get();
            if(!empty($students[0])) {
                return json_encode($students[0]);
            } else {
                return json_encode(array('count' => 0 ));
            }

        }
    }

    public function total_attempt_senior(Request $request)
    {
        if ($request->isMethod('post')) {
            $students = DB::table("offenses")
                ->join('students', 'students.student_id', '=', 'offenses.student_id')
                ->select(DB::raw("COUNT(offenses.student_id) count"))
                ->groupBy("offenses.student_id")
                ->where('offenses.student_id', '=', $request->studID)
                ->get();
            if(!empty($students[0])) {
                return json_encode($students[0]);
            } else {
                return json_encode(array('count' => 0 ));
            }

        }
    }


    public function search_elem_stud(Request $request)
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
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 3],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('elementary.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
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
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 3],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('elementary.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
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
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 3],['students.sy_id','=', $request->sy]])
                    ->get();
                return view('elementary.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
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
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 3]])
                    ->get();
                return view('elementary.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
        }
    }

    public function search_junior_stud(Request $request)
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
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 2],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('junior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
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
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 2],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('junior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
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
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 2],['students.sy_id','=', $request->sy]])
                    ->get();
                return view('junior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
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
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 2]])
                    ->get();
                return view('junior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
        }
    }


    public function search_senior_stud(Request $request)
    {
        if ($request->isMethod('get')) {
            if(!empty($request->sy) && !empty($request->section) &&  !empty($request->semester) && !empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.semester', '=', $request->semester],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)],['students.class','=', trim($request->class)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(!empty($request->sy) && !empty($request->section) && !empty($request->class) && empty($request->semester)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)],['students.class','=', trim($request->class)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(!empty($request->sy) && empty($request->section) && !empty($request->semester) && !empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.sy_id','=', $request->sy],['students.semester','=', trim($request->semester)],['students.class','=', trim($request->class)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(empty($request->sy) && !empty($request->section) && !empty($request->semester) && !empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.section_id','=', $request->section],['students.semester','=', trim($request->semester)],['students.class','=', trim($request->class)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(!empty($request->sy) && !empty($request->section) && !empty($request->semester) && empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.semester', '=', $request->semester],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(!empty($request->sy) && !empty($request->section) && empty($request->semester) && empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.sy_id','=', $request->sy],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(empty($request->sy) && !empty($request->section) && !empty($request->semester) && empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.semester','=', $request->semester],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }

            else if(empty($request->sy) && !empty($request->section) && empty($request->semester) && !empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.class','=', $request->class],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }

            else if(!empty($request->sy) && empty($request->section) && !empty($request->semester) && empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.sy_id','=', $request->sy],['students.semester','=', trim($request->semester)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(!empty($request->sy) && empty($request->section) && empty($request->semester) && !empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.sy_id','=', $request->sy],['students.class','=', trim($request->class)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }

            else if(empty($request->sy) && empty($request->section) && !empty($request->semester) && !empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.semester','=', $request->semester],['students.class','=', trim($request->class)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }

            else if(!empty($request->section)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.section_id','=', trim($request->section)]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(!empty($request->sy)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.sy_id','=', $request->sy]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(!empty($request->semester)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.semester','=', $request->semester]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else if(!empty($request->class)) {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1],['students.class','=', $request->class]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
            else {
                $sections = DB::table('sections')
                    ->select('sections.*')
                    ->where('sections.group_id', '=', 1)
                    ->get();
                $school_years = DB::table('school_years')
                    ->select('school_years.*')
                    ->where('school_years.group_id', '=',1)
                    ->get();
                $students = DB::table('students')
                    ->join('school_years', 'students.sy_id', '=', 'school_years.id')
                    ->join('sections', 'students.section_id', '=', 'sections.id')
                    ->select('students.*', 'school_years.school_year','sections.grade','sections.section')
                    ->where([['students.group_id', '=', 1]])
                    ->get();
                return view('senior.student.index',['sections' => $sections,'school_years' => $school_years,'students'=>$students]);
            }
        }
    }
}
