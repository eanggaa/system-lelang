@extends('templates.compro.pages')
@section('title')
@section('header')
<h1>Portofolio</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Portofolio</a></div>
</div>
@endsection
@section('content')
<h2 class="section-title">Keterangan</h2>
<p class="section-lead">
  debitis aspernatur ad. Accusamus velit odio minima in aliquid voluptates. Saepe autem perferendis nulla vero distinctio ad omnis laboriosam beatae molestias maiores, in cum molestiae repellendus nostrum cumque quia magni eos.
</p>
<div class="row">
  <div class="col-12">
    
    @if(Session::get('success'))
      <div class="alert alert-primary">{{ Session::get('success') }}</div>
    @endif

    @if(Session::get('fail'))
      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif

    <div class="card">
      <div class="card-header">
        <h4>Portofolio</h4>
      </div>
      <div class="card-body">
        <div class="float-left">
          @if(auth()->user()->level == 1)
          <a href="{{ route('compro.superadmin.portofolio.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 2)
          <a href="{{ route('compro.admin.portofolio.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
        </div>
        <div class="float-right">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append">                                            
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
  
        <div class="clearfix mb-3"></div>
  
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <tbody>
              <tr>
                <th>No</th>
                <th>Judul Portofolio</th>
                <th>Portofolio</th>
                <th>Actoin</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($portofolio as $portofolios)
                @if($portofolios->status_aktif == 1)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $portofolios->judul_portofolio }}</td>
                  <td><img src="/compro/portofolio/{{ $portofolios->portofolio }}" alt="" width="100px"></td>
                  <td>
                    @if(auth()->user()->level == 1)
                      <form action="{{ route('compro.superadmin.portofolio.destroy', $portofolios->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('compro.superadmin.portofolio.show', $portofolios->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('compro.superadmin.portofolio.edit', $portofolios->id) }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                        <button type="submit" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                    @if(auth()->user()->level == 2)
                      <form action="{{ route('compro.admin.portofolio.destroy', $portofolios->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('compro.admin.portofolio.show', $portofolios->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('compro.admin.portofolio.edit', $portofolios->id) }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                        <button type="submit" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                  </td>
                </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection