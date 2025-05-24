@extends('frontend.layouts.app')

@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Blog Details</h1>
                <p><a href="/">Home</a>Blog Details</p>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Our Blog Details Area -->
    <div class="blog-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-content">
                        <h2>
                            <a href="blog.html">{{ $blog->title }}</a>
                        </h2>
                        <ul class="blog-date-list">
                            <li>
                                <i class="flaticon-calendar"></i><span>
                                    {{ date('F d, Y', strtotime($blog->created_at)) }}</span>
                            </li>
                        </ul>
                        <div class="blog-details-img-two">
                            <img src="{{ Storage::url($blog->featured_image) }}" alt="Images">
                        </div>

                        <div>
                            {{ $blog->short_description }}
                        </div>

                        <br>

                        <div>
                            {{ $blog->content }}
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <ul class="tag-list">
                                <li>
                                    <span>Tags:</span>
                                </li>

                                @forelse ($blog->tags as $tag)
                                    <li>
                                        <a href="javascript:void(0)">{{ $tag->name }}</a>
                                    </li>
                                @empty
                                    <li>
                                        <p>No Tag Found.</p>
                                    </li>
                                @endforelse
                            </ul>
                            <div class="details-list">
                                <ul>
                                    <li>
                                        <span>Share:</span>
                                    </li>
                                    <li>
                                        <a href="https://www.google.com/" target="_blank"><i
                                                class="flaticon-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank"><i
                                                class="flaticon-facebook-logo"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/" target="_blank"><i class="flaticon-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.pinterest.com/" target="_blank"><i
                                                class="flaticon-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <aside class="widget-area">
                        <div class="widget widget_pixab_posts_thumb">
                            <h3 class="widget-title">Recent Posts</h3>

                            @foreach ($recentBlogs as $recentBlog)
                                <article class="item">
                                    <a href="{{ route('blog.show', $recentBlog->id) }}" class="thumb">
                                        <span class="fullimage cover bg1" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall">
                                            <a href="{{ route('blog.show', $blog->id) }}">{{ $recentBlog->title }}</a>
                                        </h4>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>
                                                <i class="flaticon-calendar"></i>
                                                {{ date('F d, Y', strtotime($recentBlog->created_at)) }}
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="details-contact">
                            <h2>Contact</h2>

                            <div class="contact-details-bg">
                                <i class="flaticon-telephone"></i>
                                <h4>Phone</h4>
                                <a href="tel:+089027392793">+089027392793</a>
                            </div>

                            <div class="contact-details-bg">
                                <i class="flaticon-envelope"></i>
                                <h4>Email</h4>
                                <a href=""><span>[email&#160;protected]</span></a>
                            </div>

                            <div class="contact-details-bg">
                                <i class="flaticon-placeholder"></i>
                                <h4>Address</h4>
                                <p>50 Nortambiya, UK.</p>
                            </div>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our Blog Details Area -->
@endsection
