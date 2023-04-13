@extends('templates.compro.pages')
@section('title')
@section('header')
<h1>Edit Jajaran Direksi</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Jajaran Direksi</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Jajaran Direksi</h4>
      </div>
      <div class="card-body">
        @if(auth()->user()->level == 1)
        <form method="POST" action="{{ route('compro.superadmin.jajaran-direksi.update', $jajaran_direksi->id) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 2)
        <form method="POST" action="{{ route('compro.admin.jajaran-direksi.update', $jajaran_direksi->id) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="">Nama Panjang</label>
            <input id="" type="text" class="form-control" name="nama_panjang" value="{{ $jajaran_direksi->nama_panjang }}" tabindex="1">
            @error('nama_panjang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="">Jabatan</label>
            <input id="" type="text" class="form-control" name="jabatan" value="{{ $jajaran_direksi->jabatan }}" tabindex="1">
            @error('jabatan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="">Pendapat</label>
            <textarea class="form-control" name="pendapat" id="">{{ $jajaran_direksi->pendapat }}</textarea>
            @error('pendapat')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 1)
            <a href="{{ route('compro.superadmin.jajaran-direksi.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 2)
            <a href="{{ route('compro.admin.jajaran-direksi.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection