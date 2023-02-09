<table class="table table-hover align-middle custom-table">
    <thead>
        <tr>
            <th scope="col">Invoice</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">Paket</th>
            <th scope="col">Nilai</th>
            <th scope="col" class="text-center">Pembayaran Bulan</th>
            <th scope="col" class="text-center">Dibayar Tanggal</th>
            <th scope="col" class="text-center">Dikonfirmasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <th>
                    <a href="{{ route('reseller_owner.transaction.detail', ['id' => $transaction->id]) }}">
                        {{ $transaction->invoice_id }}
                    </a>
                </th>
                <td>
                    <a href="{{ route('reseller_owner.client.detail', ['id' => $transaction->client_id]) }}">
                        <img alt="{{ $transaction->client->user->fullname ?? $transaction->client_name }}"
                            src="{{ asset($transaction->client->user->photo ?? $transaction->client_name ?? 'assets/brand/GMDP_100x100.png') }}"
                            class="img-thumbnail rounded-circle" style="width: 60px">
                        <span class="ms-2">{{ $transaction->client->user->fullname }}</span>
                    </a>
                </td>
                <td>
                    <a href="{{ route('reseller_owner.client.detail', ['id' => $transaction->plan_id]) }}">
                        {{ $transaction->plan_name }}
                    </a>
                </td>
                <td>
                    Rp{{ number_format($transaction->balance, 2, ',', '.') }}
                </td>
                <td class="text-center">
                    <span
                        class="badge badge-pills bg-info">{{ $transaction->created_at->subMonth()->isoFormat('MMMM g') }}</span>
                </td>
                <td>
                    {{ $transaction->created_at->isoFormat('dddd, D MMMM g') }}
                </td>
                <td class="text-center">
                    @if ($transaction->accepted_at)
                        <span class="badge rounded-pills bg-primary">Ya</span>
                    @else
                        <span class="badge rounded-pills bg-danger">Tidak</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
