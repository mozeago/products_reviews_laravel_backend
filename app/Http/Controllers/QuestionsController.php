<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questionslist', ['questions' => Question::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questioncreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'mode_of_response' => 'required',
            'companyname' => 'required',
            'companyimage' => 'required',
            'award_amount' => 'required',
        ]);

        if (!empty($image_name)) {
            $image_name = time() . $request->companyname . '.' . $request->file('companyimage')->getClientOriginalExtension();

            if ($request->companyimage->move('uploads', $image_name)) {
                Question::create(
                    [
                        'title' => $request->title,
                        'description' => $request->description,
                        'mode_of_response' => $request->mode_of_response,
                        'companyname' => $request->companyname,
                        'companyimage' => $image_name,
                        'award_amount' => $request->award_amount,
                    ]
                );
            }
        }
        return view('questioncreate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('questioncreate', ['question' => Question::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $question=new Question::find($id);
        // $question->delete();
        return view('questionslist')->with('success', 'Question Deleted !');
    }
}