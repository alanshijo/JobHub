@extends('layouts.app')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="margin-top:-24px;background-image: url({{ asset('assets/images/hero_1.jpg') }});" id="home-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! \Session::get('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card p-3 py-4">
                        <div class="edit-profile">
                            <a class="btn btn-primary btn-sm float-right" href="{{ route('edit.profile') }}"
                                role="button">Edit profile</a>

                            <a class="btn btn-danger btn-sm float-right mr-2" href="{{ route('edit.cv') }}"
                                role="button">Update CV</a>
                        </div>

                        <div class="text-center">
                            <img src="{{ asset('assets/images/profile/' . Auth::user()->profile_img . '') }}" width="100"
                                class="rounded-circle">
                        </div>


                        <div class="text-center mt-3">
                            <h5 class="mt-2 mb-2 fw-bold">{{ Auth::user()->name }}</h5>
                            <span class="text-muted">{{ Auth::user()->job_title }}</span>

                            <div class="px-4 mt-1">
                                <p class="fonts">{{ Auth::user()->bio }}</p>

                            </div>

                            <div class="px-3">
                                @if (Auth::user()->fb)
                                    <a href="https://www.facebook.com/{{ Auth::user()->fb }}" target="_blank"
                                        class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                                @endif

                                @if (Auth::user()->twitter)
                                    <a href="https://twitter.com/{{ Auth::user()->twitter }}" target="_blank"
                                        class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                                @endif

                                @if (Auth::user()->linkedin)
                                    <a href="https://www.linkedin.com/in/{{ Auth::user()->linkedin }}" target="_blank"
                                        class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                                @endif
                            </div>

                            @if (Auth::user()->cv_file)
                                <a href="{{ asset('assets/cvs/' . Auth::user()->cv_file . '') }}" target="_blank"
                                    class="btn btn-outline-success btn-block my-2">Download CV</a>
                            @endif



                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
