@extends('frontend.layout')

@section('home_content')


    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('frontend.left_sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					
                    <div class="blog-post-area">
						<h2 class="title text-center">Latest Blog Post</h2>
						@foreach($posts as $p)
						<div class="single-blog-post">
							<h3>{{$p->post_title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> {{$p->posted_by}}</li>
									<li><i class="fa fa-clock-o"></i> {{$p->created_at}}</li>
								</ul>
							</div>
							<a href="">
								<img src="{{ asset("storage/$p->post_image") }}" alt="">
							</a>
							<p>{{ $p->post_description }}</p>
							<a  class="btn btn-primary" href="blog/{{ $p->post_id }}/details">Read More</a>
						</div>
						<br>
						@endforeach
					</div>
					
					
				</div>
			</div>
		</div>
	</section>

@endsection