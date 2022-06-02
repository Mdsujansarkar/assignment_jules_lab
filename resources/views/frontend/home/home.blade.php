@extends('frontend.master')
@section('view')
<header class="masthead">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    <h4 class="mb-5">URL Shortener</h4>
                    @if(session('success'))
                        <p>{!!session('success') !!}</p>
                    @endif
                
                    <form class="form-subscribe" id="contactForm" action="{{ route('url.short.store') }}" method="post">
                        @csrf
                        <!-- Email address input-->
                        <div class="row">
                            <div class="col">
                                <input 
                                 class="form-control form-control-lg" 
                                 id="emailAddress" type="url"
                                 placeholder="Enter Valide Url"
                                 data-sb-validations="required,url"
                                 name="main_url"
                                  />
                                  @error('main_url')
                                    <div class="text-danger">URL Address is required.</div>
                                  @enderror
                                
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                            </div>
                        </div>
                 
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Footer-->
@endsection
