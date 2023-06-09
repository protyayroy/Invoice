@php
    $active = 'invoice';
@endphp
@extends('layouts.layout')
@section('title')
    Invoice List
@endsection
@section('content')
    <!-- invoice view Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content px-4">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Invoice</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="invoice_view">
                        <p class="pl-1 pt-3">Date: <span class="view_date"></span></p>
                        <hr>
                        <div>
                            <h5>Invoice to:</h5>
                            <table class="ml-2 invoice_view_info">
                                <tr>
                                    <th>Company Name:</th>
                                    <td> <span class="view_com_name"></span></td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td> <span class="view_name"></span></td>
                                </tr>
                                <tr>
                                    <th>Type:</th>
                                    <td> <span class="view_type"></span></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td> <span class="view_email"></span></td>
                                </tr>
                                <tr>
                                    <th>Phone no.:</th>
                                    <td> <span class="view_phone"></span></td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td> <span class="view_address"></span></td>
                                </tr>
                                <tr>
                                    <th>Cheque:</th>
                                    <td> <span class="view_cheque"></span></td>
                                </tr>
                            </table>
                        </div>
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead style="text-transform: uppercase">
                                <tr>
                                    <th scope="col">Entry date</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Width</th>
                                    <th scope="col">Height</th>
                                    <th scope="col">Square ft</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Square ft</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="view_tBody"></tbody>
                        </table>
                        {{-- <p class="mr-1 float-right">Total: <span class="view_total"></span></p>
                        <div class="clr"></div>
                        <p class="mr-1 float-right">Paid: <span class="view_paid"></span></p>
                        <div class="clr"></div>
                        <p class="mb-5 mr-1 float-right">Balance: <span class="view_balance"></span></p>
                        <div class="clr"></div> --}}
                        {{-- <p>Note: <span>Somthing....</span></p> --}}
                        <table class="float-right mb-3">
                            <tr>
                                <th>Total:</th>
                                <td><span class="view_total ml-2"></span></td>
                            </tr>
                            <tr>
                                <th>Paid:</th>
                                <td><span class="view_paid ml-2"></span></td>
                            </tr>
                            <tr>
                                <th>Balance:</th>
                                <td><span class="view_balance ml-2"></span></td>
                            </tr>
                        </table>
                        <div class="clr"></div>
                        <button id="pdf_link" class="btn btn-dark float-right mt-2 mb-4 mr-3">Download pdf</button>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
        </div>
    <div id="main-body">
        <div class="container body_content">
            <div class="row">
                <div class="col-12">
                    @if (Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success:</strong> {{ Session('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h4 class="text-center">Transition details</h4>
                    <div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead style="text-transform: uppercase">
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Bank/Cash</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Transection::where('type', 'INVOICE')->get() as $invoice)
                                    <tr>
                                        <td>{{ $invoice->entry_date }}</td>
                                        <td>{{ $invoice->getCustomer->name }}</td>
                                        <td>{{ $invoice->bank_name }}</td>
                                        <td><?= number_format($invoice->debit, 2, '.', ',') ?></td>
                                        <td><?= number_format($invoice->credit, 2, '.', ',') ?></td>
                                        <td>
                                            <button class="btn btn-success" id="view_invoice"
                                                value="{{ $invoice->id }}" title="View Invoice">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                            <a href="{{ url('edit-invoice/' . $invoice->id) }}"
                                                class="btn btn-info ml-1" title="Edit Invoice">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <button value="{{ $invoice->id }}" id="delete_invoice"
                                                class="btn btn-danger ml-1" title="Delete Invoice">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
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
