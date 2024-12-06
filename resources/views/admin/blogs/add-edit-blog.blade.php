@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Blog</span> - Add Edit Blog</h4>
		</div>
	</div>
</div>
<!-- /page header -->




<!-- Content area -->
<div class="content" >
	@if($blog->id)
		{!! Form::open(['route' => ['blogs.update', 'blog' => $blog->id], 'method' => 'put', 'files' => 'true','id' => 'addEditBlog']) !!}
  	@else
    	{!! Form::open(['route' => ['blogs.store'], 'method' => 'post','id' => 'addEditBlog','files' => 'true']) !!}
  	@endif
		<div class="row">
			<div class="col-md-9">
				<input type="hidden" name="lanCount" value="{{count($languages)}}">
				@php $cou = 0; @endphp
				@forelse($languages as $language)
					@php $lanId = @$language->language_id ? $language->language_id : $language->id;
					$lanName = @$language->language_id ? $language->language->name : $language->name; 
					$cou+= 1; @endphp

					<div class="form-group">
						<input type="text" name="title{{$lanId}}" class="form-control pr-title @error('title') is-invalid @enderror" placeholder="Blog Title In {{$lanName}}" value="{{ @$language->title ? $language->title : old('title'.$lanId) }}" @if($loop->iteration == 1) required @endif>
					</div>
					<div class="form-group">
						<input type="hidden" name="language_id{{$cou}}" value="{{$lanId}}">
					</div>
					<div class="panel panel-flat panel-collapsed">
						<div class="panel-heading">
							<h5>Description[{{$lanName}}]<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
							<div class="heading-elements">
								<ul class="icons-list">
					          		<li><a data-action="collapse" class=""></a></li>
					          	</ul>
				        	</div>
						</div>

						<div class="panel-body" style="display: block;">
						    <textarea cols="18" rows="18" class="summernote @error('description') is-invalid @enderror" placeholder="Enter text ..." name="blog_desc{{$lanId}}">{{ @$language->desc ? $language->desc : old('blog_desc'.$lanId) }}</textarea>


							<!--<textarea cols="18" rows="18" class="form-control" placeholder="Enter text ..." name="blog_desc{{$lanId}}">{{ @$language->desc ? $language->desc : old('blog_desc'.$lanId) }}</textarea>-->
						</div>
						@error('blog_desc')
	                        <span class="invalid-feedback" role="alert">
	                            <strong style="float: right;">{{ $message }}</strong>
	                        </span>
	                    @enderror
					</div><!-- panel -->
					<div class="panel panel-flat panel-collapsed">
						<div class="panel-heading">
							<h5 class="panel-title">Date[{{$lanName}}]<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
							<div class="heading-elements">
								<ul class="icons-list">
					          		<li><a data-action="collapse" class=""></a></li>
					          	</ul>
				        	</div>
						</div>

						<div class="panel-body" style="display: block;">
						    <input type="text" class="form-control" name="blog_date{{$lanId}}" value="{{@$language->date ? $language->date : old('blog_date'.$lanId)}}" placeholder="Enter Date Like 'YYYY-MM-DD'">
						</div>
						@error('blog_date')
	                        <span class="invalid-feedback" role="alert">
	                            <strong style="float: right;">{{ $message }}</strong>
	                        </span>
	                    @enderror
					</div><!-- panel -->
				@empty

				@endforelse

				

			</div><!-- col 9 -->

			<div class="col-md-3">

				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Other Details <a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
						<div class="heading-elements">
                        <ul class="icons-list">
                        <li><a data-action="collapse" class=""></a></li>
                        </ul>
	        	    </div>
			    </div>

                <div class="panel-body" style="display: block;">
                    <table class="publish-table">
                        <tr>
                            <td>
                                <label>Status :</label>
                                {{Form::select('status',['1' => 'Enabled', '0' => 'Disabled'],$blog->id ? $blog->status : old('status'),['class' => 'form-control'])}}
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="float: right;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author :</label>
                                <input type="text" class="form-control" name="author" placeholder="Enter Author Name" value="{{$blog->id ? $blog->author : old('author')}}">
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Image :</label>
                                @if($blog->id)
                                <input type="file" class="form-control" name="image">
                                @else
                                <input type="file" class="form-control" name="image" required>
                                @endif
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Fullview Image :</label>
                                @if($blog->id)
                                <input type="file" class="form-control" name="fullview_image">
                                @else
                                <input type="file" class="form-control" name="fullview_image" required>
                                @endif
                                @error('fullview_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-success btn-block">Save Product</button>
                </div>
				</div><!-- panel -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Blog Categories<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
						<div class="heading-elements">
							<ul class="icons-list">
	          					<li><a data-action="collapse" class=""></a></li>
	          				</ul>
	        			</div>
					</div>
					<div class="pr-category-check @error('blog_category') is-invalid @enderror">
						<ul>
							@foreach ($categories as $category)
								<li style="margin-bottom: 8px;">
										<input type="checkbox" class="styled" value="{{$category->id}}" name="blog_category[]" @if(in_array($category->id,$blog->categories()->pluck('blog_category_id')->all())) checked @endif> {{$category->blog_category_name}}
								</li>
						    @endforeach
						</ul>
					</div>

				</div>
		    </div>
	{{Form::close()}}

	<!-- Footer -->
	@include('admin.adminLayout.copyright')
	<!-- /footer -->
</div>
<!-- /content area -->


@include('admin.adminLayout.footer')
