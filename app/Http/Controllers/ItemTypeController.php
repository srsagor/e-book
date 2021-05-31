<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ItemType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemTypeController extends Controller
{
     public function index(Request $request)
    {
        $itemstypes = ItemType::query()->get();
        if ($request->ajax()) {
            return DataTables::of($itemstypes)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return readableDate($row->created_at) ?? "N/A";
                })
                ->addColumn('action', function ($data) {
                    $module_name = 'itemstypes';
                    return view('backend.includes.action_column', compact('module_name', 'data'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.itemtype.index', compact('itemstypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.itemtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request, ItemType $itemtypes)
    {
        // dd($request->toArray());
        $request->validate([
            'itemstypes' => 'required'
        ]);
        $itemtypes->type_name = $request->itemstypes;
        $itemtypes->save();

        return redirect()->action([\App\Http\Controllers\ItemTypeController::class, 'index']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return Response
     */
    public function show(ItemType $itemtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     */
    public function edit($id)
    {
        $itemtype = ItemType::find($id);
        return view('backend.itemtype.edit', compact('itemtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Designation $designation
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'itemtypes' => 'required'
        ]);

        $itemtype = ItemType::find($id);
        // dd($itemtype);
        $itemtype->type_name = $request->itemtypes;
        $itemtype->update();

        return redirect()->action([\App\Http\Controllers\ItemTypeController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Designation $designation
     * @return JsonResponse
     */
    public function destroy($id)
    {
        
        $dlt = ItemType::find($id)->delete();
        return redirect()->action([\App\Http\Controllers\ItemTypeController::class, 'index']);
        return response()->json([
            'message' => __('Deleted Successfully !'),
        ]);
    }
    
}
