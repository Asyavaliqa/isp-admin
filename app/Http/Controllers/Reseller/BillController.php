<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Reseller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    public function outstanding(Request $request)
    {
        $bills = $this->_getTransactions($request);

        $bills->whereNull('payed_at');
        $bills->whereNull('accepted_at');

        return view('pages.reseller.transaction.index', [
            'title' => 'Tagihan Terhutang',
            'bills' => $bills->paginate(20)->appends($request->all()),
        ]);
    }

    public function paid(Request $request)
    {
        $bills = $this->_getTransactions($request);

        $bills->whereNotNull('payed_at');
        $bills->whereNull('accepted_at');

        return view('pages.reseller.transaction.index', [
            'title' => 'Tagihan Yang Telah Dibayar',
            'bills' => $bills->paginate(20)->appends($request->all()),
        ]);
    }

    public function paidOff(Request $request)
    {
        $bills = $this->_getTransactions($request);

        $bills->whereNotNull('payed_at');
        $bills->whereNotNull('accepted_at');

        return view('pages.reseller.transaction.index', [
            'title' => 'Tagihan Selesai',
            'bills' => $bills->paginate(20)->appends($request->all()),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bills = $this->_getTransactions($request);

        $bills->whereNotNull('payed_at');

        return view('pages.reseller.transaction.index', [
            'title' => 'Transaksi',
            'bills' => $bills->paginate(20)->appends($request->all()),
        ]);
    }

    /**
     * Get bill
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bills(Request $request)
    {
        $bills = $this->_getTransactions($request);

        $bills->whereNull('payed_at');

        return view('pages.reseller.transaction.bills', [
            'title' => 'Tagihan',
            'bills' => $bills->paginate(20)->appends($request->all()),
        ]);
    }

    /**
     * Get all data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function _getTransactions(Request $request): Builder
    {
        $reseller = Reseller::select('id')->where('user_id', Auth::id())->first();

        $bills = Bill::where('reseller_id', $reseller->id)
            ->with([
                'client:id,user_id',
                'client.user',
            ])
            ->latest();

        if ($request->has('client_id')) {
            $bills->where('client_id', $request->client_id);
        }

        return $bills;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $transaction = Bill::with([
            'reseller' => function ($q) {
                $q->where('user_id', Auth::id());
            },
            'client',
            'plan',
        ])->where('id', $id)
          ->firstOrFail();

        return view('pages.reseller.transaction.detail', [
            'title' => 'Detail Transaksi: ' . $transaction->invoice_id,
            'transaction' => $transaction,
        ]);
    }
}
