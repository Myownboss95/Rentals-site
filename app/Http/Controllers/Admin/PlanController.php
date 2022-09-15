<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Plans\StorePlanRequest;
use App\Http\Requests\Plans\UpdatePlanRequest;
use DB;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::latest();
        return inertia('admin.plans.index', [
            'plans' => $plans->paginate(),
        ]);
    }

    public function create()
    {
        return inertia('admin.plans.create');
    }

    public function store(StorePlanRequest $request)
    {
        DB::beginTransaction();
        try {
            $plan = Plan::create($request->except('features'));
            $features = [];
            collect($request->only('features')['features'])
                ->map(function ($item, $key) use ($plan, &$features) {
                    array_push($features, ['name' => $item]);
                });
            $plan->features()->createMany($features);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.plans.index')->withSuccess('Plan created successfully');
    }

    public function edit(Plan $plan)
    {
        $features = [];
        $plan->features->each(function ($item) use (&$features) {
            return array_push($features, [$item->name]);
        });
        return inertia('admin.plans.edit', compact('plan', 'features'));
    }

    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        DB::beginTransaction();
        try {
            $plan->features()->delete();
            $plan->update($request->except('features'));
            $features = [];
            collect($request->only('features')['features'])
                ->map(function ($item, $key) use (&$features) {
                    array_push($features, ['name' => $item[0]]);
                });
            $plan->features()->createMany($features);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.plans.index')->withSuccess('Plan updated successfully');
    }

    public function destroy(Plan $plan)
    {
        DB::beginTransaction();
        try {
            $plan->features()->delete();
            $plan->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return back()->withSuccess('Plan deleted');
    }
}
