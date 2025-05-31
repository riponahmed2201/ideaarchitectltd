<div class="articles-area bg-color-3 pb-70">
    <div class="container">
        <div class="section-title center-title">
            <span class="top-title">Client Success Stories</span>
            <h2>Where Vision Meets Satisfaction</h2>
        </div>
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="ratio ratio-16x9">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $video->url }}"
                            title="{{ $video->title }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    {{-- <div class="articles-content blog-content-two">
                        <div class="articles-text">
                            <ul>
                                <li><i class="flaticon-trust"></i>{{ $video->area_sft }}</li>
                            </ul>
                            <a href="javascript:void(0)">
                                <h3>{{ $video->title }}</h3>
                            </a>
                            <div class="read-more-btn">
                                <a href="javascript:void(0)">
                                    {{ $video->description }}
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            @endforeach
        </div>
    </div>
</div>
