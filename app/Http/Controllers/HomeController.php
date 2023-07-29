<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function contact()
    {
        $data = [
            'subject' => 'Test Subject',
            'body' => 'Message From Umar application',
            'path' => public_path('storage/images/resumes/1687576891_resume.docx')
        ];
    
        Mail::to('hello@example.com')->send(new UserMail($data));
    
        return "Email sent successfully!";
    }
}
