<?php

namespace App\Http\Controllers;

use App\QuestionResponse;
use Illuminate\Http\Request;

class QuestionResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('responselist', ['response' => QuestionResponse::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('responsecreate');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id' => 'required',
                'question_id' => 'required',
                'video_url' => 'required',
            ]
        );
        $video_url = time() . $request->question_id . '.' . $request->file('video_url')->getClientOriginalExtension();
        if (!empty($video_url)) {
            if ($request->video_url->move('responses', $video_url)) {
                QuestionResponse::create(
                    [
                        'user_id' => $request->user_id,
                        'question_id' => $request->question_id,
                        'video_url' => $video_url,
                    ]
                );
                return view('responsecreate')->with('success', 'Response uploaded');
            }
        }
        return redirect()->back()->with('error', 'Retry uploading again');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('responselist', ['response' => QuestionResponse::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('responseedit', ['response' => QuestionResponse::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video_url = time() . $request->question_id . '.' . $request->file('video_url')->getClientOriginalExtension();

        $response = QuestionResponse::find($id);
        $response->user_id = $request->get('user_id');
        $response->question_id = $request->get('question_id');
        $response->video_url = $video_url;
        $response->save();
        return view('responselist', ['response' => QuestionResponse::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = QuestionResponse::find($id);
        $response->delete();
        return view('responselist', ['response' => QuestionResponse::all()])->with('success', 'Response deleted');
    }
}