@extends('layouts.app')

@section('content')


    <!-- end page title -->

    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Create a deposit request</h4>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch form-switch-right form-switch-md">
                                            <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                                        </div>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="row gy-4">
                                        <marquee>All deposits are made in Bitcoin</marquee>
                                        <form action="{{url('post/deposit')}}" method="post">
                                            @csrf
                                            <div class="col-xxl-3 col-md-6">
                                                <div>
                                                    
                                                    <label for="basiInput" class="form-label">Amount in usd</label>
                                                    <input type="text" class="form-control" name="amount" id="basiInput" min="100" required>
                                                </div>
                                                <div>
                                                    
                                                    <label for="basiInput" class="form-label">Bitcoin address</label>
                                                    <input type="text" class="form-control" id="basiInput" value="3BSu4sMZkgGS9BCnrwHChychuEjcRVYv9q" readonly>
                                                </div>

                                                <p>Or scan the image below to send the coins</p>

                                                <img src="{{url('scan.jpg')}}">
                                                <br><br>
                                                <button class="btn btn-info">I confirm i have made a deposit to the address above</button>
                                            </div>

                                        </form>

                                            
                                           
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                             


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    




@endsection