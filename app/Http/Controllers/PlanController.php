<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use PHPUnit\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class PlanController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required',
                'small_description' => 'required',
                'description' => 'required',
                'image_url' => 'required',
                'price' => 'required',
            ]);
            if ($request->hasFile('image_url')) {
                $request->request->remove('_token');
                $path = $request->image_url->store('public/plans');
                $path = str_replace('public', '', $path);
                $plan = new Plan();
                $plan->name = $request->name;
                $plan->small_description = $request->small_description;
                $plan->description = $request->description;
                $plan->image_url = $path;
                $plan->price = $request->price;
                $plan->save();
                Alert::success("Success", "Plan Created successfully");

                return redirect()->back()->with(['plans' => Plan::all()]);
            } else {
                Alert::error("Error", "No File");
                return redirect()->back();
            }

        } catch (\Exception $exception) {
            Alert::error("Error", $exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function adminView()
    {
        return view('admin.dashboard-plan', ['plans' => Plan::all()]);
    }

    public function delete(Request $request)
    {
        try {
            $request->validate(
                [
                    'plan_id' => 'required'
                ]
            );
            $plan = Plan::find($request->plan_id);
            if ($plan) {
                $plan->delete();
                Alert::success('Success', 'Plan deleted successfully');
                return redirect()->back()->with(['plans' => Plan::all()]);
            } else {
                Alert::error('Error', 'Plan not found');
                return redirect()->back()->with(['plans' => Plan::all()]);
            }
        } catch (Exception $exception) {
            Alert::error('Error', $exception->getMessage());
            return redirect()->back()->with(['plans' => Plan::all()]);
        }
    }

    public function planMake()
    {
        return view('admin.plan-make');
    }


    public function planMakeCreate(Request $request)
    {

    }
}
