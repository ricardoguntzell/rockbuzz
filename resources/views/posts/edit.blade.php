@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts Edit</div>

                    @if($errors->all())
                        <div class="m-1">
                            @foreach($errors->all() as $error)
                                @message(['color' => 'danger'])
                                <p class="icon-asterisk">{{$error}}</p>
                                @endmessage
                            @endforeach
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="post"
                              enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" id="id" value="{{ $post->id }}">

                            <div class="form-group">
                                <label for="user" class="text-muted">Author</label>
                                <select name="user" id="user">
                                    <option value="">Select Author</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ ($user->id == $post->user) ? ' selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="totle" class="text-muted">Cover Post</label>
                                <input type="file" name="cover" id="cover" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="totle" class="text-muted">Title</label>
                                <input id="title" type="text" value="{{ $post->title }}" name="title"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="body" class="text-muted">Body</label>
                                <textarea id="body" name="body" rows="10"
                                          class="form-control">{{ $post->body }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="tags" class="text-muted">Tags</label>
                                <select id="tags" type="text" name="tags[]" multiple class="form-control">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                                @if($post->has_tag($tag->id)) selected @endif>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="published" class="text-muted">Published</label>
                                <select name="published" id="published">
                                    <option value="0" {{ (!$post->published) ? ' selected' : '' }}>No</option>
                                    <option value="1" {{ ($post->published) ? ' selected' : '' }}>Yes</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
