@extends('layouts.admin')
@section('content')
    <div class="layui-fluid" style="margin-top: 5px">
        <span class="layui-breadcrumb">
            <a href="{{url('backend/index')}}">首页</a>
            <a href="{{url('admin/admin/index')}}">管理员列表</a>
            <a href="{{url()->current()}}">详情</a>
        </span>
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
            <legend>管理员详情</legend>
        </fieldset>
        <form class="layui-form" action="">
        <div class="layui-form-item  layui-col-md4">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="{{$data[0]->admin_name}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-inline">
                <select name="city" lay-verify="required" disabled>
                    {{--<option value=""></option>--}}
                    <option value="0" {{$data[0]->status == 0 ? 'selected' : ''}}>启用</option>
                    <option value="1" {{$data[0]->status == 1 ? 'selected' : ''}}>禁用</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item  layui-col-md4">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-inline">
                <input type="text" name="title"   lay-verify="Email" placeholder="" autocomplete="off" class="layui-input" value="{{$data[0]->admin_email}}" >
            </div>
            <div class="layui-form-mid layui-word-aux">辅助文字</div>
        </div>
        <div class="layui-form-item  layui-col-md4">
            <label class="layui-form-label">手机</label>
            <div class="layui-input-block">
                <input type="text" name="title"  lay-verify="Phone" placeholder="" autocomplete="off" class="layui-input" value="{{$data[0]->admin_phone}}" >
            </div>
        </div>
        <div class="layui-form-item  layui-col-md4">
            <label class="layui-form-label">创建时间</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{$data[0]->created_time}}" readonly>
            </div>
        </div>
        <div class="layui-form-item  layui-col-md4">
            <label class="layui-form-label">修改时间</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{$data[0]->updated_time}}" readonly>
            </div>
        </div>


        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">复选框</label>--}}
            {{--<div class="layui-input-block">--}}
                {{--<input type="checkbox" name="like[write]" title="写作">--}}
                {{--<input type="checkbox" name="like[read]" title="阅读" checked>--}}
                {{--<input type="checkbox" name="like[dai]" title="发呆">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">开关</label>--}}
            {{--<div class="layui-input-block">--}}
                {{--<input type="checkbox" name="switch" lay-skin="switch">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">单选框</label>--}}
            {{--<div class="layui-input-block">--}}
                {{--<input type="radio" name="sex" value="男" title="男">--}}
                {{--<input type="radio" name="sex" value="女" title="女" checked>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注</label>
            <div class="layui-input-block">
                <textarea name="desc" placeholder="请输入内容" class="layui-textarea">{{$data[0]->desc}}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                {{--<button type="reset" class="layui-btn layui-btn-primary">重置</button>--}}
            </div>
        </div>


    </form>
    </div>

    <script>
        //Demo
        layui.use('form', function(){
            var form = layui.form;

            //监听提交
            form.on('submit(formDemo)', function(data){
                layer.msg(JSON.stringify(data.field));
                return false;
            });

            form.verify({
                //数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
                // ZHCheck: [
                //     /^[\u0391-\uFFE5]+$/
                //     ,'只允许输入中文'
                // ],
                Email: function(value, item){ //value：表单的值、item：表单的DOM对象
                    if(value != null && value != ""){
                        if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value)){
                            return '邮箱格式不正确';
                        }
                    }
                },
                Phone: function(value, item){ //value：表单的值、item：表单的DOM对象
                    if(value != null && value != ""){
                        if(!/^1[34578]\d{9}$/.test(value)){
                            return '请输入正确的手机号';
                        }
                    }
                }
            });
        });


    </script>



@endsection