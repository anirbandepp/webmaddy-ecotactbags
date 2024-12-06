@include('admin.adminLayout.header')

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Attributes</span> - All Attributes</h4>
                <p class="text-muted">Attributes let you define extra product data, such as material or color.</p>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Add New Attribute</h5>
                    </div>
                    <div class="panel-body">
                        @if($attribute->id)
                            {!! Form::open(['route' => ['postAttribute','attribute' => $attribute->id], 'method' => 'post','id' => 'attributeData']) !!}
                        @else
                            {!! Form::open(['route' => ['postAttribute'], 'method' => 'post','id' => 'attributeData']) !!}
                        @endif
                            <div class="form-group">
                                <label>Attribute Name :</label>
                                <input type="text" name="name" class="form-control" placeholder="Attribute Name" value="{{$attribute->name ? $attribute->name : old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>Attribute Type :</label>
                                {{Form::select('type',['img'=>'Image','text'=>'Text','color'=>'Color'],$attribute->type ? $attribute->type : old('type'),['class'=>'form-control'])}}
                            </div>
                            @if($attribute->id)
                                <div class="form-group">
                                    <label>Attribute Slug :</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Attribute Name" value="{{$attribute->slug ? $attribute->slug : old('slug')}}">
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn bg-slate">Save Attribute</button>
                                <a href="{{ route('allAttribute') }}" class="btn bg-warning">Reset</a>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Simple panel -->
                <div class="panel panel-flat">
                    <div class="table-responsive table-products-list">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Type</th>
                                    <th>Attribute Sets</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($attributes as $attribute)
                                    <tr>
                                        <td>{{$attribute->name}}</td>
                                        <td>{{$attribute->slug}}</td>
                                        <td>{{$attribute->type == 'img' ? 'Image' : ucfirst($attribute->type)}}</td>
                                        <td>
                                            @forelse($attribute->sets->pluck('name')->all() as $value)
                                                {{ $loop->first ? '' : ', ' }} {{ $value }}
                                            @empty
                                                No attribute assigned
                                            @endforelse 
                                            <div><a href="{{ route('attributeValues',['attributeId' => $attribute->id]) }}">Manage Attribute Sets</a></div>
                                        </td>

                                        <td><a href="{{ route('allAttribute',$attribute->id) }}"><i class=" icon-pencil7"></i></a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Data Found</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /simple panel -->
            </div>
        </div>
        <!-- Footer -->
        @include('admin.adminLayout.copyright')
        <!-- /footer -->

    </div>
    <!-- /content area -->
@include('admin.adminLayout.footer')