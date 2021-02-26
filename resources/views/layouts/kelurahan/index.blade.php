@extends('layouts.master')
@section('css')
<!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if (session('message'))
                <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message') }}
                </div>
            @elseif(session('message1'))
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message1') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Data Kelurahan') }}
                    <a href="{{route('kelurahan.create')}}" class="float-right btn btn-success">Add Data</a>
                </div>

            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="bg-teal">
                        <th scope="col"><center>No</center></th>
                        <th scope="col"><center>Kecamatan</center></th>
                        <th scope="col"><center>Nama Kelurahan</center></th>
                        <th scope="col"><center>Action</center></th>
                        </tr>  
                    </thead>
                    <tbody>
                         @php $no= 1; @endphp
                         @foreach($kelurahan as $data)
                            <tr>
                                <th scoppe="row"><center>{{$no++}}</center></th>
                                <td><center>{{$data->kecamatan->nama_kecamatan}}</center></td>
                                <td><center>{{$data->nama_kelurahan}}</center></td>
                                <td><form action="{{route('kelurahan.destroy',$data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <center><a href="{{route('kelurahan.show',$data->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></a></i>
                                    <a href="{{route('kelurahan.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></a></i>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus?')"><i class="fa fa-trash-alt">
                                </form>
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
</div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
