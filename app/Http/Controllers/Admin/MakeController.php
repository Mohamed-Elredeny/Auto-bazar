<?php

namespace App\Http\Controllers\Admin;
use App\Exports\MakesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\models\Make;
use App\models\SellType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makes = Make::paginate(10);
        return view('admin.makes.index',compact('makes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellTypes = SellType::get();
        return view('admin.makes.create', compact('sellTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = $request->image->getClientOriginalName();
        $file_to_store = time() . '_' . $fileName ;
        $request->image->move(public_path('assets/images/makes'), $file_to_store);

        Make::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'sell_type_id' => $request->sell_type_id,
            'image' => $file_to_store,
        ]);
        return redirect()->route('admin.makes.index')->with('success', 'تم اضافة النوع بنجاح');
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
        $make = Make::find($id);
        $sellTypes = SellType::get();
        return view('admin.makes.edit', compact('make', 'sellTypes'));
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
        $make = Make::find($id);
        if ($request->image) {
           // unlink(public_path('assets/images/makes') .'/' . $make->image);
            $fileName = $request->image->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName ;
            $request->image->move(public_path('assets/images/makes'), $file_to_store);
        }
        else{
            $file_to_store = $make->image;
        }
        $make->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'sell_type_id' => $request->sell_type_id,
            'image' => $file_to_store,
        ]);
        return redirect()->route('admin.makes.index')->with('success', 'تم تعديل النوع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Make::find($id);
        $old->delete();
        return redirect()->route('admin.makes.index')->with('success', 'تم الحذف بنجاح');
    }
    public function export()
    {
        return Excel::download(new MakesExport, 'makes.xlsx');
    }
}
