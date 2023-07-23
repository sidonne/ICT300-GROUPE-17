@include('layouts.frontend.layouts.header')



<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WikiCulTurE</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('frontend') }}/css/style1.css" rel="stylesheet" />
        <link href="{{ asset('frontend') }}/css/main.css" rel="stylesheet" />
        <link href="{{ asset('frontend') }}/css/bootstrap.css" rel="stylesheet" />
        <link href="/frontend/css/style.css" rel="stylesheet">
        <link href="/frontend/css/comment.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            .fullscreen {
                position: fixed;
                top: 0;
                left: 0;
                width: 50%;
                height: 50%;
                z-index: 9999;
            }
        </style>

    </head>
    <body>
        <div class="wrapAll clearfix">
			<div class="sidebar">
				<div class="navigation">
					<ul>
						<li><a href="{{ url('/') }}">Main page</a></li>
						<li><a href="#">Contents</a></li>
						<li><a href="#">Featured content</a></li>
                            <li><a href="#">Random Article</a></li>
                        <li><a href="#">About WikiCulture</a></li>
                        <li><a href="#">Contact Us</a></li>
					</ul>
					<h3>Contribute</h3>
					<ul>
						<li><a href="#">Help</a></li>
						<li><a href="#">Learn to Edit</a></li>
						<li><a href="#">Community Portal</a></li>
                        <li><a href="#">Recent Changes</a></li>
                        <li><a href="#">Upload files</a></li>
					</ul>
					<h3>Interaction</h3>
					<ul>
						<li><a href="#">Help</a></li>
						<li><a href="{{ url('/login') }}">About</a></li>
						<li><a href="#">Portal</a></li>
					</ul>
				</div>


			</div>
			<div class="mainsection">
				<div class="headerLinks">
					<span class="user">Not logged in</span>
                    @auth
                    <a href="{{url('edit')}}">Talk</a>
                    <a href="#">Contributions</a>
                    <!--<a href="#">Login</a>
                    <a href="#">Create Account</a>-->
                    @if (Route::has('login'))


                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth

                    @endif

				</div>
				<div class="tabs clearfix">
					<div class="tabsLeft">
						<ul>
							<li><a href="#" class="active">Article</a></li>
                            @auth
							<li><a href="#">Talk</a></li>
                            @endauth
						</ul>
					</div>
					<div id="simpleSearch">
						<input type="text" name="searchInput" id="searchInput" placeholder="Search Wikipedia" size="12" />
						<div id="submitSearch"></div>
					</div>
					<div class="tabsRight">
						<ul>
							<li><a href="#" class="active">Read</a></li>
                            @auth
                            <li><a href="{{ route('post.edit', $post->id) }}" >Edit</a></li>
                            @endauth
							<li><a href="#">View source</a></li>
							<li><a href="#">View history</a></li>
                            <li>
                                @guest
                                <a href="javascript:void(0)"
                                    onclick="toastr.info('To add favorite list. You need to login first!', '', { progressBar: true })">
                                    <i class="far fa-heart"></i> {{ $post->favorite_users->count() }} </a>
                                @else
                                <a href="{{ route('post.favorite', $post->id) }}"><i
                                        class="far fa-heart {{ !Auth::user()->favorite_posts->where('pivot.post_id', $post->id)->count() == 0 ? 'fas fa-heart' : '' }}"></i>
                                    {{ $post->favorite_users->count() }} Favorites </a>
                                @endguest

							</li>
						</ul>
					</div>

				</div>
                @if(Session::has('success'))
					<p class="text-success">{{session('success')}}</p>
				@endif
				<div class="article">
					<h1>{{$post->title}}</h1>

					<p>{!! html_entity_decode($post->body) !!}</p>

                    <h5>Gallery</h5>
                    <div class="lavenderBox">
                        <img id="myImage" width="210" height="135" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" class="img-fluid" alt="{{ $post->title }}">
					</div>

				</div>
                <br>
                <div class="container">
                    <div class="row bootstrap snippets bootdeys">
                        <div class="col-md-8 col-sm-12">
                            <div class="comment-wrapper">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Comment <span class="badge badge-blue">{{ $post->comments->count() }}</span>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" action="{{ route('comment.store', $post->id) }}">
                                        @csrf
                                            <textarea name="comment" class="form-control" placeholder="write a comment..." rows="3"></textarea>
                                            <button type="submit" class="btn btn-dark px-5">Submit</button>
                                        </form>

                                        <div class="clearfix"></div>
                                        <hr>
                                        <ul class="media-list">
                                            <li class="media">

                                                <div class="media-body">
                                                    @if ($post->comments->count() <= 0) <p class="text-danger">No Comment yet. Be the first :)</p>
                                                        @foreach($post->comments as $comment)
                                                            <span class="text-muted pull-right">
                                                                <small class="text-muted">{{$comment->created_at->format('h:i A')}}</small>
                                                            </span>
                                                            <p>
                                                                {{ $comment->message }}
                                                            </p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="pagefooter">
					This page was last edited on {{$post->updated_at->format('D, d M Y')}}|
					<div class="footerlinks">
						<a href="#">Privacy policy</a> <a href="#">About</a> <a href="#">Terms and conditions</a> <a href="#">Cookie statement</a> <a href="#">Developers</a>
					</div>
				</div>
			</div>
		</div>

        <script>
            $(document).ready(function() {
                $('#myImage').click(function() {
                    $(this).toggleClass('fullscreen');
                });
            });
        </script>

    </body>
</html>


