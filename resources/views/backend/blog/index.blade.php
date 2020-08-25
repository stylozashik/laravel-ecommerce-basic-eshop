@extends('backend.layout')

@section('content')
    @include('backend.menu')

    	<!-- start: Content -->
			<div id="content" class="span10">


                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header" data-original-title>
                                <h2><i class="fas fa-barcode"></i><span class="break"></span>All Posts</h2>
                                <div class="box-icon">

                                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                                </div>
                            </div>
                            <div class="box-content">
                                <table class="table table-hover table-bordered bootstrap-datatable datatable">
                                  <thead>
                                      <tr>
                                          <th class="text-warning">Post Titile</th>
                                          <th class="text-warning">Image</th>
                                          <th class="text-warning">Posted By</th>
                                          <th class="text-warning">Ratings</th>
                                          <th class="text-warning">Edit Post</th>
                                          <th class="text-warning">Erase</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      @foreach ($posts as $p)
                                      <tr>
                                            <td>{{$p->post_title}}</td>
                                            <td><img src="{{asset("storage/$p->post_image")}}" alt="" style="height:80px; width:80px"/></td>
                                            <td class="center">{{$p->posted_by}}</td>
                                            <td class="center">{{$p->ratings}}</td>
                                            <td class="center">
                                                <a class="btn btn-info" href="/dashboard/posts/{{ $p->post_id }}/edit">
                                                    <i class="halflings-icon white edit"></i>
                                                </a>
                                            </td> 

                                            <td class="center">
                                                 <form method="POST" action="/dashboard/post/{{ $p->post_id }}">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button type="Delete" class="btn btn-danger"><i class="halflings-icon white trash"></i></button>
                                            </form>
                                            </td>
                                        </tr>
                                      @endforeach


                                  </tbody>
                              </table>
                            </div>
                        </div><!--/span-->

                    </div><!--/row-->
        </div>

    @include('backend.footer')
@endsection
