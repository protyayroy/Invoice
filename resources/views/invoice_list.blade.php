@extends('layouts.layout')
@section('title')
    Invoice List
@endsection
@section('content')
    <div id="main-body">
        <div class="container body_content">
            <div class="row">
                <div class="col-12">
                    <h2>Transition details</h2>
                    <div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>DATE</th>
                                    <th>name</th>
                                    <th>BANK/CASH</th>
                                    <th>DEBIT</th>
                                    <th>CREDIT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Transection::where('type','INVOICE')->get() as $invoice)
                                    <tr>
                                        <td>{{ $invoice->entry_date }}</td>
                                        <td>{{ $invoice->getCustomer->name }}</td>
                                        <td>{{ $invoice->bank_name }}</td>
                                        <td>{{ $invoice->debit }}</td>
                                        <td>{{ $invoice->credit }}</td>
                                        <td>
                                            <a href="{{ url('edit-invoice/'.$invoice->id) }}" class="btn btn-primary">Edit</a>
                                            <button value="{{ $invoice->id }}" id="delete_invoice" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
