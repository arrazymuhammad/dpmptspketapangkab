@extends('master.master')

@section('content')
			
				<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Galeri</a></li>
									<li class="active"> Galeri Terbaru</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div role="main" class="main">

				<div class="container">

					<h2><strong> Galeri</strong></h2>

					<ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter" data-plugin-options='{"layoutMode": "fitRows", "filter": "*"}'>
					</ul>

					<hr>

					<div class="row">

						<div class="sort-destination-loader sort-destination-loader-showing">
							<ul class="portfolio-list sort-destination lightbox" data-sort-id="portfolio" data-plugin-options='{"delegate": "a.lightbox-portfolio", "type": "image", "gallery": {"enabled": true}}'>
								@foreach($galeri as $var)
								<li class="col-md-3 col-sm-6 col-xs-12 isotope-item brands">
									<div class="portfolio-item">
										<span class="thumb-info thumb-info-lighten thumb-info-bottom-info thumb-info-centered-icons">
											<span class="thumb-info-wrapper">
												<img src="{{url(''.$var->gambar.'')}}" class="img-responsive" alt="">
												<span class="thumb-info-title">
													<span class="thumb-info-type">{{($var->deskripsi)}}</span>
												</span>
												<span class="thumb-info-action">
													<a href="{{($var->gambar)}}" class="lightbox-portfolio">
														<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fa fa-search-plus"></i></span>
													</a>
												</span>
											</span>
										</span>
									</div>
								</li>
								@endforeach
							</ul>
							<ul class="pagination pagination-lg pull-right">
								<?php echo $galeri->render(); ?>
							</ul>
						</div>
					</div>
					
				<div class="col-md-12">
					<div id="portfolioPagination" class="pull-right"></div>
				</div>
				</div>
			</div>

			</div>
@endsection
