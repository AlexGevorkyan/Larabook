<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Topic;
use App\Block;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        $id=0;
        return view('topic.index', ['page'=>'List Of Contents', 
            'topics' => $topics, 'id' => $id ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = new Topic;
        return view('topic.addnew', ['topic' => $topic , 'page'=>'Add New Topic Title']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = new Topic;
        $topic->topicname=$request->topicname;

        if (!$topic->save()) 
        {
            $errors = $topic->getErrors();
            return redirect()
                ->action('TopicController@create')
                ->with('errors', $errors)
                ->withInput();
        }

        // success!
        return redirect()
          ->action('TopicController@create')
          ->with('message', 'Your '. $topic->topicname . ' has been created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blocks = Block::where('topicid', '=', $id)->get();
        $topics = Topic::all();
        return view('topic.index', ['page'=>'List Of Contents', 
            'topics' => $topics, 'id' => $id, 'blocks' => $blocks ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=0)
    {
        return view('edit.index', ['page'=>'Edit Content']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
