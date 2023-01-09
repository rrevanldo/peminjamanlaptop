@extends('layout')

@section('content')
    <div class="container">
        <div class=" text-center mt-5 ">
            <div class="row ">
                <div class="col-lg-6">
                    <div class="card mt-2 mx-auto bg-light">
                        <div class="card-body bg-light">
                            <div class="container">
                                <div class="controls">
                                    <div class="row">
                                        <div class="d-flex">
                                            <div class="kiri">
                                                <p>Lab. RPL/PPLG</p>
                                                <p>Laptop Lending</p>
                                            </div>

                                            <div class="kanan" style="margin-left: 950px;">
                                                <img src="{{asset('assets/img/rpl.jpg')}}" class="rounded-circle"
                                                    width="35">
                                                <img src="{{asset('assets/img/wikrama.png')}}" class="rounded-circle"
                                                    width="35">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="breadcrumbs">
                                        <li><a href="{{route('dashboard.index')}}">Laptop Lending</a></li>
                                        <li class="arrow">>></li>
                                        <li><a href="{{route('dashboard.create')}}" class="text-dark">New</a></li>
                                        <li class="arrow">>></li>
                                        <li><a href="{{route('dashboard.data')}}" class="text-success">Data</a></li>
                                    </div>

                                    <div class="row" style="margin-top: 20px; margin-right: 20px;">
                                        <div class="col-lg-12 grid-margin stretch-card">
                                            <div class="card">

                                                <div class="card-bodyx">
                                                    <h4 class="card-title">Laptop Landing data</h4>
                                                    <h4 class="card-title">Data sort by date loaned</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection