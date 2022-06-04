@extends('frontend.master')
@section('signup')
<a class="btn btn-primary" href="{{ route('user.add') }}">Sign In</a>
@endsection
@section('view')
<header class="masthead">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    <h4 class="mb-5">URL Shortener</h4>
                    @if(session('success'))
                        <p>{!! session('success') !!}</p>
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
    <div class="container">
    <div class="row">
        <div class="col-xl-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <!-- <th scope="col">Main URL</th> -->
                <th scope="col">Short URL</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                @if(session('success'))
                <td id="copy-id"><a href="{!! session('success') !!}" target="_blank" style="color:aliceblue">{!! session('success') !!}</a></td>
                @endif
             
                <td><button id="click-to-copy">copy!</button></td>

            </tr>
        </tbody>
        </table>
        </div>
        </div>
    </div>
</header>
<!-- Footer-->
@endsection
