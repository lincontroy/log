@extends('layouts.app')

@section('content')

<div class="col-xl-12">


    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">

                <?php
                            $cardname=App\Models\Accounts::where('id',request()->id)->get('type');

                            if(($cardname[0]['type'])=='1'){
                                $name="Cashapp";
                            }else if(($cardname[0]['type'])=='2'){
                                $name="Paypal";
                            }else{
                                $name="Shop with scrip";
                            }
                            
                            echo $name;
                           
                            ?>

                Accounts

            </h4>
            <div class="flex-shrink-0">
                <button type="button" class="btn btn-soft-info btn-sm">
                    <i class="ri-file-list-3-line align-middle"></i> Generate Report
                </button>
            </div>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="table-responsive table-card">
                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                    <thead class="text-muted table-light">
                        <tr>
                            <th scope="col">ICON</th>
                            <th scope="col">Account TYPE</th>
                            <th scope="col">INCLUDES</th>
                            <th scope="col">BALANCE</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">BUY NOW</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($accounts as $account)
                            <tr>
                                <td>
                                    @if($account->type==1)
                                        <img src="https://logsshop.info/assets/images/item-logo/cashapp.png" width="100"
                                            height="25">

                                    @elseif($account->type==2)
                                        <img src="https://logsshop.info/assets/images/item-logo/paypal.png" width="100"
                                            height="25">
                                    @else
                                        <img src="https://logsshop.info/assets/images/item-logo/swc.jpg" width="100"
                                            height="25">
                                    @endif
                                </td>
                                <td>
                                    @if($account->type==1)

                                        Cashapp

                                    @elseif($account->type==2)

                                        Paypal

                                    @else
                                        Shopwithscrip

                                    @endif
                                </td>
                                <td>
                                    Online Access,Email Access,
                                    Full Name,Bank Linked,PrestopayON
                                    FULLACCESS
                                </td>
                                <td>${{ $account->balance }}</td>


                                <td>${{ $account->price }}</td>

                                <td>
                                    <button type="button" class="btn btn-success">Active</button>
                                </td>

                                <td>
                                    <a href="{{ url('buycarditem') }}/{{ $account->id }}"
                                        class="btn btn-info">Buy now</a>
                                </td>


                            </tr>
                        @endforeach
                        <!-- end tr -->

                    </tbody><!-- end tbody -->
                </table><!-- end table -->
            </div>
        </div>
    </div> <!-- .card-->
</div> <!-- .col-->

@endsection
