@extends('layouts.app')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="margin-top:-24px;background-image: url({{ asset('assets/images/hero_1.jpg') }});" id="home-section">
    </section>

    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2>Edit My Profile</h2>
                        </div>
                    </div>
                </div>

            </div>
            <form class="p-4 p-md-5 border rounded" action="{{ route('update.profile') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="job-title">Name</label>
                    <input type="text" name="full_name" class="form-control" id="full_name"
                        value="{{ Auth::user()->name }}" placeholder="Full name">
                </div>


                <div class="form-group">
                    <label for="job-region">Job title</label>
                    <input type="text" name="job_title" class="form-control" id="job_title"
                        value="{{ Auth::user()->job_title }}" placeholder="Job title">
                </div>

                <div class="form-group">
                    <label for="job-type">Email ID</label>
                    <input type="mail" name="email" class="form-control" id="email"
                        value="{{ Auth::user()->email }}" placeholder="Email address" readonly>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="">Bio</label>
                        <textarea name="bio" id="bio" cols="30" rows="7" class="form-control" placeholder="Write bio...">{{ Auth::user()->bio }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fb">Facebook</label>
                    <input type="text" name="fb" class="form-control" id="fb" value="{{ Auth::user()->fb }}"
                        placeholder="Facebook username">
                </div>

                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" class="form-control" id="twitter"
                        value="{{ Auth::user()->twitter }}" placeholder="Twitter username">
                </div>

                <div class="form-group">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" name="linkedin" class="form-control" id="linkedin"
                        value="{{ Auth::user()->linkedin }}" placeholder="LinkedIn username">
                </div>


                <div class="col-lg-4 ml-auto">
                    <div class="row">
                        <div class="col-6">
                            <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                                style="margin-left: 200px;" value="Save Profile">
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </section>
@endsection
