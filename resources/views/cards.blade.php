@extends('layouts.app')

@section('content')

<div class="col-xl-12">


    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">

                <?php
                            $cardname=App\Models\Cards::where('id',request()->id)->get('brand');

                            if(($cardname[0]['brand'])=='1'){
                                $name="Visa";
                            }else if(($cardname[0]['brand'])=='2'){
                                $name="Mastercard";
                            }else{
                                $name="American express";
                            }
                            
                            echo $name;
                           
                            ?>

                Cards

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
                            <th scope="col">Card TYPE</th>
                            <th scope="col">INCLUDES</th>
                            <th scope="col">BALANCE</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">BUY NOW</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($cards as $card)
                            <tr>
                                <td>
                                    @if($card->brand==1)
                                        <img src="https://logsshop.info/assets/images/item-logo/visa.png" width="100"
                                            height="25">

                                    @elseif($card->brand==2)
                                        <img src="https://logsshop.info/assets/images/item-logo/mcard.png" width="100"
                                            height="25">
                                    @else
                                        <img src="https://logsshop.info/assets/images/item-logo/amex.png" width="100"
                                            height="25">
                                    @endif
                                </td>
                                <td>
                                    @if($card->brand==1)

                                        Visa

                                    @elseif($card->brand==2)

                                        Mastercard

                                    @else
                                        American express

                                    @endif
                                </td>
                                <td>
                                    CARD NUMBER,EXP CCV,
                                    NAME OF THE CARD,ADDRESS,CITY,STATE ZIP
                                </td>
                                <td>${{ $card->balance }}</td>


                                <td>${{ $card->price }}</td>

                                <td>
                                    <button type="button" class="btn btn-success">Active</button>
                                </td>

                                <td>
                                    <a href="{{ url('buycarditem') }}/{{ $card->id }}"
                                        class="btn btn-success">Buy now</a>
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
