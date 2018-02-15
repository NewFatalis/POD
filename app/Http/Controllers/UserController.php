<?php

namespace App\Http\Controllers;
use App\User;
use App\Offense;
use App;
use Hash;
use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function login(Request $request) {
        $request['username'] = lcfirst($request['username']);
        $this->validate($request, [
            'username' => 'required|exists:users,username',
            'password' => "required"
        ]);

        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password'], 'group_id'=>3]))
        {
            return redirect()->route('elem.admin');

        }
        elseif(Auth::attempt(['username' => $request['username'], 'password' => $request['password'], 'group_id'=>2])) {
            return redirect()->route('junior.admin');
        }
        elseif(Auth::attempt(['username' => $request['username'], 'password' => $request['password'], 'group_id'=>1])){
            return redirect()->route('senior.admin');
        }
        else{
            return redirect()->back()->withInput($request->all)->with(['message' => 'Invalid password']);
        }
    }

    /**
     * elementary view for settings
     * @return [type] [description]
     */
    public function setting_elem() {
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $user = Auth::user();
        return view('elementary.admin.settings', ['user' => $user]);
    }

    /**
     * elementary credential for password
     * @param  Array  $data [description]
     * @return [type]       [description]
     */
    public function elem_credential_rules(Array $data) {
        $messages = [
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'password'              => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
    }

    /**
     * Update elementary settings
     * @return [type] [description]
     */
    public function update_elem(Request $request) {
        if (Auth::Check()) {
            $name = '';
            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets\images\users');
                $image->move($destinationPath, $name);
            }
            $request_data = $request->All();
            $this->validate($request, [
                'email' => 'email',
                'password' => 'required|min:6|max:15|confirmed',
            ]);
            $user_id            = Auth::User()->id;
            $obj_user           = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->email    = $request_data['email'];
            $obj_user->username = $request_data['username'];
            $obj_user->upload   = $name;
            $obj_user->save();
            Session::flash('message','Your account has been successfully update!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/elementary/settings/');
        }
    }

    /**
     * elementary users management list
     * @return void
     */
    public function elem_management() {
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $users = DB::table('users')->where('group_id', '3')->get();
        return view('elementary.users.index',['users' => $users]);
    }

    /**
     * Elementary management add staff
     */
    public function elem_management_add(Request $request) {
        if ($request->isMethod('post')) {
            $user           = new User();
//            $password       = md5(uniqid('prefect3', true));
            $password = '';
            if($request['role'] == 'administrator') {
                $password = $request['username'].'elemadmin';
            } else {
                $password = $request['username'].'elemstaff';
            }
            $hashPassword   = bcrypt($password);
            $user->email    = $request['email'];
            $user->username = $request['username'];
            $user->role     = $request['role'];
            $user->group_id = 3;
            $user->password = $hashPassword;

            $request_data = $request->all();
            if ($user->save()) {
                // Mail::send('elementary.users.email', ['password' => $password], function ($m) use ($request_data) {
                //     $m->from('lihuza@duck2.club', 'Your Temporary Password');

                //     $m->to($request_data['email'], $request_data['username'])->subject('Your Temporary Password');
                // });
                return redirect('/elementary/users/');
            }
        }
    }

    /**
     * elementary users management update
     * @return [type] [description]
     */
    public function elem_management_update(request $request) {
        $this->validate($request, [
            'email' => 'email',
            'password' => 'required|min:6|max:15|confirmed',
        ]);
        $user = User::find($request['id']);
        if ($user) {
            $user->email = $request['email'];
            $user->username = $request['username'];
            $user->password = Hash::make($request['password']);
            $user->role = $request['role'];
            $user->save();
            Session::flash('message','Your users has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elementary/users/');
        }
    }

    /**
     * 
     */
    public function elem_delete_management($id) {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            Session::flash('message','Your user has been deleted!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/elementary/users/');
        } else {
            return redirect('/elementary/users/');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('signin');
    }


    /**
     * Senior high users management list
     * @return void
     */
    public function senior_management() {
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $users = DB::table('users')->where('group_id', '1')->get();
        return view('senior.users.index',['users' => $users]);
    }

    /**
     * Senior high management add staff
     */
    public function senior_management_add(Request $request) {
        // $this->validate($request, [
        //     'email' => 'unique:users,email',
        //     'password' => 'required|min:6|max:15|confirmed',
        // ]);
        if ($request->isMethod('post')) {
            $user           = new User();
//            $password       = md5(uniqid('prefect3', true));
            $password = '';
            if($request['role'] == 'administrator') {
                $password = $request['username'].'senioradmin';
            } else {
                $password = $request['username'].'seniorstaff';
            }
            $hashPassword   = bcrypt($password);
            $user->email    = $request['email'];
            $user->username = $request['username'];
            $user->role     = $request['role'];
            $user->group_id = 1;
            $user->password = $hashPassword;

            $request_data = $request->all();
            if ($user->save()) {
                // Mail::send('elementary.users.email', ['password' => $password], function ($m) use ($request_data) {
                //     $m->from('lihuza@duck2.club', 'Your Temporary Password');

                //     $m->to($request_data['email'], $request_data['username'])->subject('Your Temporary Password');
                // });
                return redirect('/senior/users/');
            }
        }
    }

    /**
     * Senior high users management update
     */
    public function senior_management_update(request $request) {
        $this->validate($request, [
            'email' => 'email',
            'password' => 'required|min:6|max:15|confirmed',
        ]);
        $user = User::find($request['id']);
        if ($user) {
            $user->email = $request['email'];
            $user->username = $request['username'];
            $user->password = Hash::make($request['password']);
            $user->role = $request['role'];
            $user->save();
            Session::flash('message','Your users has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/users/');
        }
    }

    /**
     * Senior high delete management
     */
    // public function senior_delete_management($id) {
    //     $user = User::find($id);
    //     if ($user) {
    //         $user->delete();
    //         Session::flash('message','Your user has been deleted!');
    //         Session::flash('alert-class', 'alert-info'); 
    //         return redirect('/senior/users/');
    //     } else {
    //         return redirect('/senior/users/');
    //     }
    // }


    public function senior_delete_management($id)
    {
        if($id == 8)
        {
            Session::flash('message', 'You cannot delete admin on POD');
            Session::flash('alert-class', 'alert-danger');
               return redirect('/senior/users/');
        }
        else
        {       
            try 
            {
                $users = User::find($id);
                $users->delete();
                // redirect
                Session::flash('message', 'You have successfully deleted user');
                return redirect('/senior/users/');
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/senior/users/');
            }
        }
    }



    /**
     *Senior high view for settings
     */
    public function setting_senior() {
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $user = Auth::user();
        return view('senior.admin.settings', ['user' => $user]);
    }

    /**
     * Update senior settings
     * @return [type] [description]
     */
    public function update_senior(Request $request) {
        if (Auth::Check()) {
            $name = '';
            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets\images\users');
                $image->move($destinationPath, $name);
            }
            $request_data = $request->All();
            $this->validate($request, [
                'email' => 'email',
                'password' => 'required|min:6|max:15|confirmed',
            ]);
            $user_id            = Auth::User()->id;
            $obj_user           = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->email    = $request_data['email'];
            $obj_user->username = $request_data['username'];
            $obj_user->upload   = $name;
            $obj_user->save();
            Session::flash('message','Your account has been successfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/settings/');
        }
    }

    //Junior high

    /**
     * Junior high users management list
     * @return void
     */
    public function junior_management() {
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $users = DB::table('users')->where('group_id', '2')->get();
        return view('junior.users.index',['users' => $users]);
    }

    /**
     * Junior high management add staff
     */
    public function junior_management_add(Request $request) {
        if ($request->isMethod('post')) {
            $user           = new User();
//            $password       = md5(uniqid('prefect3', true));
            $password = '';
            if($request['role'] == 'administrator') {
                $password = $request['username'].'junioradmin';
            } else {
                $password = $request['username'].'juniorstaff';
            }
            $hashPassword   = bcrypt($password);
            $user->email    = $request['email'];
            $user->username = $request['username'];
            $user->role     = $request['role'];
            $user->group_id = 2;
            $user->password = $hashPassword;

            $request_data = $request->all();
            if ($user->save()) {
                // Mail::send('elementary.users.email', ['password' => $password], function ($m) use ($request_data) {
                //     $m->from('lihuza@duck2.club', 'Your Temporary Password');

                //     $m->to($request_data['email'], $request_data['username'])->subject('Your Temporary Password');
                // });
                return redirect('/junior/users/');
            }
        }
    }

    /**
     * Junior high users management update
     */
    public function junior_management_update(request $request) {
        $this->validate($request, [
            'email' => 'email',
            'password' => 'required|min:6|max:15|confirmed',
        ]);
        $user = User::find($request['id']);
        if ($user) {
            $user->email = $request['email'];
            $user->username = $request['username'];
            $user->password = Hash::make($request['password']);
            $user->role = $request['role'];
            $user->save();
            Session::flash('message','Your users has been succesfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/junior/users/');
        }
    }

    /**
     * Junior high delete management
     */
    public function junior_delete_management($id) {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            Session::flash('message','Your user has been deleted!');
            Session::flash('alert-class', 'alert-info'); 
            return redirect('/junior/users/');
        } else {
            return redirect('/junior/users/');
        }
    }

    /**
     *Junior high view for settings
     */
    public function setting_junior() {
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $user = Auth::user();
        return view('junior.admin.settings', ['user' => $user]);
    }

    /**
     * Update junior settings
     * @return [type] [description]
     */
    public function update_junior(Request $request) {
        if (Auth::Check()) {
            $name = '';
            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets\images\users');
                $image->move($destinationPath, $name);
            }
            $request_data = $request->All();
            $this->validate($request, [
                'email' => 'email',
                'password' => 'required|min:6|max:15|confirmed',
            ]);
            $user_id            = Auth::User()->id;
            $obj_user           = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->email    = $request_data['email'];
            $obj_user->username = $request_data['username'];
            $obj_user->upload   = $name;
            $obj_user->save();
            Session::flash('message','Your account has been successfully update!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elementary/settings/');
        }
    }
}
