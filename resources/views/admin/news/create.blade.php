@extends('layouts.admin')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create news</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="container">
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="post_title_input" class="form-label">Title</label>
                        <input type="text" class="form-control" id="mews_title_input" placeholder="Title" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="post_short_content_input" class="form-label">Short content</label>
                        <input type="text" class="form-control" id="news_short_content_input" placeholder="Short content" name="short_content" value="{{ old('short_content') }}">
                        @error('short_content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="post_content_input" class="form-label">Content</label>
                        <textarea class="form-control" id="news_content_input" placeholder="Main content" name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="news_photo_upload" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="news_photo_input" placeholder="Photo URL" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="post_photo_input" class="form-label">category</label>
                        <input type="text" class="form-control" id="news_category_input" placeholder="Category" name="category_id" value="{{ old('category') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
      </div>
    </section>
@endsection

