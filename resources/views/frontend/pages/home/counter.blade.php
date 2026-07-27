<section class="ia-stats">
    <div class="container">
        <div class="ia-stats-inner">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6" data-aos="fade-up">
                    <div class="ia-stat-item">
                        <i class="flaticon-rating"></i>
                        <h2>
                            <span class="odometer" data-count="{{ $counters['total_projects'] ?? 0 }}">00</span>
                            <span class="target">+</span>
                        </h2>
                        <p>Total Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="ia-stat-item">
                        <i class="flaticon-meeting"></i>
                        <h2>
                            <span class="odometer" data-count="{{ $counters['finished_projects'] ?? 0 }}">00</span>
                            <span class="target">+</span>
                        </h2>
                        <p>Completed Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="ia-stat-item">
                        <i class="flaticon-settings"></i>
                        <h2>
                            <span class="odometer" data-count="{{ $counters['satisfied_clients'] ?? 0 }}">00</span>
                            <span class="target">+</span>
                        </h2>
                        <p>Satisfied Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="ia-stat-item">
                        <i class="flaticon-award-symbol"></i>
                        <h2>
                            <span class="odometer" data-count="{{ $counters['awards'] ?? 0 }}">00</span>
                            <span class="target">+</span>
                        </h2>
                        <p>Awards Winning</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
