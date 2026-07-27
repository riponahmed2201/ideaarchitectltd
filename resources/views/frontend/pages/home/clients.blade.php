<section class="ia-clients" id="clients">
    <div class="container">
        <div class="ia-section-head ia-section-head--center">
            <span class="ia-label">Clients</span>
            <h2>We are Trusted by</h2>
        </div>
        <div class="partners-logo-slider owl-carousel owl-theme">
            @foreach (getClients() as $client)
                <div class="partners-logo">
                    <a href="javascript:void(0)">
                        <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
