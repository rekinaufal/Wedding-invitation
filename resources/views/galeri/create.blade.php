@extends('admin.index')
  @section('content')
  <div class="card-body">
    <div class="table-responsive">
      <form method="POST" action="{{ route('galeri.store') }}"  role="form" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="sel1">Pilih Kategori:</label>
            <select class="form-control" name="kategori_id">
              @foreach ($Kategori as $item)
                <option value="">-- Pilih Kategori --</option>
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="needsclick dropzone" id="document-dropzone"></div>
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <!-- <form action="{{ route('galeri.store') }}" class="dropzone form-control" >
        <a href="#" onClick="PopupCenter('http://dev.sifseafood.co.id/system/trs_attachment/List/VEdzMDEwMDAyMDUw/popup?setpost_module=Trs_Grpo_sif','attachment','500','400')" >
            <i class="fa fa-archive" aria-hidden="true"></i>
        </a>
        <input type="hidden" name="setpost_module_name" value="Trs_Grpo_sif"/>
        <input type="hidden" name="setpost_trs_type" value="header"/>
        <input type="hidden" name="setpost_trs_id" value=""/>
      </form> -->
      
    </div>
  </div>
  @endsection