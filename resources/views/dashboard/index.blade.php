@extends('layout')

@section('content')
<div class="container">
    <div class=" text-center mt-5 ">
        <div class="row ">
            <div class="col-lg-6">
                <div class="card mt-2 mx-auto bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            @if (Session::get('successAdd'))
                            <div class="alert alert-success">
                                {{ Session::get('successAdd') }}
                            </div>
                            @endif
                            @if (Session::get('successDelete'))
                            <div class="alert alert-success">
                                {{ Session::get('successDelete') }}
                            </div>
                            @endif
                            @if (Session::get('successUpdate'))
                            <div class="alert alert-success">
                                {{ Session::get('successUpdate') }}
                            </div>
                            @endif
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
                                    <li><a href="{{route('index')}}">Laptop Lending</a></li>
                                    <li class="arrow">>></li>
                                    <li><a href="{{route('create')}}" class="text-dark">New</a></li>
                                    <li class="arrow">>></li>
                                    <li><a href="{{route('index')}}" class="text-success">Data</a></li>
                                </div>

                                <div class="row" style="margin-top: 20px; margin-right: 20px;">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">

                                            <div class="card-body">
                                                <h4 class="card-title">Laptop Landing data</h4>
                                                <h4 class="card-title">Data sort by date loaned</h4>
                                                <div>
                                                    <table class="table table-striped" id="table" style="width: 50px">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    NIS
                                                                </th>
                                                                <th>
                                                                    NAME
                                                                </th>
                                                                <th>
                                                                    REGION
                                                                </th>
                                                                <th>
                                                                    PURPOSES
                                                                </th>
                                                                <th>
                                                                    KET
                                                                </th>
                                                                <th>
                                                                    DATE
                                                                </th>
                                                                <th>
                                                                    RETURN DATE
                                                                </th>
                                                                <th>
                                                                    TEACHER
                                                                </th>
                                                                <th>
                                                                    ACTION
                                                                </th>

                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            @foreach ($laptops as $laptop)
                                                                <tr>
                                                                    <td>{{$laptop['nis']}}</td>
                                                                    <td>{{$laptop['nama']}}</td>
                                                                    <td>{{$laptop['region']}}</td>
                                                                    <td>{{$laptop['purposes']}}</td>
                                                                    <td>{{$laptop['ket']}}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($laptop['date'])->format('j F, Y') }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($laptop['done_time'])->format('j F, Y') }}</td>
                                                                    <td>{{$laptop['teacher']}}</td>
                                                                    <td><a href="/edit/{{$laptop['id']}}"
                                                                            class="fas fa-pen text-dark btn"></a>
                                                                        <form action="{{ route('delete', $laptop['id']) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="fas fa-trash text-danger btn"></button>
                                                                        </form>
                                                                        <form action="/complated/{{$laptop['id']}}" method="POST">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <button type="submit" class="fa-solid fa-check-to-slot text-primary btn"></button>
                                                                        </form>
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
