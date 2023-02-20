<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('order.index', compact('orders'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request, $id)
    {
        $order = Order::find($id);
        Order::where('id', $order->id)->update(['status' => $request->status]);
        return back();
    }

    public function customers()
    {
        $customers = User::where('is_admin', 0)->paginate(3);
        return view('customers', compact('customers'));
    }

    public function export()
    {
        return Excel::download(new OrdersExport, 'siparisler.xlsx');
    }

    public function downloadPDF()
    {

        $orders = Order::orderBy('id', 'DESC')->get();
        $orientation = 'landscape';
        $customPaper = array(0, 0, 950, 950);
        $pdf = PDF::loadView('pdf.orders', compact("orders"))->setPaper($customPaper, $orientation)->setOptions(['defaultFont' => 'sans-serif', 'dpi' => 150]);
        return $pdf->download('siparisler.pdf');
        //return $pdf->stream();
    }

}
