
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'Contact')

<!--========================== include content ==========================-->
@section('content')
    <!--============================== contact-area-start ================================-->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="contact-content-border">
                        <div class="contact-content">
                            <h4>contact</h4>
                            <form action="{{ route('message.store') }}" method="post">
                                @csrf
                                <input type="text"
                                       name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                                <input type="email"
                                       name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                                <br><br>
                                <textarea placeholder="Write something..."
                                          name="message" required>{{ old('message') }}</textarea>
                                <div class="submit-btn"><input type="submit" name="submit" value="send"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
