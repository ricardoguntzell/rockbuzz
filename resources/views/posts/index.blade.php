@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold " style="background: #fff;">Posts
                        <a href="{{ route('posts.create') }}" title="New Post">
                            <i class="fas fa-plus-circle text-success fa-pull-right"></i>
                        </a>
                    </div>

                    @if(session()->exists('message'))
                        <div class="m-1">
                            @message(['color' => session()->get('color')])
                            <h5>{{session()->get('message')}}</h5>
                            @endmessage
                        </div>
                    @endif

                    <div class="card-body">
                        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>published</th>
                                <th>Title</th>
                                <th>Last Change</th>
                                <th>Ações</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->userObject['name'] }}</td>
                                    <td>
                                        <i class="{{ ($post->published == true)
                                        ? 'fas fa-thumbs-up' : 'fas fa-thumbs-down' }}">
                                        </i>
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($post->updated_at)) }}</td>
                                    <td class="mt-auto">
                                        <a class="text-primary" title="Edit"
                                           href="{{ route('posts.edit', ['id'=>$post->id]) }}">
                                            <i class="fas fa-edit fa-pull-left"></i>
                                        </a>
                                        <a class="text-danger" title="Remove"
                                           href="{{ route('posts.destroy', ['id'=>$post->id]) }}">
                                            <i class="fas fa-trash-alt fa-pull-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
