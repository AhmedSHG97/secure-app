@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
    {{-- {{session()->get('errors')}} --}}

    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="{{ url('colors') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="{{ url('colors/update', $item->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <label for="name">@lang('view_pages.name') <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name" name="color"
                                                value="{{ old('color',$item->color) }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.name')">
                                            <span class="text-danger">{{ $errors->first('color') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="value">Value<span class="text-danger">*</span></label>
                                            <input class="form-control" type="color" id="value" name="value"
                                                value="{{ old('value',$item->value) }}" 
                                                placeholder="@lang('view_pages.enter') Value">
                                            <span class="text-danger">{{ $errors->first('value') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="selected" id="make_id" class="form-control select2" data-placeholder="Enabled color"
                                                >
                                                <option value="" selected disabled>@lang('view_pages.select_car_make')</option>
                                                <option value="0" {{$item->selected ? '' :'selected'}} >Disabled</option>
                                                <option value="1"  {{$item->selected ? 'selected' :''}} >Enabled</option>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('make_id') }}</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm pull-right m-5" type="submit">
                                            @lang('view_pages.update')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
    </div>
    <!-- content -->
@endsection
