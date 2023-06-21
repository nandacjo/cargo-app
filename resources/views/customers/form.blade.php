@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-3"><strong>Form</strong> Customers </h1>

  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title mb-0">{{ $model->id != null ? 'Edit Data' : 'Tambah Data' }}</h6>
        </div>
        <div class="card-body">

          {!! Form::model($model, [
              'route' => $model->id !== null ? ['customers.update', ['id' => $model->id]] : 'customers',
              'method' => $model->id !== null ? 'PUT' : 'POST',
          ]) !!}

          <div class="mb-3">
            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', $model->nam ?? null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            @error('name')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            @error('email')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            {!! Form::label('phone', 'Phone', ['class' => 'form-label']) !!}
            {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'phone']) !!}
            @error('phone')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'address']) !!}
            @error('address')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>

          <button type="submit" class="fw-bold btn btn-primary btn-sm"><i class="align-middle" data-feather="save"></i>
            Submit</button>
          <a href="/customers" class="fw-bold btn btn-sm btn-secondary mx-2"><i class="align-middle"
              data-feather="arrow-left-circle"></i> Back</a>

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
