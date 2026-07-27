<div class="team-area pt-100 pb-70">
    <div class="container">
        <div class="section-title center-title">
            <span class="top-title">OUR PROFESSIONALS</span>
            <h2>Meet Our Expert Team</h2>
        </div>
        <div class="row">
            @forelse ($teamMembers as $user)
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-member-content">
                        <div class="team-img">
                            <img style="width:100%; height:350px; object-fit:cover"
                                src="{{ $user?->profile?->picture ? Storage::url($user->profile->picture) : asset('assets/logo/logo.png') }}"
                                alt="{{ $user->name }}">
                        </div>
                        <div class="single-team-item">
                            <div class="team-content-bg">
                                <h3>{{ $user->name }}</h3>
                                <p>{{ $user?->profile?->designation ?? 'Team Member' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Team information coming soon.</p>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="/about-us" class="default-btn">Meet Full Team <i class="flaticon-next"></i></a>
        </div>
    </div>
</div>
