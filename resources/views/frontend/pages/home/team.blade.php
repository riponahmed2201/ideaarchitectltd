<section class="ia-team">
    <div class="container">
        <div class="ia-section-head ia-section-head--center">
            <span class="ia-label">Our Professionals</span>
            <h2>Meet Our Expert Team</h2>
        </div>

        @if ($teamMembers->count())
            <div class="ia-team-slider owl-carousel owl-theme">
                @foreach ($teamMembers as $user)
                    <div class="ia-team-slide">
                        <div class="ia-team-card">
                            <div class="ia-team-img">
                                <img src="{{ $user?->profile?->picture ? Storage::url($user->profile->picture) : asset('assets/logo/logo.png') }}"
                                    alt="{{ $user->name }}">
                            </div>
                            <div class="ia-team-info">
                                <h3>{{ $user->name }}</h3>
                                <p>{{ $user?->profile?->designation ?? 'Team Member' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted">Team information coming soon.</p>
        @endif

        <div class="text-center mt-4">
            <a href="/about-us" class="default-btn">Meet Full Team <i class="flaticon-next"></i></a>
        </div>
    </div>
</section>
