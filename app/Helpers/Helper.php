<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use DB;
class Helper
{
    public static function fullname($name, $middlename,$lastname){
        $fullname = '';
        if(!empty($name)) {
            $fullname = $name;
            if(!empty($lastname)) {
                $fullname = $name . " " . $lastname;
                if (!empty($middlename)) {
                    $fullname = $name. " " .$middlename." ".$lastname;
                }
            }
        }
        return $fullname;
    }

    public static function elem_students_offense() {
        $students = DB::table("offenses")
            ->join('students', 'students.student_id', '=', 'offenses.student_id')
            ->select(DB::raw("COUNT(offenses.student_id) count,students.first_name, students.last_name"))
            ->groupBy("offenses.student_id")
            ->havingRaw("COUNT(offenses.student_id) = 3")
            ->where('students.group_id', '=', 3)
            ->get();
        $countStudents = count($students);
        $student_offense = [
            'student_offense' => $students,
            'count'           => $countStudents];
        return $student_offense;
    }

    public static function junior_students_offense() {
        $students = DB::table("offenses")
            ->join('students', 'students.student_id', '=', 'offenses.student_id')
            ->select(DB::raw("COUNT(offenses.student_id) count,students.first_name, students.last_name"))
            ->groupBy("offenses.student_id")
            ->havingRaw("COUNT(offenses.student_id) = 3")
            ->where('students.group_id', '=', 2)
            ->get();
        $countStudents = count($students);
        $student_offense = [
            'student_offense' => $students,
            'count'           => $countStudents];
        return $student_offense;
    }


    public static function senior_students_offense() {
        $students = DB::table("offenses")
            ->join('students', 'students.student_id', '=', 'offenses.student_id')
            ->select(DB::raw("COUNT(offenses.student_id) count,students.first_name, students.last_name"))
            ->groupBy("offenses.student_id")
            ->havingRaw("COUNT(offenses.student_id) = 3")
            ->where('students.group_id', '=', 1)
            ->get();
        $countStudents = count($students);
        $student_offense = [
            'student_offense' => $students,
            'count'           => $countStudents];
        return $student_offense;
    }
}