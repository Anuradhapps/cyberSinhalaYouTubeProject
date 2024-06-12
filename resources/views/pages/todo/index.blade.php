@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Todo List</h1>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="form-group">
                                <input class="form-control" name="title" type="text" placeholder="Enter task" aria-label="default input example">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 mt-5">
                <div>
                    <table class="table table-striped table-success table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $key => $task)
                            <tr>
                              <th scope="row">{{ ++$key }}</th>
                              <td>{{ $task->title }}</td>
                              <td>
                                @if ($task->done==0)
                                    <span class="badge bg-danger"> Not completed</span>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                              </td>
                              <td>
                                <a href="{{ route('todo.delete',$task->id) }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                <a href="{{ route('todo.done',$task->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-clipboard-check"></i></a>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
    .page-title{
        padding-top: 15vh;
        font-size: 3rem;
        font-weight: 700;
        color: rgb(8, 102, 0);
    }
</style>
@endpush
