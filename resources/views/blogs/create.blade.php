@extends('layouts.app')

@section('title', '創建blog')

@section('header')
    @include('layouts.header',
    ['img' => '/assets/img/contact-bg.jpg',
    'heading' => '創建文章',
    'subheading' => 'A Blog by Start Laravle & Bootstrap'])
@endsection

@section('content')
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon
                        as possible!</p>
                    <div class="my-5">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <div class="form-floating">
                                <input class="form-control" id="title" type="text" placeholder="Enter your title..."
                                    data-sb-validations="required" name="title" />
                                <label for="title">標題</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A title is required.</div>
                            </div>
                            <div class="my-4">
                                <select class="form-select form-select-lg" aria-label="Default select example" name="type">
                                    <option value="0" selected>請選擇分類</option>
                                    @foreach ($categories as $id => $categories);
                                        <option value="{{ $id }}">{{ $categories }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="content" placeholder="Enter your content here..."
                                    style="height: 12rem" data-sb-validations="required"></textarea>
                                <label for="content">內容</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A content is required.
                                </div>
                            </div>
                            <br />
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a
                                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase disabled" id="submitButton"
                                type="submit">確定送出</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
