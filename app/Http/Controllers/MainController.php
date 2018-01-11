<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidFormRequest;
use App\Mail\InformMail;
use App\Mail\SendTest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Session;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $page_class = 'landing-page';
        return view('index', compact('page_class'));
    }

    public function show($type)
    {
        $types = array_keys(config('details'));

        if (!in_array($type, $types)) {
            return redirect('/');
        }
        $page_class = "application-page " . config('details')[$type]['color'] . '-page';
        $countries = app('pragmarx.countries');

        $regions = $countries->where('cca3', 'TUN')->first()->states->pluck('name', 'postal');

        return view('application.index', compact('type', 'page_class', 'regions'));
    }

    public function handleSubmit(ValidFormRequest $request)
    {
        foreach ($request->file('file') as $file) {
            $data['files'][] = storage_path(uploadFile($file));
        }
        $data['post'] = $request->post;
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['email'] = $request->email;
        $data['region'] = $request->region;
        $data['message'] = $request->message;
        if ($request->has('site')) {
            foreach ($request->site as $site) {
                $data['site'][] = $site;
            }
        }
        Mail::to(explode(',', env('REC')))
            ->queue(new InformMail($data));

        Mail::to($request->email)
            ->later(Carbon::now()->addMinutes(30), new SendTest($data));

        Session::flash('msg', ['class' => 'success', 'msg' => 'Application Sent successfully']);

        return redirect('/#success');
    }

    public function submit(Request $request)
    {
        $data['files'][] = storage_path(uploadFile($request->file('cv')));

        sendMail($data);
    }

    public function upload()
    {
        Storage::put('test.txt', 'zae');

        Mail::send('emails.sendcv', ['key' => 'value'], function ($message) {
            $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
        });
    }
}
