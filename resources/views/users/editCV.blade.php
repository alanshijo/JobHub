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
                            <h2>Upload CV</h2>
                        </div>
                    </div>
                </div>

            </div>
            <form class="p-4 p-md-5 border rounded" action="{{ route('update.cv') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="job-title">Upload CV</label>
                    <input type="file" name="cv_file" class="form-control" id="cv_file"
                        value="{{ Auth::user()->cv_file }}" placeholder="CV">
                </div>
                @error('cv_file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="col-lg-4 ml-auto">
                    <div class="row">
                        <div class="col-6">
                            <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                                style="margin-left: 200px;" value="Upload CV">
                        </div>
                    </div>
                </div>


            </form>
            <span class="text-danger">*Only pdf and docx files are supported</span>
        </div>
    </section>
@endsection
