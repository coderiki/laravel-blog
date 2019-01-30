@extends(config('app.theme').'admin.index')

@section('admin-content')
    <div class="row">
        <article>
            <div class="form-body">

                {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name' ]) }}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {{ Form::text('email', null, ['class'=>'form-control', 'placeholder'=> 'Email' ]) }}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {{ Form::password('password', null, ['class'=>'form-control', 'placeholder'=> 'Password' ]) }}
                </div>

                {{ Form::submit('Save', ['class' => 'btn btn-info']) }}
                {{ Form::close() }}

            </div>
        </article>
    </div>
@endsection