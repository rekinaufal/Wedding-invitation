@extends('admin.index')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Mempelai</h6>
    <!-- <a href="{{ route('mempelai.create') }}" class="btn btn-sm btn-primary">
      <i class="fa fa-plus" style="color:white"></i>
    </a> -->
    <a href="{{ route('mempelai.create') }}" class="btn btn-primary btn-icon-split">
      <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Data</span>
    </a>  
</div>
<div class="card-body">
  <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Mempelai Pria</th>
              <th>Mempelai Wanita</th>
              <th>Tempat Acara</th>
              <th>Status</th>
              <th>Action</th>
        </thead>
        <tfoot>
            <tr>
              <th>Mempelai Pria</th>
              <th>Mempelai Wanita</th>
              <th>Tempat Acara</th>
              <th>Status</th>
              <th>Action</th>
        </tfoot>
        <tbody>
          @foreach ($Mempelai as $item)
            <tr>
              <td>{{ $item->pria->nama }}</td>
              <td>{{ $item->wanita->nama }}</td>
              <td>{{ $item->tempatacara->tempat }}</td>
              <td>
                  <?php if ( $item->status == 1) {?>
                    <a href="" class="btn btn-primary btn-icon-split" style="pointer-events:none;">
                      <span class="icon text-white-50">
                          <i class="fas fa-flag"></i>
                      </span>
                      <span class="text">Aktif</span>
                    </a>  
                  <?php }else{?>
                    <a href="" class="btn btn-warning btn-icon-split" style="pointer-events:none;">
                      <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                      </span>
                      <span class="text">Tidak Aktif</span>
                    </a>  
                  <?php } ?>
              </td>
              <td align="center" width="16%"> 
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mempelai.destroy', $item->id) }}" method="POST">
                  <a href="{{ route('mempelai.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-edit" style="color:white"></i>
                  </a>
                  <a href="{{ route('mempelai.show', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-success">
                    <i class="fa fa-eye" style="color:white"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#statusModal">
                    <i class="fa fa-check" style="color:white"></i>
                  </a>
                  @csrf
                  @method('DELETE')   
                  <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash" style="color:white"></i>
                  </button>
                </form> 
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>

<!-- Update status mempelai Modal-->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin mengaktifkan mempelai ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Jika yakin silahkan klik button "Aktifkan"</div>
            <div class="modal-footer">
              <?php if (!empty($item->id)) { ?>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('mempelai.index') }}/{{$item->id}}/aktif" method="POST" role="form" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')  
                <button type="submit" class="btn btn-primary">Aktifkan</button>
                </form>
              <?php } ?>
            </div>
        </div>
    </div>
</div>
@endsection