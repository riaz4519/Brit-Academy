@extends('.layout.exam_controller')


@section('container')

    <!-- ##### Register Now Start ##### -->
    <section class="register-now section-padding-100-1 d-flex justify-content-center align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="forms">
                            <h4>Create Test</h4>
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="text" placeholder="Enter Test Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Academic Test</label>
                                            <input type="checkbox" class="form-control" id="checkbox" placeholder="Academic Test">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Academic Test</label>
                                            <input type="checkbox" class="form-control" id="checkbox" placeholder="Academic Test">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="site" placeholder="Site">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- ##### Register Now End ##### -->

    @endsection