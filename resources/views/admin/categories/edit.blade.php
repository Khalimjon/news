@extends('layouts.admin')

@section('title')
    edit
@endsection

@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex justify-content-between">
                <div><h1>Update</h1></div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <divc class="card-body">
                    <div class="container">
                        <form action="{{ route('admin.categories.update', $item) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="post_title_input" class="form-label">Title</label>
                                <input type="text" class="form-control" id="post_title_input" placeholder="Title" name="title" value="{{ $item->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                       </div>
                </div>
            </div>
        </section>
@endsection
