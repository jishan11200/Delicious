@extends('layouts.app')
@section('content')

<div class="card card-preview">
    <div class="card-inner">
        <table class="datatable-init nowrap table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Sub-Title</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $key=>$slider)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->sub_title}}</td>
                    <td><img src="{{asset('uploads/slider/'.$slider->images)}}" style="width: 140px; height:80px;" alt="" srcset=""></td>
                    <td>
                        <a href=""class="btn btn-warning">Edit</a>
                        <a href=""class="btn btn-danger">Delete</a>
                    </td>

                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div><!-- .card-preview -->

@endsection
