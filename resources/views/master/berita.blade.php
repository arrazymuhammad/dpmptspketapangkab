@extends('master.master')

@section('content')
			
				<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Berita</a></li>
									<li class="active"> Berita Terbaru</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-9">
							<div class="blog-posts">
								@foreach($berita as $var)
								<article class="post post-medium">
									<div class="row">

										<div class="col-md-5">
											<div class="post-image">
												<div class="owl-carousel owl-theme" data-plugin-options='{"items":1}'>
													<div>
														<div class="img-thumbnail">
															<img class="img-responsive" id="gambarblog" src="{{url(''.$var->gambar.'')}}" alt="">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-7">

											<div class="post-content">

												<h2 style="text-align: left;"><a href="{{ url('detailberita/'.$var->id_berita.'') }}" >{{$var->judul}}</a></h2>
												<p style="text-align: justify;">{!!Date::truncate(($var->deskripsi), 50, 1100)!!}</p>

											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="post-meta">
												<span><i class="fa fa-calendar"></i> {{Date::indonesian_date($var->tanggal,'j F Y')}}</span>
												<span><i class="fa fa-user"></i> By <a href="#">Admin</a> </span>
												<span><i class="fa fa-tag"></i> {{$var->tags}}</span>
												<a href="{{ url('detailberita/'.$var->id_berita.'') }}" class="btn btn-xs btn-primary pull-right">Read more...</a>
											</div>
										</div>
									</div>

								</article>
								@endforeach
								
								<ul class="pagination pagination-lg pull-right">
									<?php echo $berita->render(); ?>
								</ul>

							</div>
						</div>

						<div class="col-md-3">
							<aside class="sidebar">
								@include('master.sidebar')
							</aside>
						</div>
					</div>

				</div>

			</div>
@endsection
