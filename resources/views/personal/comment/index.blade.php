@extends('personal.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарии</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="row">

    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-6">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th colspan="2" class="text-center">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->title}}</td>
{{--                                    <td><a href="{{route('personal.comment.show', $comment->id)}}" ><i class="far fa-pencil-alt"></i></a></td>--}}
                                    <td><a href="{{route('personal.comment.edit', $comment->id)}}" class="text-success"  ><i class="fas fa-pencil-alt"></i></a></td>
                                    <td>
                                        <form action="{{route('personal.post.delete',  $comment->id)}}"
                                              method="POST"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent">

                                                <i class="fas fa-trash text-danger" role="button"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
