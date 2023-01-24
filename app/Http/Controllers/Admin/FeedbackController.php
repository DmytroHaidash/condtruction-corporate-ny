<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return \view('admin.feedback.index', [
            'feedbacks' => Feedback::latest('id')->paginate(20),
        ]);
    }

    /**
     * @param Feedback $feedback
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Feedback $feedback)
    {
        return \view('admin.feedback.edit', compact('feedback'));
    }

    /**
     * @param Request $request
     * @param Feedback $feedback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Feedback $feedback)
    {
        $feedback->update($request->only('status'));

        return \redirect()->route('admin.feedback.index')
            ->with('message', 'Successfully updated.');
    }

    /**
     * @param Feedback $feedback
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return \redirect()->route('admin.feedback.index')
            ->with('message', 'Successfully deleted.');
    }
}
