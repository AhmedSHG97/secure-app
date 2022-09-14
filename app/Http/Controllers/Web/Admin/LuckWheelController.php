<?php

namespace App\Http\Controllers\Web\Admin;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\BaseController;
use App\Http\Requests\Admin\Luck\CreateLuckRequest;
use App\Http\Requests\Admin\Luck\UpdateLuckRequest;
use App\Http\Requests\Admin\Promo\CreatePromoRequest;
use App\Http\Requests\Admin\Promo\UpdatePromoRequest;
use App\Models\Admin\Promo;
use App\Models\Admin\ServiceLocation;
use App\Models\Luck;
use Illuminate\Http\Request;

class LuckWheelController extends BaseController
{
    protected $luck;

    /**
     * PromoController constructor.
     *
     * @param \App\Models\Admin\Luck $luck
     */
    public function __construct(Luck $luck)
    {
        $this->luck = $luck;
    }

    public function index()
    {
        $page = "Luck Wheels";

        $main_menu = 'Luck Wheel';
        $sub_menu = '';

        return view('admin.luck-cards.index', compact('page', 'main_menu', 'sub_menu'));
    }

    public function fetch(QueryFilterContract $queryFilter)
    {
        $query = $this->luck->query();

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.luck._luck', compact('results'));
    }

    public function create()
    {
        $page = "Add Card";
        $main_menu = 'manage-luck';
        $sub_menu = '';

        return view('admin.promo.create', compact('page', 'main_menu', 'sub_menu'));
    }

    public function store(CreateLuckRequest $request)
    {
        $created_params = $request->only(['code']);


        $this->luck->create($created_params);

        $message = 'code added successfully';

        return redirect('luck')->with('success', $message);
    }

    public function getById(luck $luck)
    {
        $page = "update card";
        $main_menu = 'manage-luck';
        $sub_menu = '';
        $item = $luck;

        return view('admin.luck-cards.update', compact('item', 'page', 'main_menu', 'sub_menu'));
    }

    public function update(UpdateLuckRequest $request, Luck $luck)
    {
        $updated_params = $request->all();
        $luck->update($updated_params);

        $message = "code updated successfully";

        return redirect('luck')->with('success', $message);
    }

    public function toggleStatus(Luck $luck)
    {
        $status = $luck->status ? false: true;
        $luck->update(['active' => $status]);

        $message = "status has been toggled successfully";
        return redirect('luck')->with('success', $message);
    }

    public function delete(Luck $luck)
    {
        $luck->delete();

        $message = "code has been deleted successfully";
        return redirect('luck')->with('success', $message);
    }
}
