<?php 
	$url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

	$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
?>
@extends('master.master')

@section('url'){{ ($url) }}@stop

@section('title'){!!$view->judul!!}@stop

@section('image'){{url(''.$view->gambar.'')}}@stop

@section('description'){!!Date::truncate(($view->deskripsi), 50, 1100)!!}@stop

@section('content')
				
				<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Berita</a></li>
									<li class="active"> Detail Berita</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-9">
							<div class="blog-posts single-post">

								<article class="post post-large blog-single-post">
									<div class="post-image">
										<div class="owl-carousel owl-theme" data-plugin-options='{"items":1}'>
											<div>
												<div class="img-thumbnail" id="gambarblogdetail">
													<img class="img-responsive" src="{{url(''.$view->gambar.'')}}" alt="">
												</div>
											</div>
										</div>
									</div>

									<div class="post-date">
										<span class="day">{{Date::indonesian_date($view->tanggal,'j')}}</span>
										<span class="month">{{substr(Date::indonesian_date($view->tanggal,'F'), 0, 3)}}</span>
									</div>

									<div class="post-content">

										<h2><a href="{{ url('detailberita/'.$view->id_berita.'') }}">{{$view->judul}}</a></h2>

										<div class="post-meta">
											<span><i class="fa fa-user"></i> By <a href="#">Admin</a> </span>
											<span><i class="fa fa-tag"></i> {{$view->tags}} </span>
										</div>

										<p style="text-align: justify;">{!!$view->deskripsi!!}</p>


										<div class="post-block post-share">
											<h3 class="heading-primary"><i class="fa fa-share"></i>Share this post</h3>

											<div class="social-buttons">

											    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
											       target="_blank">
											       <i class="fa fa-facebook-official" style="font-size: 30px;"></i>
											    </a>
											    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}"
											       target="_blank">
											        <i class="fa fa-twitter-square" style="font-size: 30px;"></i>
											    </a>
											    <a href="https://plus.google.com/share?url={{ urlencode($url) }}"
											       target="_blank">
											       <i class="fa fa-google-plus-square" style="font-size: 30px;"></i>
											    </a>
											</div>
											<!-- AddThis Button END -->

										</div>

									</div>
								</article>

							</div>
						</div>

						<div class="col-md-3">
							<aside class="sidebar">
							
								<form>
									<div class="input-group input-group-lg">
										<input class="form-control" placeholder="Search..." name="s" id="s" type="text">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
										</span>
									</div>
								</form>
							
								<hr>
							
								<div class="tabs mb-xlg">
									
								<h4 class="heading-primary">Berita Terbaru</h4>
									<div class="tab-content">
										<div class="tab-pane active" id="popularPosts">
											<ul class="simple-post-list">
											@foreach($berita as $var)
												<li>
													<div class="post-image">
														<div class="img-thumbnail" id="gambarrecent">
															<a href="{{ url('detailberita/'.$var->id_berita.'') }}">
																<img src="{{url(''.$var->gambar.'')}}" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="{{ url('detailberita/'.$var->id_berita.'') }}">{{Date::truncate(($var->judul), 4, 100)}}</a>
														<div class="post-meta">
															 {{Date::indonesian_date($var->tanggal,'j F Y')}}
														</div>
													</div>
												</li>
											@endforeach
											</ul>
										</div>
									</div>
								</div>
							
								<hr>
							
								
							
							</aside>
						</div>
					</div>

				</div>

			</div>

			</div>
@endsection
@section('custom-scripts')
<script>
	$('#share_button').click(function(e){
	        e.preventDefault();
	        var title = 'Title I want';
	        var im_url = 'url_to_image';
	        var facebook_appID = 'YourFacebookAppID'
	        url = "https://www.facebook.com/dialog/feed?app_id="+ facebook_appID +    "&link=" + encodeURIComponent("http://www.THEPAGE.com")+ 
	                    "&name=" + encodeURIComponent(title) + 
	                    "&caption=" + encodeURIComponent('Shared from MY_PAGE') + 
	                    "&description=" + encodeURIComponent('DESCRIPTION') + 
	                    "&picture=" + encodeURIComponent("http://www.THEPAGE.com" +im_url) +
	                    "&redirect_uri=https://www.facebook.com";
	        window.open(url);
	    });
</script>

@stop