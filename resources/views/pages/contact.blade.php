
<!--========================== extend-master-blade ==========================-->
@extends('layout.master')

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
                            <form action="mail.php" method="post">
                                <input type="text" name="username" placeholder="Name">
                                <input type="email" name="email_address" placeholder="Email">
                                <div class="web-address"><input type="text" name="web_address" class="web-address" placeholder="Website"></div>
                                <textarea placeholder="Comment" name="messages"></textarea>
                                <div class="submit-btn"><input type="submit" name="submit" value="send"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
