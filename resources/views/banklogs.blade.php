@extends('layouts.app')

@section('content')

<div class="col-xl-12">


    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">

                <?php
                            $bankname=App\Models\Banks::where('id',request()->id)->get('name');

                            echo $bankname[0]['name'];

                           
                            ?>

                Logs

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
                            <th scope="col">TYPE</th>
                            <th scope="col">INCLUDES</th>
                            <th scope="col">BALANCE</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">BUY NOW</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($banklogs as $banklog)
                            <tr>
                                <td>
                                    @if($banklog->bank==1)
                                        <img src="https://logsshop.info/assets/images/item-logo/chase.png" width="100"
                                            height="25">
                                    @endif
                                </td>
                                <td>
                                    <?php
                            $bankname=App\Models\Banks::where('id',request()->id)->get('name');

                            echo $bankname[0]['name'];

                           
                            ?>
                                </td>
                                <td>
                                    {{$banklog->info}}
                                </td>
                                <td>${{$banklog->balance}}</td>

                                
                                <td>${{$banklog->price}}</td>

                                <td>
                                    <button type="button" class="btn btn-success">Active</button>
                                </td>

                                <td>
                                    <a href="{{url('buylogs')}}/{{$banklog->id}}" class="btn btn-success">Buy now</a>
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
