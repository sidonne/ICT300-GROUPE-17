@extends('layouts.backend.app')

@push('css')
<!-- Latest compiled and minified CSS -->
<link href="{{ asset('backend') }}/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
@endpush

@section('main_content')

<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
	@csrf

	<div class="row clearfix">

		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
                        ADD NEW ARTICLE
					</h2>
				</div>
				<div class="body">

					<label for="post">Article Title</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" id="title" name="title" class="form-control" placeholder="Enter post title"
								value="{{ old('title') }}">
						</div>
					</div>

					<label for="image">Choose Image</label>
					<div class="form-group">
						<div class="form-line">
							<input type="file" id="image" name="image[]" class="form-control" placeholder="Enter choose image" multiple>
						</div>
					</div>

					<div class="form-group">
						<input type="checkbox" id="publish" name="status" class="filled-in" value="active">
						<label for="publish">Publish</label>
					</div>

				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						CATEGORY AND TAG
					</h2>
				</div>
				<div class="body">

					<div class="form-group form-float">
						<div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
							<label>Category Selected</label>
							<select class="form-control show-tick" name="categories[]" id="category" data-live-search="true" multiple="">
								@foreach ($category as $row)
								    <option value="{{ $row->id }}"> {{ $row->name }} </option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group form-float">
						<div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
							<label>Tag Selected</label>
							<select class="form-control show-tick" name="tags[]" id="tag" data-live-search="true" multiple="">
								@foreach ($tag as $row)
								<option value="{{ $row->id }}">{{ $row->name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<a href="{{ route('post.index') }}" class="btn btn-danger m-t-10 waves-effect">BACK</a>
					<button type="submit" class="btn btn-primary m-t-10 waves-effect">ADD</button>
				</div>
			</div>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						DESCRIPTION
					</h2>
				</div>
				<div class="body">
					<textarea name="body" class="form-control my-editor"></textarea>
				</div>
			</div>
		</div>

	</div>
</form>

@endsection

@push('script')
<!-- Latest compiled and minified JavaScript -->
<script src="{{ asset('backend') }}/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>

<!-- TinyMCE -->
<script src="/js/tinymce/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    height : 500,
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        tinymce.init(editor_config);
    });
</script>

@endpush
