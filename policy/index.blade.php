@extends('admin/layout/master')

@section('page-title')
    Manage Category
@endsection
@section('main-content')
<div class="col-md-14">
            <div class="grid simple ">
                <div class="grid-body no-border">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" id="activeAll" class="btn btn-primary tip" data-toggle="tooltip" title="Active Selected"><i class="fa fa-eye"></i></a>
                            <a href="#" id="deactiveAll" class="btn btn-primary tip" data-toggle="tooltip" title="Deactive Selected"><i class="fa fa-eye-slash"></i></a>
                            <a href="#" id="deleteAll" class="btn btn-primary tip" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-trash"></i></a>
                            <a href="{{ route('category.create') }}" class="btn btn-primary tip" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
                            {{-- @can('create' , App\Models\Category::class)
                               <a href="{{ route('category.create') }}" class="btn btn-primary tip" 
                               data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
                            @endcan --}}
                        </div>
                    </div>
                        
                    <br>
                        @if($categories)
                       <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:1%">
                                    <div class="checkbox check-default">
                                        <input id="checkbox" type="checkbox" value="1" class="checkall">
                                        <label for="checkbox"></label>
                                    </div>
                                </th>
                                <th style="width:40%">Title</th>
                                <th style="width:10%">Status</th>
                                <th style="width:10%">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $categories as $category )
                            <tr>
                                <td>
                                    <div class="checkbox check-default">
                                        <input id="checkbox" type="checkbox" value="1" class="checkall">
                                        <label for="checkbox"></label>
                                    </div>
                                </td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    @if($category->status == 'ACTIVE')
                                    <a href="{{ route('category.status' , $category->id)}}"> <span class="label label-info btn-small"><i class="fa fa-thumbs-o-up"></i></span> </a>
                                    @else
                                    <a href="{{ route('category.status' , $category->id)}}"> <span class="label label-important btn-small"><i class="fa fa-thumbs-o-down"></i></span></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('category.edit' , $category->id) }}" class="label label-info"> <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('category.delete' , $category->id) }}" onclick="return confirm('Are You Sure.?')" class="label label-important "> <i class="fa fa-trash-o"></i></a>
                                    
                                    {{-- @can('delete', $category)
                                    <a href="{{ route('category.delete' , $category->id) }}" onclick="return confirm('Are You Sure.?')" class="label label-important "> <i class="fa fa-trash-o"></i></a>
                                    @endcan --}}

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box-footer clearfix">
            <div class="row">
                <div class="col-sm-6">
                <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                    Showing {{ ($categories->currentpage()-1)*$categories->perpage()+1}} To 
                    {{$categories->currentpage()*$categories->perpage()}} Of {{$categories->total()}} Entries 
                </span>
                </div>
            <div class="col-sm-6 text-right">
                {!! $categories -> links() !!}
                {{-- <ul class="pagination">
                    <li class="paginate_button previous"><a href="#" >Previous</a></li>
                    <li class="paginate_button active"><a href="#" >1</a></li>
                    <li class="paginate_button "><a href="#">2</a></li>
                    <li class="paginate_button "><a href="#" >3</a></li>
                    <li class="paginate_button "><a href="#">4</a></li>
                    <li class="paginate_button "><a href="#">5</a></li>
                    <li class="paginate_button "><a href="#">6</a></li>
                    <li class="paginate_button next"><a href="#" >Next</a></li>
                </ul> --}}
            </div>
            </div>
        </div>
        @else
        <div class="alert alert-danger">No Record is Found</div>
        @endif
@endsection