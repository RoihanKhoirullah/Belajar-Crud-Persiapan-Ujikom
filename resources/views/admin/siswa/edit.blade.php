@extends('layouts.admin')
@section('content')
  <!-- Table -->
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Tentang</h4>
    </div>
<div class="card-body">
<div class="table-responsive">
<table class="table">
<thead class=" text-primary">
 <!-- CREATE -->
 <div class="card-body">
    <form action="{{ route('update-siswa', $siswa->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}                                
                                        
    <div class="form-group">
                            
                            <div class="form-group">
                                <label for="nama">nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" onkeypress="return event.charCode <48 || event.charCode >57" value="{{ $siswa->nama}}" required>
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-control" >
                                    <option value="{{ $siswa->jurusan}}" >{{ $siswa->jurusan}}</option>
                                        <option value="rpl">Rpl</option>
                                        <option value="tkj">Tkj</option>
                                    </select>
                            </div>

                           
                                                           
            <div class="form-group">
                <button type="submit" class="btn btn-success">Update Data</button>
            </div>
    </form>

</thead>
</table>
</div>
</div>
</div>
</div>

    </div>
  </div>
  @endsection