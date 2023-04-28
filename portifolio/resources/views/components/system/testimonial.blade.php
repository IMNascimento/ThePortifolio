        <!-- testimonial section -->
        <section class="section" id="testmonial">
            <div class="container text-center">
                <p class="section-subtitle">What Think Client About Me ?</p>
                <h6 class="section-title mb-6">Testmonial</h6>
    
                <!-- row -->
                <div class="row">
                    @foreach ($dat as $k)
                        <div class="col-md-6">
                            <div class="testimonial-card">
                                <div class="testimonial-card-img-holder">
                                    <img src="{{Storage::url($k->patch)}}" class="testimonial-card-img"  alt="templatespage">
                                </div>
                                <div class="testimonial-card-body">
                                    <p class="testimonial-card-subtitle">{{$k->report}}</p>
                                    <h6 class="testimonial-card-title">{{$k->name}}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> <!-- end of container -->
        </section> <!-- end of testimonial section -->