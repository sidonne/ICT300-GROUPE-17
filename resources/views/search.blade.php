@extends('layouts.frontend.app')

@push('css')
<style>
	.noMatch {
		text-align: center !important;
	}

	.header-search input[type="search"] {
		color: #000;
	}
</style>
@endpush

@section('main_content')

<section class="main-content-w3layouts-agileits">
	<div class="container">
		<!---728x90--->

		<h3 class="tittle">{{ $posts->count() }} Results for {{ $query }}</h3>
		<!---728x90--->
		<div class="inner-sec">
			<!--left-->
			<div class="left-blog-info-w3layouts-agileits text-left">
				<div class="row">

					@if ($posts->count() > 0)
					@foreach ($posts as $post)

					<div class="col-lg-4 card">
						<div class="card-body">
							<ul class="blog-icons my-4">
								<li>
									<a href="#">
										<i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M, Y') }}</a>
								</li>
							</ul>
							<h5 class="card-title">
								<a href="{{ route('post.destails', $post->slug) }}">{{ $post->title }}</a>
							</h5>
							<p class="card-text mb-3"> {!! Str::limit(strip_tags($post->body), 70) !!} </p>
							<a href="{{ route('post.destails', $post->slug) }}" class="btn btn-primary read-m">Read More</a>
						</div>
					</div>

					@endforeach
					@else
					<div class="col-lg-12 card noMatch">
						<h6 class="text-danger m-0">Sorry, No Article Found!</h6>
					</div>
					@endif

				</div>
				<!--//left-->
				{{-- {{ $posts->links() }} --}}

			</div>
		</div>
	</div>
</section>

@endsection
