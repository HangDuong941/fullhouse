@extends('admin.layout.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Full house, Inc.
                                    <small class="float-right">Date: 
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->order_date)->format('d/m/Y')}}
                                    </small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From:
                                <address>
                                    <strong>Full house, Inc.</strong><br>
                                    391a Nam Ky Khoi Nghia Street<br>
                                    District 3, HCM City<br>
                                    Phone: (84) 12346789 <br>
                                    Email: fullhouse@gmail.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To:
                                <address>
                                    <strong>{{$order->user->name}}</strong><br>
                                    {{ $order->user->getWard() }},
                                    {{ $order->user->getDistrict() }}<br>
                                    {{ $order->user->getCity() }}<br>
                                    Phone: {{$order->user->phone}}<br>
                                    Email: {{$order->user->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice: {{$order->id}}</b><br>
                                <br>
                                <b>Order ID:</b> FH{{$order->id}}<br>
                                <b>Account No:</b> 96845-34567-1234 <br>
                                <b>At Bank:</b> BIDV
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Code</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderDetails as $k=>$od)
                                        <tr>
                                            <td>{{$k + 1}}</td>
                                            <td>{{$od->product->product_name}}</td>
                                            <td>{{$od->product->product_id}}</td>
                                            <td>{{$od->quantity}}</td>
                                            <td>$ {{number_format($od->price,2)}}</td>
                                            <td>$ {{number_format($od->quantity * $od->price,2)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="{{ asset('admin/dist/img/credit/visa.png')}}" alt="Visa">
                                <img src="{{ asset('admin/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                                <img src="{{ asset('admin/dist/img/credit/american-express.png')}}" alt="American Express">
                                <img src="{{ asset('admin/dist/img/credit/paypal2.png')}}" alt="Paypal">

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">

                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Discount:</th>
                                            <td>{{$order->coupon_id}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>$64.50</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping fee:</th>
                                            <td>$ {{number_format($order->shipping_fee,2)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <th>$69.66</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{ route('admin.order.printInvoice')}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.control-sidebar -->
@endsection