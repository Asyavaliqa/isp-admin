<table class="table table-hover align-middle custom-table">
    <thead>
        <tr>
            <th scope="col">Invoice</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">Bandwidth</th>
            <th scope="col">Biaya</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Dikonfirmasi</th>
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
                    <img alt="{{ $transaction->client->user->fullname ?? $transaction->client_name }}" src="{{ asset(($transaction->client->user->photo ?? $transaction->client_name) ?? 'assets/brand/GMDP_100x100.png') }}" class="img-thumbnail rounded-circle" style="width: 60px">
                    <span class="ms-2">{{ $transaction->client->user->fullname }}</span>
                </td>
                <td>
                    {{ $transaction->bandwidth_name }}
                </td>
                <td>
                    Rp{{ number_format($transaction->balance, 2, ',', '.') }}
                </td>
                <td>
                    {{ $transaction->created_at->isoFormat('dddd, D MMMM g') }}
                </td>
                <td class="text-center">
                    @if ($transaction->accepted_at)
                    <span class="badge rounded-pill bg-primary">Ya</span>
                    @else
                    <span class="badge rounded-pill bg-danger">Tidak</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
