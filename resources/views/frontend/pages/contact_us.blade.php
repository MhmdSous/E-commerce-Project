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
                                <form action="javascript:;" method="POST">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Name" name="name" />
                                        <label for="name" class="text-muted">Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="emailAddress" type="email"
                                            placeholder="Email Address" name="email" />
                                        <label for="emailAddress" class="text-muted">Email Address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="message" name="message" type="text" placeholder="Message" style="height: 7rem;" />

                                        <label for="message">Message</label>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="btn btn-sub border border-1 btn-primary btn-lg submit Submit">Submit</button>

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

@section('scripts')
<script>
        $(document).on('click', '.Submit', function() {

            var name = $('#name').val();
            var email = $('#emailAddress').val();
            var message = $('#message').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('/contact_us/submit') }}",
                method: "POST",
                data: {
                    name: name,
                    email: email,
                    message: message,
                },
                success: function(res) {
                    toastr.success(res.message);
                    $('#name').val('');
                    $('#emailAddress').val('');
                    $('#message').val('');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    toastr.error('An error occurred while adding the product.');
                }
            });






        });
</script>
@endsection
