@extends ('backend.layout')

@section('content')
@include('backend.menu')

<div id="content" class="span10">

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon plus"></i><span class="break"></span>Add Post</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{url('/dashboard/blog/add')}}" method="post" enctype="multipart/form-data">
                @csrf
              <fieldset>
                <div class="control-group">
                    @include('backend.message')
                </div>


                <div class="control-group">
                  <label class="control-label" for="typeahead">Post Title </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="post_title" id="typeahead" placeholder="Enter Product Title Here">
                  </div>
                </div>

                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Post Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="post_description" id="textarea2" rows="3" ></textarea>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Post Image</label>
                  <div class="controls">
                    <input name="post_image" type="file">
                  </div>
				</div>


                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Post Now</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
</div>
@include('backend.footer')
@endsection
