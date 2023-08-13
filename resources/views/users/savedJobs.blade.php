@extends('layouts.app')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="margin-top:-24px;background-image: url({{ asset('assets/images/hero_1.jpg') }});" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Saved Jobs</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{ route('home') }}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Saved Jobs</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="next">
        <div class="container">
            @if ($matchingJobs->count() > 0)
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2 class="section-title mb-2">Saved Jobs({{ $matchingJobs->count() }})</h2>
                    </div>
                </div>

                <ul class="job-listings mb-5">
                    @foreach ($matchingJobs as $relatedjob)
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="{{ route('single.job', $relatedjob->id) }}"></a>
                            <div class="job-listing-logo">
                                <img src="{{ asset('assets/images/' . $relatedjob->company_logo . '') }}" alt="Image"
                                    class="img-fluid">
                            </div>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>{{ $relatedjob->job_title }}</h2>
                                    <strong>{{ $relatedjob->company_name }}</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> {{ $relatedjob->job_region }}
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-danger">{{ $relatedjob->job_type }}</span>
                                </div>
                            </div>

                        </li>
                    @endforeach
                </ul>
        </div>
    @else
        <div class="alert alert-info text-center" role="alert">
            You haven't saved any jobs yet.
        </div>
        @endif
    </section>
@endsection
