        <!-- portfolio section -->
        <section class="section" id="portfolio">
            <div class="container text-center">
                <p class="section-subtitle">What I Did ?</p>
                <h6 class="section-title mb-6">Portfolio</h6>
                <!-- row -->
                <div class="row">
                    @foreach ($dat as $k)
                        <div class="col-md-4">
                            <a href="{{$k->url}}" class="portfolio-card">
                                <img src="{{Storage::url($k->patch)}}" class="portfolio-card-img" alt="mp">
                                <span class="portfolio-card-overlay">
                                    <span class="portfolio-card-caption">
                                        <h4>{{$k->title}}</h5>
                                            <p class="font-weight-normal">Categoria: {{$k->type}}</p>
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div><!-- end of row -->
            </div><!-- end of container -->
        </section> <!-- end of portfolio section -->