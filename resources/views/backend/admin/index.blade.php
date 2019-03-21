@extends('layouts.admin')
@section('content')
    <div class="layui-fluid" style="margin-top: 5px">

        <span class="layui-breadcrumb">
            <a href="{{url('backend/index')}}">首页</a>
            <a href="{{url('admin/index')}}">管理员列表</a>
        </span>
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
            <legend>管理员列表</legend>
        </fieldset>
        {{--<form class="layui-form" action="">--}}
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">单行输入框</label>--}}
            {{--<div class="layui-input-block  layui-row layui-col-xs6">--}}
                {{--<input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">--}}
            {{--</div>--}}
        {{--</div>--}}

            <table class="layui-table">
                <colgroup>
                    <col width="150">
                    <col width="200">
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>状态</th>
                    <th>创建时间</th>
                    <th>修改时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                <tr>
                    <td>{{$v->admin_name}}</td>
                    <td>{{$v->status == 0 ? '启用' : '禁用'}}</td>
                    <td>{{$v->created_time}}</td>
                    <td>{{$v->updated_time}}</td>
                    <td><a href="{{url('admin/detail/'.$v->id)}}" class="layui-btn layui-btn-primary layui-btn-xs">查看</a>
                    {{--<a href="{{url()}}" class="layui-btn layui-btn-xs">编辑</a>--}}
                    {{--<a href="{{url()}}" class="layui-btn layui-btn-danger layui-btn-xs">删除</a></td>--}}
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>



@endsection