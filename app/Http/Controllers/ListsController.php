<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\GoalItems;
use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lists = new Lists($request->validate([
            'name' => 'required|max:40'
        ]));
        $lists->user_id = Auth::user()->id;
        $lists->save();

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function show(Lists $lists, Request $request)
    {

        $list = Lists::where('id', $request->id)->get();

        $goals = Goal::where('list_id', $request->id)->get();

        $goalItems = GoalItems::all();

        return view('table', [
            'list' => $list,
            'goals' => $goals,
            'items' => $goalItems
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function edit(Lists $lists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lists $lists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lists $lists)
    {
        //
    }

    public function storeGoal(Request $request){
        $goal = new Goal($request->validate([
            'name' => 'required|max:40'
        ]));
        $goal->list_id = $request->input('list_id');
        $goal->save();

        return redirect(route('list', $request->input('list_id')));
    }



    public function showCard(Request $request)
    {

        $goal = Goal::where('id', $request->id)->first();
        return view("addCard", [
            'goal' => $goal
        ]);
    }

    public function storeGoalItems(Request $request){
        $goal = new GoalItems($request->validate([
            'name' => 'required|max:40'
        ]));
        $goal->goal_id = $request->input('goal_id');
        $goal->save();

        return redirect(route('list', $request->input('list_id')));
    }
}
