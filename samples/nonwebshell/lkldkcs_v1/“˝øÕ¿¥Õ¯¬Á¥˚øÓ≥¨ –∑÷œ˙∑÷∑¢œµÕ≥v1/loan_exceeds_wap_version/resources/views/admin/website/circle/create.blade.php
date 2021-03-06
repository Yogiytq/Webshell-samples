@extends('admin.layouts.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加圈子</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.website.circle.store')}}" method="post">
                @include('admin.website.circle._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.website.circle._js')
@endsection