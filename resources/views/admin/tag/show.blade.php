@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2">{{ $tag->title }}</h1>
            <a class="text-success" href="{{ route('admin.tag.edit', $tag->id) }}"><i class="fas fa-pencil-alt"></i></a>
            <td>
              <form action="{{ route('admin.tag.delete', $tag->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="border-0 bg-transparent" type="submit"><i class="fas fa-trash text-danger" role="button"></i></button>
              </form>
            </td>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Теги</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-5">
            <div class="card">
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>Название</td>
                    </tr>
                    <tr>
                      <td>{{ $tag->id }}</td>
                      <td>{{ $tag->title }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
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
