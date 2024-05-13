@extends('layouts.admin')

@section('title')
    News
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex justify-content-between">
                <div><h1>News</h1></div>
                <a href="{{ route('admin.news.create')}}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Short content</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</th>
                            <td>{{ $item->title }}</th>
                            <td>{{ $item->short_content }}</th>
                            <td>{{ $item->category->title }}</th>
                            <td>
                                <a href="{{route('admin.news.show', $item->id)}}" class="btn btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{route('admin.news.edit', $item->id)}}" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', ['news'=> $item->id])}}"  method = 'post' class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger py-2"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$items->links()}}
                </div>
            </div>
        </section>
@endsection
