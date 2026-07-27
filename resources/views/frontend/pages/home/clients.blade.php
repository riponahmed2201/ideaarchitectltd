<div class="clients-area ptb-100" id="clients">
    <div class="container">
        <div class="section-title">
            <span class="top-title">CLIENTS</span>
            <h2>We are Trusted by</h2>
        </div>
        <div class="partners-logo-slider owl-carousel owl-theme">
            @foreach (getClients() as $client)
                <div class="partners-logo">
                    <a href="javascript:void(0)">
                        <img style="width: 191px; height:97px" src="{{ Storage::url($client->logo) }}"
                            alt="{{ $client->name }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
