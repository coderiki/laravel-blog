@extends(config('app.theme').'admin.index')

@section('admin-content')

    @foreach ($users as $user)
        <div class="row">
            <div class="col-xs-1">
                {{$user->id}}
            </div>
            <div class="col-xs-1">
                <a href="{{ route(config('app.theme').'admin.users.edit', $user->id) }}">{{ Form::submit(u__('admin.edit'), ['class' => 'btn btn-info']) }}</a>
            </div>
            <div class="col-xs-1">
                {{ Form::open(['method' => u__('admin.delete'),'route' => [config('app.theme').'admin.users.destroy', $user->id],'style'=>'form-inline']) }}
                {{ csrf_field() }}
                {{ Form::submit(u__('admin.delete'), ['class' => 'btn btn-info','onclick'=>'confirmDelete()']) }}
                {{ Form::close() }}
            </div>
            <div class="col-xs-3">
                {{ $user->name }}
            </div>
            <div class="col-xs-3">
                {{ $user->email }}
            </div>
        </div>
    @endforeach

    <div class="row">
        {{ $users->links() }}
    </div>
@endsection