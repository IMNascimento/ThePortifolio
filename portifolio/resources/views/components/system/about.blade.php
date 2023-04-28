        <!-- about section -->
        <section class="section pt-0" id="about">
            <!-- container -->
            <div class="container text-center">
                <!-- about wrapper -->
                <div class="about">
                    <div class="about-img-holder">
                        <img src="{{Storage::url($dat[0]->patch)}}" class="about-img"   alt="page">
                    </div>
                    <div class="about-caption">
                        <p class="section-subtitle">Who Am I ?</p>
                        <h2 class="section-title mb-3">About Me</h2>
                        <p>
                            {{$dat[0]->description}}
                        </p>
                        <button class="btn-rounded btn btn-outline-primary mt-4">Download CV</button>
                    </div>
                </div><!-- end of about wrapper -->
            </div><!-- end of container -->
        </section> <!-- end of about section -->