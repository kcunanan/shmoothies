@extends('master')
@section('title', 'Shmoothies - The College Food Blog')
@section('meta')
  <meta property="og:image" content="{{ URL::asset('img/logo/shmoothies-logo3.png') }}" />

  <meta property="og:description" content="Just your average college kids struggling and eating their way through college." />

  <meta property="og:url" content="http://shmoothies.com" />

  <meta property="og:title" content="shmoothies.com - The Claremont Colleges Food Blog" />
@endsection
@section('styles')
  <style>
    a img.fade {
       opacity: 1;
       transition: opacity .25s ease-in-out;
       -moz-transition: opacity .25s ease-in-out;
       -webkit-transition: opacity .25s ease-in-out;
     }
    a img.fade:hover {
      opacity: 0.5;
    }
  </style>
@endsection
@section('main')
            <section class="contents-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="blog-post-slider">
                                @foreach($blogs as $blog)
                                @if($loop->index > 2)
                                  @break
                                @endif
                                <article class="blog-post">
                                    <header>
                                        <figure>
                                            <a href="/section/{{ $blog->blog_category }}/{{ $blog->blog_url }}"><img class="fade" src="{{ URL::asset('img/blog_covers/'.$blog->media_url)  }}"></a>
                                        </figure>
                                        <ul class="categories">
                                            <li><a href="/section/{{ $blog->blog_category }}">{{ $blog->blog_category }}</a></li>
                                        </ul>
                                        <h3><a href="/section/{{ $blog->blog_category }}/{{ $blog->blog_url }}">{{ $blog->blog_title }}</a></h3>
                                    </header>
                                    <footer>
                                        <div class="meta">
                                            <span><time datetime="{{ $blog->date_posted }}">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $blog->date_posted)->format('F j, Y') }}</time></span>
                                            <span>{{ $blog->blog_views }} Views</span>
                                            <span><a href="#">{{ $blog->blog_shares }} Shares</a></span>
                                        </div><!-- /meta -->
                                    </footer>
                                </article>
                                @endforeach
                            </div><!-- /slider -->
                        </div><!-- /col-md-8 -->
                        <div class="col-md-4">
                            @foreach($popular as $blog)
                              @if($loop->last)
                                @break
                              @endif
                            <article class="blog-post featured-post">
                                <header>
                                    <figure>
                                        <a href="/section/{{ $blog->blog_category }}/{{ $blog->blog_url }}"><img class="fade" src="{{ URL::asset('img/blog_covers/'.$blog->media_url)  }}"></a>
                                    </figure>
                                    <h3><a href="/section/{{ $blog->blog_category }}/{{ $blog->blog_url }}">{{ $blog->blog_title }}</a></h3>
                                </header>
                            </article>
                            @endforeach
                        </div><!-- /col-md-4 -->
                        <div class="col-md-8">
                            <div class="blog-tabs clearfix">
                                <a href="#latest-posts" class="active">Latest Stories</a>
                                <a href="#popular-posts">Popular Stories</a>
                            </div><!-- /page-titlebar -->
                            <div id="latest-posts" class="tab-contents active">
                                <div class="contents-inner grid-view clearfix">
                                    @foreach($blogs as $blog)
                                      <article class="blog-post col-md-6 col-sm-6">
                                          <header>
                                              <figure>
                                                  <a href="/section/{{ $blog->blog_category }}/{{ $blog->blog_url }}"><img class="fade" src="{{ URL::asset('img/blog_covers/'.$blog->media_url)  }}"></a>
                                              </figure>
                                              <ul class="categories">
                                                  <li><a href="/section/{{ $blog->blog_category }}">{{ $blog->blog_category }}</a></li>
                                              </ul>
                                              <h3><a href="section/{{ $blog->blog_category }}/{{ $blog->blog_url }}">{{ $blog->blog_title }}</a></h3>
                                              <div class="meta">
                                                  <span><time datetime="{{ $blog->date_posted }}">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $blog->date_posted)->format('F j, Y') }}</time></span>
                                                  <span>{{ $blog->blog_views }} Views</span>
                                                  <span><a href="#">{{ $blog->blog_shares }} Shares</a></span>
                                              </div><!-- /meta -->
                                          </header>
                                          <div class="post-content">
                                              <p>{{ $blog->heading }}</p>
                                          </div><!-- /post-content -->
                                      </article>
                                    @endforeach
                                </div><!-- /contenblog-popular-poststs-inner -->
                            </div><!-- /blog-latest-posts -->
                            <div id="popular-posts" class="tab-contents">
                                <div class="contents-inner grid-view clearfix">
                                    @foreach($popular as $blog)
                                      <article class="blog-post col-md-6 col-sm-6">
                                          <header>
                                              <figure>
                                                  <a href="/section/{{ $blog->blog_category }}/{{ $blog->blog_url }}"><img class="fade" src="{{ URL::asset('img/blog_covers/'.$blog->media_url)  }}"></a>
                                              </figure>
                                              <ul class="categories">
                                                  <li><a href="/section/{{ $blog->blog_category }}">{{ ucwords($blog->blog_category) }}</a></li>
                                              </ul>
                                              <h3><a href="#">{{ $blog->blog_title }}</a></h3>
                                              <div class="meta">
                                                  <span><time datetime="{{ $blog->date_posted }}">{{ $blog->date_posted->format('F j, Y') }}</time></span>
                                                  <span>{{ $blog->blog_views }} Views</span>
                                                  <span><a href="#">{{ $blog->blog_shares }} Shares</a></span>
                                              </div><!-- /meta -->
                                          </header>
                                          <div class="post-content">
                                              <p>{{  $blog->heading }}</p>
                                          </div><!-- /post-content -->
                                      </article>
                                    @endforeach
                                </div><!-- /contents-inner -->
                            </div><!-- /blog-popular-posts -->
                            <div class="blog-navigation clearfix">
                                <a href="#" class="ajax-load-more">Load More</a>
                            </div><!-- /blog-navigation -->
                        </div><!-- /col-md-8 -->
@endsection
