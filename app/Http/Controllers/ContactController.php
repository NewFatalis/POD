<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contact;
use DB;
use Illuminate\Support\Facades\Session;
use SmsGateway;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function sms_contact_elem(){
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $contacts =  DB::table('contacts')
            ->select('contacts.*')
            ->where('contacts.group_id', '=', 3)
            ->get();
        return view('elementary.sms.contacts',['contacts' => $contacts]);
    }

    public function sms_compose_elem(){
        if(Auth::user()['group_id'] !=3) {
            return redirect()->back();
        }
        $contacts =  DB::table('contacts')
            ->select('contacts.*')
            ->where('contacts.group_id', '=', 3)
            ->get();
        return view('elementary.sms.compose',['contacts' => $contacts]);
    }
    public function sms_send_elem(Request $request){

        if(empty($request['receiver'])) {
            Session::flash('message','Receiver cannot be empty');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/elementary/compose/');
        } else{
            $result = '';
            $smsGateway = new SmsGateway('sample@gmail.com', '123456');
            $deviceID = 65980123;
            $message = $request['message'];
            foreach($request['receiver'] as $receiver) {
               $result = $smsGateway->sendMessageToNumber($receiver, $message, $deviceID);
            }
        }
        if($result['status'] ==401) {
            Session::flash('message','Error sending message');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/elementary/compose/');
        }
        Session::flash('message','Your Message has been succesfully sent!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/elementary/compose/');
    }

    public function add_contact_elem(Request $request){
        if ($request->isMethod('post')) {
            $contact = new Contact();
            $contact->fill($request->all());
            $contact->group_id = 3;
            if($contact->save()){
                Session::flash('message','Your Contact has been succesfully added!');
                Session::flash('alert-class', 'alert-success');
                return redirect('/elementary/contacts/');
            }
        }
    }

    //Senior High

    /**
     * Senior high contact 
     */
    public function sms_contact_senior(){
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $contacts =  DB::table('contacts')
            ->select('contacts.*')
            ->where('contacts.group_id', '=', 1)
            ->get();
        return view('senior.sms.contacts',['contacts' => $contacts]);
    }

    /**
     * Senior high compose 
     */
    public function sms_compose_senior(){
        if(Auth::user()['group_id'] !=1) {
            return redirect()->back();
        }
        $contacts =  DB::table('contacts')
            ->select('contacts.*')
            ->where('contacts.group_id', '=', 1)
            ->get();
        return view('senior.sms.compose',['contacts' => $contacts]);
    }

    /**
     * Senior high send 
     */
    public function sms_send_senior(Request $request){

        if(empty($request['receiver'])) {
            Session::flash('message','Receiver cannot be empty');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/senior/compose/');
        } else{
            $result = '';
            $smsGateway = new SmsGateway('sample@gmail.com', '123456');
            $deviceID = 65980123;
            $message = $request['message'];
            foreach($request['receiver'] as $receiver) {
               $result = $smsGateway->sendMessageToNumber($receiver, $message, $deviceID);
            }
        }
        if($result['status'] ==401) {
            Session::flash('message','Error sending message');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/senior/compose/');
        }
        Session::flash('message','Your Message has been succesfully sent!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/senior/compose/');
    }

    /**
     * Senior high add contact 
     */
    public function add_contact_senior(Request $request){
        if ($request->isMethod('post')) {
            $contact = new Contact();
            $contact->fill($request->all());
            $contact->group_id = 1;
            if($contact->save()){
                Session::flash('message','Your Contact has been succesfully added!');
                Session::flash('alert-class', 'alert-success');
                return redirect('/senior/contacts/');
            }
        }
    }

    //Junior High

    /**
     * Junior high contact 
     */
    public function sms_contact_junior(){
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $contacts =  DB::table('contacts')
            ->select('contacts.*')
            ->where('contacts.group_id', '=', 2)
            ->get();
        return view('junior.sms.contacts',['contacts' => $contacts]);
    }

    /**
     * Junior high compose 
     */
    public function sms_compose_junior(){
        if(Auth::user()['group_id'] !=2) {
            return redirect()->back();
        }
        $contacts =  DB::table('contacts')
            ->select('contacts.*')
            ->where('contacts.group_id', '=', 2)
            ->get();
        return view('junior.sms.compose',['contacts' => $contacts]);
    }

    /**
     * Junior high send 
     */
    public function sms_send_junior(Request $request){

        if(empty($request['receiver'])) {
            Session::flash('message','Receiver cannot be empty');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/junior/compose/');
        } else{
            $result = '';
            $smsGateway = new SmsGateway('sample@gmail.com', 'sample1234');
            $deviceID = 65979;
            $message = $request['message'];
            foreach($request['receiver'] as $receiver) {
               $result = $smsGateway->sendMessageToNumber($receiver, $message, $deviceID);
            }
        }
        if($result['status'] ==401) {
            Session::flash('message','Error sending message');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/junior/compose/');
        }
        Session::flash('message','Your Message has been succesfully sent!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/junior/compose/');
    }

    /**
     * Junior high add contact 
     */
    public function add_contact_junior(Request $request){
        if ($request->isMethod('post')) {
            $contact = new Contact();
            $contact->fill($request->all());
            $contact->group_id = 2;
            if($contact->save()){
                Session::flash('message','Your Contact has been succesfully added!');
                Session::flash('alert-class', 'alert-success');
                return redirect('/junior/contacts/');
            }
        }
    }


    public function update_contact_elem(Request $request) {
        if ($request->isMethod('post')) {
            $update = Contact::find($request['id']);
            if ($update) {
                $update->name = $request['name'];
                $update->contact_no = $request['contact_no'];
                $update->save();
                Session::flash('message','Your contact has been succesfully update!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/elementary/contacts/');
            } else {
                return redirect('/elementary/contacts/');
            }
        }
    }

    public function delete_contact_elem($id) {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            Session::flash('message','Your contact has been deleted!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/elementary/contacts/');
        } else {
            return redirect('/elementary/contacts/');
        }
    }

     public function delete_contact_junior($id) {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            Session::flash('message','Your contact has been deleted!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/junior/contacts/');
        } else {
            return redirect('/junior/contacts/');
        }
    }


     public function delete_contact_senior($id) {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            Session::flash('message','Your contact has been deleted!');
            Session::flash('alert-class', 'alert-info');
            return redirect('/senior/contacts/');
        } else {
            return redirect('/senior/contacts/');
        }
    }

    public function update_contact_junior(Request $request) {
        if ($request->isMethod('post')) {
            $update = Contact::find($request['id']);
            if ($update) {
                $update->name = $request['name'];
                $update->contact_no = $request['contact_no'];
                $update->save();
                Session::flash('message','Your contact has been succesfully update!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/junior/contacts/');
            } else {
                return redirect('/junior/contacts/');
            }
        }
    }


     public function update_contact_senior(Request $request) {
        if ($request->isMethod('post')) {
            $update = Contact::find($request['id']);
            if ($update) {
                $update->name = $request['name'];
                $update->contact_no = $request['contact_no'];
                $update->save();
                Session::flash('message','Your contact has been succesfully update!');
                Session::flash('alert-class', 'alert-info');
                return redirect('/senior/contacts/');
            } else {
                return redirect('/senior/contacts/');
            }
        }
    }
}
