@extends('frontend.frontend_master')
@section('title')
    Contact Us
@endsection
@section('content')
<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 pt-5">
            <div class="card con-card pt-5 border-1 ">
                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-sm-6 bg-image"></div>
                        <div class="col-sm-6 p-4">
                            <div class="text-center">
                                <div class="h3 fw-light">Contact Us Now</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Name" />
                                <label for="name" class="text-muted">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="emailAddress" type="email"
                                    placeholder="Email Address" />
                                <label for="emailAddress" class="text-muted">Email Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Message"
                                    style="height: 7rem;">
                            </textarea>
                                <label for="message">Message</label>
                            </div>
                            <div>
                                <button type="button"
                                    class="btn btn-sub border border-1 btn-primary btn-lg">Submit</button>

                            </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
