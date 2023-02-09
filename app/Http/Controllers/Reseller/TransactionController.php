<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\Reseller;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = $this->_getTransactions($request);

        $transactions->whereNotNull('payed_at');

        return view('pages.reseller.transaction.index', [
            'title' => 'Transaksi',
            'transactions' => $transactions->paginate(20)->appends($request->all()),
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
        $transactions = $this->_getTransactions($request);

        $transactions->whereNull('payed_at');

        return view('pages.reseller.transaction.bills', [
            'title' => 'Tagihan',
            'transactions' => $transactions->paginate(20)->appends($request->all()),
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

        $transactions = Transaction::where('reseller_id', $reseller->id)
            ->with([
                'client:id,user_id',
                'client.user',
            ])
            ->latest();

        if ($request->has('client_id')) {
            $transactions->where('client_id', $request->client_id);
        }

        return $transactions;
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
        $transaction = Transaction::with([
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
