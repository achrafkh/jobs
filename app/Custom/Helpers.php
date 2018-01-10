<?php

function uploadFile($file, $folder = 'cv', $disk = 'local')
{
    $folder = rtrim($folder, '/') . '/' . str_random(15) . time() . '.' . $file->getClientOriginalExtension();
    Illuminate\Support\Facades\Storage::disk($disk)->put($folder, file_get_contents($file));
    return 'app/' . $folder;
}

function sendMail($data)
{
    Illuminate\Support\Facades\Mail::mail('emails.sendcv', $data, function ($message) use ($data) {

        $message->from($data['email'], $data['firstname']);
        $message->to(env('MAIL_FROM_ADDRESS'), 'Kpeiz')->subject('Job Application');

        foreach ($data['files'] as $file) {
            $message->attach($file);
        }
    });
}
