@foreach ($transections as $transection)
    @php
        if (!empty($transection->debit) || $transection->debit != 0) {
            $total_balance += $transection->debit;
        }
        if (!empty($transection->credit) || $transection->credit != 0) {
            $total_balance -= $transection->credit;
        }
    @endphp
    <tr>
        <td>{{ $transection->entry_date }}</td>
        <td>{{ $transection->type }}</td>
        <td>{{ $transection->debit }}</td>
        <td>{{ $transection->credit }}</td>
        <td>{{ $total_balance }}</td>
        <td>{{ $transection->note == 'N/A' ? 'Empty' : $transection->note }}</td>
        <td>{{ $transection->bank_name == null ? 'Empty' : $transection->bank_name }}</td>
        <td>
            @if ($transection->type == 'INVOICE')
                <a href="{{ url('edit-invoice/' . $transection->id) }}" class="btn btn-info">Edit</a>
            @endif
        </td>
    </tr>
@endforeach