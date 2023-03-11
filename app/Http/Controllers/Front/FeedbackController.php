<?php

namespace App\Http\Controllers\Front;

use App\Mail\SendFeedback;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $feedback = Feedback::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);
        Mail::send(new SendFeedback($feedback));
        return \view('app.pages.thanks');
    }
}
