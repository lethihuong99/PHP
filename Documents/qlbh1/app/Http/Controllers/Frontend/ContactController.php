<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function contact(){
        if(!Auth::user()) {
            return redirect()->route('fr.auth.login');
        }
        return view('frontend.contact');
    }

    public function send()
    {
        $inquiryPersonName = request()->name;
        $inquiryPersonEmail = request()->email;
        $message = request()->message;
        if ($message && $inquiryPersonName && $inquiryPersonEmail) {
            Mail::to(config('mail.address'))
                ->send(new Inquiry($inquiryPersonName, $inquiryPersonEmail, $message));
            Alert::success('Gửi contact thành công!!');
        }else{
            Alert::error('Vui lòng điền đầy đủ thông tin!!');
        }
        return redirect()->route('fr.contact.index');
    }
}
