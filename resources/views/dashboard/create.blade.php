@extends('layout')

@section('content')

<div class="container">
    <div class=" text-center mt-5 ">
        <h2>Peminjaman Laptop</h2>
    </div>



    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form method="POST" action="/dashboard/store" id="create-form">
                            @csrf
                            <div class="landing py-3 "><b>Laptop Landing</b></div>
                            <p class="py-0">new data</p>
                            <hr>
                            <div class="landing py-2"><b>Please fill all the input with the right value</b></div>
                            <p class="mt-4">Form Input</p>
                            <hr>

                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Nis</label>
                                            <input id="form_name" type="text" name="nis" class="form-control"
                                                required="required" data-error="Firstname is required.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Name</label>
                                            <input id="form_name" type="text" name="nama" class="form-control"
                                                required="required" data-error="Firstname is required.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Region</label>
                                            <input id="form_name" type="text" name="region" class="form-control"
                                                required="required" data-error="Firstname is required.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Teacher</label>
                                            <input id="form_name" type="text" name="teacher" class="form-control"
                                                required="required" data-error="Firstname is required.">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">Purposes</label>
                                            <textarea id="form_message" name="purposes" class="form-control"
                                                placeholder="Write your message here." rows="4" required="required"
                                                data-error="Please, leave us a message."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">Ket</label>
                                            <textarea id="form_message" name="ket" class="form-control"
                                                placeholder="Write your message here." rows="4" required="required"
                                                data-error="Please, leave us a message."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Date</label>
                                            <input id="form_name" type="date" name="date" class="form-control"
                                                placeholder="Please enter your firstname *" required="required"
                                                data-error="Firstname is required.">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" id="contactus-submit" class="btn-success btn-lg btn"
                                                action="/">Submit</button>
                                            <a href="/" class="btn-dark btn-lg btn">Cancel</a>
                                        </div>
                                    </div>


                                </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
</div>


@endsection