<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login Routes elementary
Route::get('/', function () {

    if(\Illuminate\Support\Facades\Auth::user()['group_id']==3){
        return redirect('/elementary/students');
    }
    if(\Illuminate\Support\Facades\Auth::user()['group_id']==2){
        return redirect('/junior/students');
    }
    if(\Illuminate\Support\Facades\Auth::user()['group_id']==1){
        return redirect('/senior/students');
    }
    return view('auth.signin');
})->name('signin');

Route::post('/', [
    'uses'  => 'UserController@login',
    'as'    => 'post.signin'
]);

// Middleware for authentication elementary, junior, senior
Route::group(['middleware' =>['auth.shs']], function() {
    //elementary routes

    Route::get('/logout', [
        'uses'  => 'UserController@logout',
        'as'    => 'logout'
    ]);

    Route::get('/elemhome', [
        'uses'  => 'StudentController@elem_dashboard',
        'as'   => 'elem.admin'
    ]);
   
    Route::get('/elementary/students', [
        'uses'  => 'StudentController@student_elem',
        'as'   => 'elem.student'
    ]);

    Route::post('/elementary/students', [
        'uses'  => 'StudentController@add_student_elem',
        'as'    => 'elem.studentadd'
    ]);
    Route::post('/elementary/student/update',[
        'uses' => 'StudentController@update_student_elem',
        'as'   => 'elem.updateStudent'
    ]);

    Route::get('/elementary/section', [
        'uses'  => 'SectionController@section_elem'
    ]);
    Route::post('/elementary/section', [
        'uses'  => 'SectionController@add_section_elem',
        'as'    => 'elem.sectionadd'
    ]);

    Route::post('/elementary/section/update',[
        'uses' => 'SectionController@update_section_elem',
        'as'   => 'elem.updateSection'
    ]);

    Route::match(['get', 'post'], '/elementary/section_delete/{id}',[
        'uses' => 'SectionController@delete_section_elem',
        'as'   => 'elem.deleteSection'
    ]);

    Route::get('/elementary/schoolyear',[
        'uses'  => 'SchoolYearController@schoolyear_elem'
    ]);
    Route::post('/elementary/schoolyear',[
        'uses'  => 'SchoolYearController@add_schoolyear_elem',
        'as'    => 'elem.syadd'
    ]);

    Route::post('/elementary/sy/update',[
        'uses' => 'SchoolYearController@update_sy_elem',
        'as'   => 'elem.updateSY'
    ]);

    Route::match(['get', 'post'], '/elementary/sy_delete/{id}',[
        'uses' => 'SchoolYearController@delete_sy_elem',
        'as'   => 'elem.deleteSchoolYear'
    ]);

    Route::get('/elementary/forgot', function () {
        return view('elementary.auth.forgot');
    });


    Route::get('/elementary/offense',[
        'uses'  => 'OffenseController@offense_elem',
    ]);

    Route::post('/elementary/offense',[
        'uses'  => 'OffenseController@add_offense_elem',
        'as'    => 'elem.offenseadd'
    ]);
    Route::get('/elementary/records',[
        'uses'  => 'OffenseController@offense_records_elem',
    ]);

    Route::get('/elementary/users',[
        'uses' => 'UserController@elem_management'
    ]);

    Route::match(['get', 'post'], '/elementary/users_add',[
        'uses' => 'UserController@elem_management_add',
        'as'   => 'elem.userAdd'
    ]);

    Route::match(['get', 'post'], '/elementary/users_delete/{id}',[
        'uses' => 'UserController@elem_delete_management',
        'as'   => 'elem.deleteUser'
    ]);

    Route::match(['get', 'post'], '/elementary/users_update',[
        'uses' => 'UserController@elem_management_update',
        'as'   => 'elem.userUpdate'
    ]);

    Route::get('/elementary/settings', [
        'uses' => 'UserController@setting_elem'
    ]);

    Route::post('/elementary/edit/',[
        'uses' => 'UserController@update_elem',
        'as'   => 'elem.updateSettings'
    ]);

    Route::get('/elementary/violation',[
        'uses' => 'ViolationController@violation_elem'
    ]);

    Route::post('/elementary/violation',[
        'uses' => 'ViolationController@add_violation_elem',
        'as'   => 'elem.addviolation'
    ]);

    Route::match(['get', 'post'], '/elementary/delete/{id}',[
        'uses' => 'ViolationController@delete_violation_elem',
        'as'   => 'elem.deleteViolation'
    ]);

    Route::post('/elementary/update/',[
        'uses' => 'ViolationController@update_violation_elem',
        'as'   => 'elem.updateViolation'
    ]);


    Route::get('/elementary/contacts', [
        'uses' => 'ContactController@sms_contact_elem'
    ]);

    Route::get('/elementary/compose', [
        'uses' => 'ContactController@sms_compose_elem'
    ]);

    Route::post('/elementary/compose', [
        'uses' => 'ContactController@sms_send_elem',
        'as'   => 'elem.sendSMS'
    ]);

    Route::post('/elementary/contacts', [
        'uses'  => 'ContactController@add_contact_elem',
        'as'    => 'elem.contactadd'
    ]);

    Route::post('/elem/contacts_update', [
        'uses'  => 'ContactController@update_contact_elem',
        'as'    => 'elem.contactupdate'
    ]);

    Route::match(['get', 'post'], '/elementary/contact_delete/{id}',[
        'uses' => 'ContactController@delete_contact_elem',
        'as'   => 'elem.deleteContact'
    ]);

    Route::get('/elemmonthly', [
        'uses' => 'ReportController@elem_report'
    ]);

    Route::post('/elem/student/attempt',[
        'uses' => 'StudentController@total_attempt_elem',
        'as'   => 'total_attempt_elem'
    ]);

//    Route::get('/elem/section-filter',[
//        'uses' => 'StudentController@section_filter_elem',
//        'as'   => 'section_filter_elem'
//    ]);

    Route::get('/elem/stud_elem_add',[
        'uses' => 'StudentController@search_elem_stud',
        'as'   => 'elem.studSearch'
    ]);

    Route::get('/elem/offense_elem_add',[
        'uses' => 'OffenseController@search_elem_offense',
        'as'   => 'elem.offenseSearch'
    ]);
    Route::post('/elem/offense_update',[
        'uses' => 'OffenseController@update_elem_offense',
        'as'   => 'elem.updateOffense'
    ]);

    Route::get('importExport', 'MaatwebsiteDemoController@importExport');
    Route::get('downloadExcel/{type}', [
       'uses' => 'ReportController@downloadExcel',
        'as'  => 'elem.reportSearch'
    ]);

    //elem adviser route
    Route::get('/elem/adviser', [
        'uses'  => 'AdviserController@adviser_elem'
    ]);
    Route::post('/elem/adviser', [
        'uses'  => 'AdviserController@add_adviser_elem',
        'as'    => 'elem.adviseradd'
    ]);

    Route::post('/elem/adviser/update',[
        'uses' => 'AdviserController@update_adviser_elem',
        'as'   => 'elem.updatedAdviser'
    ]);
    
    Route::match(['get', 'post'], '/elem/adviser_delete/{id}',[
        'uses' => 'AdviserController@delete_adviser_elem',
        'as'   => 'elem.deleteAdviser'
    ]);

    //elem sanction
    Route::get('/elem/sanction',[
        'uses' => 'SanctionController@sanction_elem'
    ]);

    Route::post('/elem/sanction',[
        'uses' => 'SanctionController@add_sanction_elem',
        'as'   => 'elem.addsanction'
    ]);

    Route::match(['get', 'post'], '/elem/sanction/delete/{id}',[
        'uses' => 'SanctionController@delete_sanction_elem',
        'as'   => 'elem.deleteSanction'
    ]);

    Route::post('/elem/sanction/update/',[
        'uses' => 'SanctionController@update_sanction_elem',
        'as'   => 'elem.updateSanction'
    ]);


    //junior routes
    Route::get('/jrhome', [
        'uses'  => 'StudentController@dashboard_jr',
        'as'   => 'junior.admin'
    ]);

    Route::get('/forgot', function () {
        return view('junior.auth.forgot');
    });

    Route::get('/junior/students/', [
        'uses'  => 'StudentController@student_junior',
        'as'   => 'junior.student'
    ]);

    Route::post('/junior/students', [
        'uses'  => 'StudentController@add_student_junior',
        'as'    => 'junior.studentadd'
    ]);

    Route::post('/junior/student/update',[
        'uses' => 'StudentController@update_student_junior',
        'as'   => 'junior.updateStudent'
    ]);

    Route::get('/junior/violation',[
        'uses' => 'ViolationController@violation_junior'
    ]);

    Route::post('/junior/violation',[
        'uses' => 'ViolationController@add_violation_junior',
        'as'   => 'junior.addviolation'
    ]);

    Route::match(['get', 'post'], '/junior/delete/{id}',[
        'uses' => 'ViolationController@delete_violation_junior',
        'as'   => 'junior.deleteViolation'
    ]);

    Route::post('/junior/update/',[
        'uses' => 'ViolationController@update_violation_junior',
        'as'   => 'junior.updateViolation'
    ]);

    Route::get('/junior/section', [
        'uses'  => 'SectionController@section_junior'
    ]);
    Route::post('/junior/section', [
        'uses'  => 'SectionController@add_section_junior',
        'as'    => 'junior.sectionadd'
    ]);

    Route::post('/junior/section/update',[
        'uses' => 'SectionController@update_section_junior',
        'as'   => 'junior.updateSection'
    ]);

    Route::match(['get', 'post'], '/junior/section_delete/{id}',[
        'uses' => 'SectionController@delete_section_junior',
        'as'   => 'junior.deleteSection'
    ]);

    //adviser route
    Route::get('/junior/adviser', [
        'uses'  => 'AdviserController@adviser_junior'
    ]);
    Route::post('/junior/adviser', [
        'uses'  => 'AdviserController@add_adviser_junior',
        'as'    => 'junior.adviseradd'
    ]);

    Route::post('/junior/adviser/update',[
        'uses' => 'AdviserController@update_adviser_junior',
        'as'   => 'junior.updateAdviser'
    ]);

    Route::match(['get', 'post'], '/junior/adviser_delete/{id}',[
        'uses' => 'AdviserController@delete_adviser_junior',
        'as'   => 'junior.deleteAdviser'
    ]);

    Route::get('/junior/schoolyear',[
        'uses'  => 'SchoolYearController@schoolyear_junior'
    ]);
    Route::post('/junior/schoolyear',[
        'uses'  => 'SchoolYearController@add_schoolyear_junior',
        'as'    => 'junior.syadd'
    ]);

    Route::post('/junior/sy/update',[
        'uses' => 'SchoolYearController@update_sy_junior',
        'as'   => 'junior.updateSY'
    ]);

    Route::match(['get', 'post'], '/junior/sy_delete/{id}',[
        'uses' => 'SchoolYearController@delete_sy_junior',
        'as'   => 'junior.deleteSchoolYear'
    ]);

    Route::get('/junior/users',[
        'uses' => 'UserController@junior_management'
    ]);

    Route::match(['get', 'post'], '/junior/users_add',[
        'uses' => 'UserController@junior_management_add',
        'as'   => 'junior.userAdd'
    ]);

    Route::match(['get', 'post'], '/junior/users_delete/{id}',[
        'uses' => 'UserController@junior_delete_management',
        'as'   => 'junior.deleteUser'
    ]);

    Route::match(['get', 'post'], '/junior/users_update/',[
        'uses' => 'UserController@junior_management_update',
        'as'   => 'junior.userUpdate'
    ]);

    Route::get('/junior/offense/',[
        'uses'  => 'OffenseController@offense_junior',
    ]);

    Route::post('/junior/offense/',[
        'uses'  => 'OffenseController@add_offense_junior',
        'as'    => 'junior.offenseadd'
    ]);

    Route::get('/junior/records/',[
        'uses'  => 'OffenseController@offense_records_junior',
    ]);

    Route::get('/junior/settings', [
        'uses' => 'UserController@setting_junior'
    ]);

    Route::post('/junior/settings',[
        'uses' => 'UserController@update_junior',
        'as'   => 'junior.updateSettings'
    ]);

    Route::get('/junior/contacts', [
        'uses' => 'ContactController@sms_contact_junior'
    ]);

    Route::get('/junior/compose', [
        'uses' => 'ContactController@sms_compose_junior'
    ]);

    Route::post('/junior/compose', [
        'uses' => 'ContactController@sms_send_junior',
        'as'   => 'junior.sendSMS'
    ]);

    Route::post('/junior/contacts', [
        'uses'  => 'ContactController@add_contact_junior',
        'as'    => 'junior.contactadd'
    ]);


    Route::post('/junior/student/attempt',[
        'uses' => 'StudentController@total_attempt_junior',
        'as'   => 'total_attempt_junior'
    ]);
    Route::get('/junior/stud_elem_search',[
        'uses' => 'StudentController@search_junior_stud',
        'as'   => 'junior.studSearch'
    ]);

    Route::get('/junior/offense_junior_search',[
        'uses' => 'OffenseController@search_junior_offense',
        'as'   => 'junior.offenseSearch'
    ]);


    Route::get('/jryearly', [
        'uses' => 'ReportController@junior_report'
    ]);

    Route::get('/junior/downloadExcel/{type}', [
        'uses' => 'ReportController@junior_download',
        'as'  => 'junior.reportSearch'
    ]);

     Route::post('/junior/offense_update',[
        'uses' => 'OffenseController@update_junior_offense',
        'as'   => 'junior.updateOffense'
    ]);

    Route::match(['get', 'post'], '/junior/contact_delete/{id}',[
        'uses' => 'ContactController@delete_contact_junior',
        'as'   => 'junior.deleteContact'
    ]); 

    Route::post('/junior/contacts_update', [
        'uses'  => 'ContactController@update_contact_junior',
        'as'    => 'junior.contactupdate'
    ]);

   

    //junior sanction
    Route::get('/junior/sanction',[
        'uses' => 'SanctionController@sanction_junior'
    ]);

    Route::post('/junior/sanction',[
        'uses' => 'SanctionController@add_sanction_junior',
        'as'   => 'junior.addsanction'
    ]);

    Route::match(['get', 'post'], '/junior/sanction/delete/{id}',[
        'uses' => 'SanctionController@delete_sanction_junior',
        'as'   => 'junior.deleteSanction'
    ]);

    Route::post('/junior/sanction/update/',[
        'uses' => 'SanctionController@update_sanction_junior',
        'as'   => 'junior.updateSanction'
    ]);

    //senior routes
  
    Route::get('/forgot', function () {
        return view('senior.auth.forgot');
    });

    Route::get('/srhome', [
        'uses'  => 'StudentController@dashboard_sr',
        'as'   => 'senior.admin'
    ]);

    Route::get('/senior/students/', [
        'uses'  => 'StudentController@student_senior',
        'as'   => 'senior.student'
    ]);

    Route::post('/senior/students', [
        'uses'  => 'StudentController@add_student_senior',
        'as'    => 'senior.studentadd'
    ]);

    Route::post('/senior/student/update',[
        'uses' => 'StudentController@update_student_senior',
        'as'   => 'senior.updateStudent'
    ]);

    Route::get('/senior/violation',[
        'uses' => 'ViolationController@violation_senior'
    ]);

    Route::post('/senior/violation',[
        'uses' => 'ViolationController@add_violation_senior',
        'as'   => 'senior.addviolation'
    ]);

    Route::match(['get', 'post'], '/senior/delete/{id}',[
        'uses' => 'ViolationController@delete_violation_senior',
        'as'   => 'senior.deleteViolation'
    ]);

    Route::post('/senior/update/',[
        'uses' => 'ViolationController@update_violation_senior',
        'as'   => 'senior.updateViolation'
    ]);

    Route::get('/senior/section', [
        'uses'  => 'SectionController@section_senior'
    ]);
    Route::post('/senior/section', [
        'uses'  => 'SectionController@add_section_senior',
        'as'    => 'senior.sectionadd'
    ]);

    Route::post('/senior/section/update',[
        'uses' => 'SectionController@update_section_senior',
        'as'   => 'senior.updateSection'
    ]);

    Route::get('/senior/schoolyear',[
        'uses'  => 'SchoolYearController@schoolyear_senior'
    ]);
    Route::post('/senior/schoolyear',[
        'uses'  => 'SchoolYearController@add_schoolyear_senior',
        'as'    => 'senior.syadd'
    ]);

    Route::post('/senior/sy/update',[
        'uses' => 'SchoolYearController@update_sy_senior',
        'as'   => 'senior.updateSY'
    ]);

    Route::get('/senior/users',[
        'uses' => 'UserController@senior_management'
    ]);

    Route::match(['get', 'post'], '/senior/users_add',[
        'uses' => 'UserController@senior_management_add',
        'as'   => 'senior.userAdd'
    ]);

    Route::match(['get', 'post'], '/senior/users_delete/{id}',[
        'uses' => 'UserController@senior_delete_management',
        'as'   => 'senior.deleteUser'
    ]);

    Route::match(['get', 'post'], '/senior/users_update/',[
        'uses' => 'UserController@senior_management_update',
        'as'   => 'senior.userUpdate'
    ]);

    Route::get('/senior/offense/',[
        'uses'  => 'OffenseController@offense_senior',
    ]);

    Route::post('/senior/offense/',[
        'uses'  => 'OffenseController@add_offense_senior',
        'as'    => 'senior.offenseadd'
    ]);

    Route::get('/senior/records/',[
        'uses'  => 'OffenseController@offense_records_senior',
    ]);

    Route::get('/senior/settings', [
        'uses' => 'UserController@setting_senior'
    ]);

    Route::post('/senior/edit/',[
        'uses' => 'UserController@update_senior',
        'as'   => 'senior.updateSettings'
    ]);

    Route::get('/senior/contacts', [
        'uses' => 'ContactController@sms_contact_senior'
    ]);

    Route::get('/senior/compose', [
        'uses' => 'ContactController@sms_compose_senior'
    ]);

    Route::post('/senior/compose', [
        'uses' => 'ContactController@sms_send_senior',
        'as'   => 'senior.sendSMS'
    ]);

    Route::post('/senior/contacts', [
        'uses'  => 'ContactController@add_contact_senior',
        'as'    => 'senior.contactadd'
    ]);


    Route::match(['get', 'post'], '/senior/sy_delete/{id}',[
        'uses' => 'SchoolYearController@delete_sy_senior',
        'as'   => 'senior.deleteSchoolYear'
    ]);
    Route::match(['get', 'post'], '/senior/section_delete/{id}',[
        'uses' => 'SectionController@delete_section_senior',
        'as'   => 'senior.deleteSection'
    ]);

    Route::post('/senior/student/attempt',[
        'uses' => 'StudentController@total_attempt_senior',
        'as'   => 'total_attempt_junior'
    ]);

    Route::post('/senior/offense_update',[
        'uses' => 'OffenseController@update_senior_offense',
        'as'   => 'senior.updateOffense'
    ]);

    Route::get('/senior/stud_senior_search',[
        'uses' => 'StudentController@search_senior_stud',
        'as'   => 'senior.studSearch'
    ]);

     Route::match(['get', 'post'], '/senior/contact_delete/{id}',[
        'uses' => 'ContactController@delete_contact_senior',
        'as'   => 'senior.deleteContact'
    ]);

      Route::post('/senior/contacts_update', [
        'uses'  => 'ContactController@update_contact_senior',
        'as'    => 'senior.contactupdate'
    ]);

    Route::get('/senior/offense_senior_search',[
        'uses' => 'OffenseController@search_senior_offense',
        'as'   => 'senior.offenseSearch'
    ]);
    Route::get('/srmonthly', [
        'uses' => 'ReportController@senior_report'
    ]);

    Route::get('/sryearly', [
        'uses' => 'ReportController@senior_yearly_report'
    ]);


    Route::get('/senior_month/downloadExcel/{type}', [
        'uses' => 'ReportController@senior_download',
        'as'  => 'senior.reportSearch'
    ]);


    Route::get('/senior_year/downloadExcel/{type}', [
        'uses' => 'ReportController@senior_year_download',
        'as'  => 'senior.report_yearSearch'
    ]);

    //senior adviser route
    Route::get('/senior/adviser', [
        'uses'  => 'AdviserController@adviser_senior'
    ]);
    Route::post('/senior/adviser', [
        'uses'  => 'AdviserController@add_adviser_senior',
        'as'    => 'senior.adviseradd'
    ]);

    Route::post('/elem/adviser/update',[
        'uses' => 'AdviserController@update_adviser_senior',
        'as'   => 'senior.updateAdviser'
    ]);
    Route::match(['get', 'post'], '/senior/adviser_delete/{id}',[
        'uses' => 'AdviserController@delete_adviser_senior',
        'as'   => 'senior.deleteAdviser'
    ]);

    //Senior sanction
    Route::get('/senior/sanction',[
        'uses' => 'SanctionController@sanction_senior'
    ]);

    Route::post('/senior/sanction',[
        'uses' => 'SanctionController@add_sanction_senior',
        'as'   => 'senior.addsanction'
    ]);

    Route::match(['get', 'post'], '/senior/sanction/delete/{id}',[
        'uses' => 'SanctionController@delete_sanction_senior',
        'as'   => 'senior.deleteSanction'
    ]);

    Route::post('/senior/sanction/update/',[
        'uses' => 'SanctionController@update_sanction_senior',
        'as'   => 'senior.updateSanction'
    ]);
});







