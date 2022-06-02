@extends('frontend.master')
@section('view')
<header class="masthead">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    <h4 class="mb-5">URL Shortener</h4>
                
                    <form class="form-subscribe" id="contactForm" action="{{ route('url.short.store') }}" method="post">
                        @csrf
                        <!-- Email address input-->
                        <div class="row">
                            <div class="col">
                                <input class="form-control form-control-lg" id="emailAddress" type="url" placeholder="Enter Valide Url" data-sb-validations="required,URL" />
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">URL Address is required.</div>
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">URL Address URL is not valid.</div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Footer-->
@endsection
