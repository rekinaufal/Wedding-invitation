@extends('admin.index')
  @section('content')
  <div class="card-body">
    <div class="table-responsive">
      <form method="POST" action="{{ route('user.store') }}" role="form" enctype="multipart/form-data">
        @csrf
          <div class="row">
            <!-- col 1  -->
            <div class="col"> 
              <div class="form-group">
                <label for="sel1">Pilih mempelai pria:</label>
                <button type="button" class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#getDataPriaModal">
                  <i class="fa fa-male" aria-hidden="true"></i>
                </button>
              </div>
              <div class="form-group">
                <label">Nama Mempelai Pria</label>
                <input type="hidden" name="pria_id" id="pria_id">
                <input type="text" class="form-control" id="namapria" readonly>
              </div>
              <div class="form-group">
                <label for="sel1">Pilih Tempat Acara:</label>
                <button type="button" class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#getDataTempatAcaraModal">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </button>
              </div>
              <div class="form-group">
                <label">Tempat Acara</label>
                <input type="hidden" name="tempatacara_id" id="tempatacara_id">
                <input type="text" class="form-control" id="namatempatacara" readonly>
              </div>
            </div>
            <!-- col 2  -->
            <div class="col">
              <div class="form-group">
                <label for="sel1">Pilih mempelai wanita:</label>
                <button type="button" class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#getDataWanitaModal">
                  <i class="fa fa-female" aria-hidden="true"></i>
                </button>
              </div>
              <div class="form-group">
                <label">Nama Mempelai Wanita</label>
                <input type="hidden" name="wanita_id" id="wanita_id">
                <input type="text" class="form-control" name="wanita_id" id="namawanita" readonly>
              </div>
            </div>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  <!-- Data Mempelai Pria Modal-->
  <div class="modal fade" id="getDataPriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Data Mempelai Pria</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="dataTablePria" class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Nama Mempelai Pria</th>
                          <th width="5%">Gambar</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($Pria as $item)
                          <tr>
                            <td>{{ $item->nama }}</td>
                            <td><img src="{{ $item->gambar }}" width="50%"></td>
                            <td align="center"> 
                                <button class="btn btn-sm btn-primary pilih-pria" value="{{ $item->id }}" data-dismiss="modal">
                                  <i class="fa fa-check" style="color:white" value="{{ $item->id }}"></i>
                                </button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Nama Mempelai Pria</th>
                          <th width="50%">Gambar</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Data Mempelai Wanita Modal-->
  <div class="modal fade" id="getDataWanitaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Data Mempelai Wanita</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="dataTableWanita" class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Nama Mempelai Wanita</th>
                          <th width="5%">Gambar</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($Wanita as $item)
                          <tr>
                            <td>{{ $item->nama }}</td>
                            <td><img src="{{ $item->gambar }}" width="50%"></td>
                            <td align="center"> 
                                <button class="btn btn-sm btn-primary pilih-wanita" value="{{ $item->id }}" data-dismiss="modal">
                                  <i class="fa fa-check" style="color:white" value="{{ $item->id }}"></i>
                                </button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Nama Mempelai Wanita</th>
                          <th width="50%">Gambar</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Data Mempelai TempatAcara Modal-->
  <div class="modal fade" id="getDataTempatAcaraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Data Mempelai TempatAcara</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="dataTableTempatAcara" class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Nama Tempat Acara</th>
                          <th width="5%">Gambar</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($TempatAcara as $item)
                          <tr>
                            <td>{{ $item->tempat }}</td>
                            <td><img src="{{ $item->gambar }}" width="50%"></td>
                            <td align="center"> 
                                <button class="btn btn-sm btn-primary pilih-tempatacara" value="{{ $item->id }}" data-dismiss="modal">
                                  <i class="fa fa-check" style="color:white" value="{{ $item->id }}"></i>
                                </button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Nama Tempat Acara</th>
                          <th width="50%">Gambar</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>
  @endsection