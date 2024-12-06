@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Products</span> - Add Products</h4>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content content-product-add" ng-app="myApp" ng-controller="mainController">
    @if ($product->id)
        {!! Form::open([
            'route' => ['products.update', 'product' => $product->id],
            'method' => 'put',
            'files' => 'true',
            'id' => 'addEditProduct',
        ]) !!}
    @else
        {!! Form::open(['route' => ['products.store'], 'method' => 'post', 'id' => 'addEditProduct']) !!}
    @endif
    <div class="row">
        <div class="col-md-9">
            <div class="row mb15">
                @if ($product->id)
                    <div class="col-md-9">
                        <!-- <p class="text-info text-sm mt10">Save Product to Manage Stocks & Pricing</p> -->
                        <a href="{{ route('images.index', ['productId' => $product->id]) }}"
                            class="btn border-slate text-slate-600 btn-flat"><i class="icon-images3 position-left"></i>
                            Manage Pictures</a>
                        <a href="{{ route('stock.index', ['productId' => $product->id]) }}"
                            class="btn border-slate text-slate-600 btn-flat"><i class="icon-stack3 position-left"></i>
                            Manage Stocks</a>
                    </div>
                @endif

            </div>

            <div class="form-group">
                {{-- <p class="url"><strong>Slug: </strong> /royal-blue-formal-shirt <a href="#"><i class="icon-pencil4"></i></a></p> --}}
            </div>
            @if ($product->slug)
                <div class="form-group" ng-show="slugInput">
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                        placeholder="Product Slug" value="{{ $product->slug ? $product->slug : old('slug') }}">
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong style="float: right;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group" ng-show="slugP">
                    <p class="url"><strong>Slug: </strong> /{{ $product->slug }} <a href="#"><i
                                class="icon-pencil4" ng-click="slugInput = true; slugP = false"></i></a></p>
                </div>
            @endif
            <input type="hidden" name="lanCount" value="{{ count($languages) }}">
            @forelse($languages as $language)
                @php$lanId = @$language->language_id ? $language->language_id : $language->id;
                                $lanName = @$language->language_id ? $language->language_name : $language->name; @endphp ?>

                <div class="form-group">
                    <input type="text" name="name{{ $lanId }}"
                        class="form-control pr-title @error('name') is-invalid @enderror"
                        placeholder="Product name In {{ $lanName }}"
                        value="{{ @$language->product_name ? $language->product_name : old('product_name' . $lanId) }}">
                </div>
                <div class="form-group">
                    <input type="hidden" name="language_id{{ $lanId }}" value="{{ $lanId }}">
                </div>
                <div class="panel panel-flat panel-collapsed">
                    <div class="panel-heading">
                        <h5 class="panel-title">Banner Heading[{{ $lanName }}]<a
                                class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse" class=""></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body" style="display: block;">
                        <textarea cols="18" rows="4" class="form-control" placeholder="Enter text ..."
                            name="banner_text{{ $lanId }}">{{ @$language->banner_text ? $language->banner_text : old('banner_text' . $lanId) }}</textarea>
                    </div>
                    @error('banner_text')
                        <span class="invalid-feedback" role="alert">
                            <strong style="float: right;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="panel panel-flat panel-collapsed">
                    <div class="panel-heading">
                        <h5 class="panel-title">Short Description[{{ $lanName }}]<a
                                class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse" class=""></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body" style="display: block;">
                        <textarea cols="18" rows="18" class="form-control" placeholder="Enter text ..."
                            name="short_desc{{ $lanId }}">{{ @$language->short_desc ? $language->short_desc : old('short_desc' . $lanId) }}</textarea>
                    </div>
                    @error('short_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong style="float: right;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- panel -->
                <div class="panel panel-flat panel-collapsed">
                    <div class="panel-heading">
                        <h5 class="panel-title">Full Description[{{ $lanName }}]<a
                                class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse" class=""></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body" style="display: block;">
                        <textarea cols="18" rows="18" class="summernote" placeholder="Enter text ..."
                            name="full_desc{{ $lanId }}">{{ @$language->full_desc ? $language->full_desc : old('full_desc' . $lanId) }}</textarea>
                    </div>
                    @error('full_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong style="float: right;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- panel -->

                <div class="panel panel-flat panel-collapsed">
                    <div class="panel-heading">
                        <h5 class="panel-title">SEO Details[{{ $lanName }}]<a class="heading-elements-toggle"><i
                                    class="icon-more"></i></a></h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse" class=""></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body" style="display: block;">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title{{ $lanId }}"
                                class="form-control @error('meta_title') is-invalid @enderror"
                                value="{{ @$language->meta_title ? $language->meta_title : old('meta_title' . $lanId) }}">
                        </div>
                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" name="meta_keys{{ $lanId }}"
                                class="form-control @error('meta_keys') is-invalid @enderror"
                                value="{{ @$language->meta_keys ? $language->meta_keys : old('meta_keys' . $lanId) }}">
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea rows="3" class="form-control @error('meta_desc') is-invalid @enderror" placeholder="Enter text ..."
                                name="meta_desc{{ $lanId }}">{{ @$language->meta_desc ? $language->meta_desc : old('meta_desc' . $lanId) }}</textarea>
                        </div>

                    </div>

                </div><!-- panel -->

            @empty
            @endforelse



        </div><!-- col 9 -->

        <div class="col-md-3">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Publish <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                    </h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body" style="display: block;">
                    <table class="publish-table">
                        <tr>
                            <td><label>Date</label></td>
                            <td>:</td>
                            <td><input type="text" name="publish_at"
                                    class="form-control date-picker @error('publish_at') is-invalid @enderror"
                                    value="{{ $product->publish_at ? \Carbon::parse($product->publish_at)->toDateString('y-m-d') : old('publish_at') }}">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Status</label></td>
                            <td>:</td>
                            <td>
                                {{ Form::select('active', ['1' => 'Enabled', '0' => 'Disabled'], $product->id ? $product->active : old('active'), ['class' => 'form-control']) }}
                                @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="float: right;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label>Featured</label></td>
                            <td>:</td>
                            <td>
                                {{ Form::select('featured', ['1' => 'Featured', '0' => 'Not Featured'], $product->id ? $product->featured : old('featured'), ['class' => 'form-control']) }}
                                @error('featured')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="float: right;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label>Orderable</label></td>
                            <td>:</td>
                            <td>
                                {{ Form::select('orderable', ['1' => 'Yes', '0' => 'No'], $product->id ? $product->orderable : old('orderable'), ['class' => 'form-control']) }}
                                @error('orderable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="float: right;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label>Manual</label></td>
                            <td>:</td>
                            <td>
                                <input type="file" name="manual" class="form-control">
                                @error('manual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="float: right;">{{ $message }}</strong>
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
                    <h5 class="panel-title">Product Categories<a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="pr-category-check @error('product_category') is-invalid @enderror">
                    <ul>
                        @foreach ($categories as $category)
                            <li style="margin-bottom: 8px;">
                                <input type="checkbox" class="styled" value="{{ $category->id }}"
                                    name="product_category[]" @if (in_array(
                                        $category->id,
                                        $product->categories()->pluck('category_id')->all())) checked @endif>
                                {{ $category->name }}
                            </li>
                            <ul>
                                @foreach ($category->childs as $childCategory)
                                    <li style="margin-bottom: 5px;">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="styled" value="{{ $childCategory->id }}"
                                                name="product_category[]"
                                                @if (in_array(
                                                    $childCategory->id,
                                                    $product->categories()->pluck('category_id')->all())) checked @endif>
                                            {{ $childCategory->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </ul>
                </div>

            </div>


            <!--<div class="panel panel-flat">-->
            <!--	<div class="panel-heading">-->
            <!--		<h5 class="panel-title">Product Tags<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>-->
            <!--		<div class="heading-elements">-->
            <!--			<ul class="icons-list">-->
            <!--                            <li><a data-action="collapse" class=""></a></li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--	</div>-->
            <!--                <div class="panel-body @error('tags') is-invalid @enderror" style="display: block;">-->
            <!--                   <input type="text" value="{{ $product->tags? implode(',',$product->tags()->pluck('name')->all()): old('short_desc') }}" data-role="tagsinput" class="tagsinput-typeahead" placeholder = "Hit Enter" name="tags" >-->
            <!--                </div>-->
            <!--            </div>-->

            <!--            <div class="panel panel-flat">-->
            <!--	<div class="panel-heading">-->
            <!--		<h5 class="panel-title">Product Tax<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>-->
            <!--		<div class="heading-elements">-->
            <!--			<ul class="icons-list">-->
            <!--                            <li><a data-action="collapse" class=""></a></li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--	</div>-->
            <!--                <div class="panel-body @error('tax_rate') is-invalid @enderror" style="display: block;">-->
            <!--                    {{ Form::select('tax_rate', [] + $taxes, $product->tax_rate ? $product->tax_rate : old('tax_rate'), ['class' => 'form-control chosen-select']) }}-->
            <!--                </div>-->
            <!--   </div>-->

        </div>
        {{ Form::close() }}

        <!-- Footer -->
        @include('admin.adminLayout.copyright')
        <!-- /footer -->
    </div>
    <!-- /content area -->


    @include('admin.adminLayout.footer')
