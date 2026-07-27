<div class="counter-area counter-two pt-100 pb-100">
    <div class="container">
        <div class="counter bg-color-2">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="counter-content content-two">
                        <i class="flaticon-rating"></i>
                        <h2>
                            <span class="odometer" data-count="{{ $counters['total_projects'] ?? 0 }}">00</span>
                            <span class="target">+</span>
                        </h2>
                        <p>Total Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="counter-content content-two">
                        <i class="flaticon-meeting"></i>
                        <h2>
                            <span class="odometer" data-count="{{ $counters['finished_projects'] ?? 0 }}">00</span>
                            <span class="target">+</span>
                        </h2>
                        <p>Completed Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="counter-content content-two">
                        <i class="flaticon-settings"></i>
                        <h2>
                            <span class="odometer" data-count="{{ $counters['satisfied_clients'] ?? 0 }}">00</span>
                            <span class="target">+</span>
                        </h2>
                        <p>Satisfied Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="counter-content content-two">
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
</div>
