@extends(config('app.theme').'admin.index')

@section('admin-content')
    <div class="row">
        <article>
            <div class="form-body">
				{{ Form::open(['method' => 'PUT','route' => [config('app.theme').'admin.pages.update', $page->id],'style'=>'form-horizontal']) }}
                {{ csrf_field() }}

                @include(config('app.theme').'admin.previous-page')

                <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                    {!! Form::label('title', u__('admin.title')) !!}
                    {{ Form::text('title', $page->title, ['class'=>'form-control', 'placeholder'=>u__('admin.title') ]) }}
					<span class="help-block">{{ $errors->first('title') }}</span>
                </div>

                <div class="form-group">
                    {!! Form::label('slug', u__('admin.slug')) !!}
                    {{ Form::text('slug', $page->slug, ['class'=>'form-control', 'placeholder'=> u__('admin.slug') ]) }}
                </div>

                <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                    {!! Form::label('content', u__('admin.content')) !!}
                    {{ Form::textarea('content', $page->content, ['class'=>'form-control', 'placeholder'=> u__('admin.content'),'id'=>'editor' ]) }}
					<span class="help-block">{{ $errors->first('content') }}</span>
                </div>

                <div class="form-group">
                    {!! Form::label('no_comments', u__('admin.no comments')) !!}
                    {{ Form::select('no_comments', ['Y' => 'Yes', 'N' => 'No'], $page->no_comments) }}
                </div>

                <div class="form-group">
                    {!! Form::label('parent', u__('admin.parent')) !!}
                    {{ Form::select('parent_id', $parentPages ,$page->parent_id) }}
                </div>

				<h3>{{ s__('admin.seo') }}</h3>

				<div class="form-group">
					{!! Form::label('title', u__('admin.title')) !!}
					{{ Form::text('seotitle', $page->seotitle->content??'', ['class'=>'form-control', 'placeholder'=> u__('admin.title') ]) }}
				</div>

				<div class="form-group">
					{!! Form::label('description', u__('admin.description')) !!}
					{{ Form::text('seodescription', $page->seodescription->content??'', ['class'=>'form-control', 'placeholder'=> u__('admin.description') ]) }}
				</div>

				<div class="form-group">
					{!! Form::label('keywords', u__('admin.keywords')) !!}
					{{ Form::text('seokeywords', $page->seokeywords->content??'', ['class'=>'form-control', 'placeholder'=> u__('admin.keywords') ]) }}
				</div>

                {{ Form::submit(u__('admin.save'), ['class' => 'btn btn-info']) }}
                {{ Form::close() }}

            </div>
        </article>
    </div>
@endsection