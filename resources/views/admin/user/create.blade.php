@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавние пользователья</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Добавние пользователья</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          </div>
          <div class="col-12">
            <form action="{{ route('admin.user.store') }}" method="POST" class="w-25">
              @csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Имя пользователья">
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email">
                @error('email')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" name="password" class="form-control" placeholder="Пароль">
                @error('password')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group w-50">
                <label>Выберите роль</label>
                <select name="role" class="form-control">
                  @foreach($roles as $id => $role)
                    <option
                       {{ $id == old('role') ? 'selected' : '' }}
                          value="{{ $id }}">
                     {{ $role }}</option>
                  @endforeach
                </select>
                @error('role')a
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <input type="submit" class="btn btn-primary" value="Добавить">
            </form>
          </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection