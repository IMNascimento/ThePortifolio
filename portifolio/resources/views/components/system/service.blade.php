        <!-- service section -->
        <section class="section" id="service">
            <div class="container text-center">
                <p class="section-subtitle">What I Do ?</p>
                <h6 class="section-title mb-6">Service</h6>
                <!-- row -->
                <div class="row">
                    @foreach ($dat as $k)
                        <div class="col-md-6 col-lg-3">
                            <div class="service-card">
                                <div class="body">
                                    <img src="{{Storage::url($k->icon)}}" alt="page" class="icon">
                                    <h6 class="title">{{$k->title}}</h6>
                                    <p class="subtitle">{{$k->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- end of row -->
            </div>
        </section><!-- end of service section -->