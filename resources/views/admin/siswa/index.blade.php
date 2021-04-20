@extends('layouts.admin')
@section('content')

<!-- CSS ONLY -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">   
<!-- END CSS -->

<div class="content">
        <div class="container-fluid">
          <div class="row">
          
<div class="col-lg-12 col-sm-12 col-md-9 offset">
        <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#addGalModal">
            + Data
        </button>
        
        <a class="btn btn-light" href="print-semua-siswa" role="button">Cetak Semua Siswa</a>

<!-- TAMBAH BERITA -->
<div class="modal fade" id="addGalModal" tabindex="-1" aria-labelledby="addAboutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="addAboutModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>

                <div class="modal-body">
                        <form action="{{ route('simpan-siswa')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <br>

                            <div class="form-group">
                                    <label for="nama">nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" onkeypress="return event.charCode <48 || event.charCode >57" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="jurusan"> Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-control" required>
                                    <option value="" >Pilih Minat Jurusan</option>
                                        <option value="rpl">rpl</option>
                                        <option value="tkj">tkj</option>
                                    </select>
                            </div>                       
    
                        
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Data Siswa</h4>
                  <p class="card-category"> Data dari Pengisian Formulir Pendaftaran</p>
                </div>
                <div class="card-body">
                <table class="table" id="example">
                      <thead class=" text-primary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($siswa as $item)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->nama }}</td>
                          <td>{{ $item->jurusan }}</td>
                          <td>
                            <a href="{{ route('edit-siswa', $item->id) }}"><i style="color : blue" class="material-icons">edit</i> </a>                              
                            
                            <a href="{{ route('print-siswa', $item->id) }}"><i style="color : grey" class="material-icons">print</i> </a>

                            <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action' , '{{ route('delete-siswa', $item->id) }}')" class="btn btn-danger btn-xs">
                              <i class="fa fa-trash"></i> delete 
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
@endsection

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true"></span>
        </button>
        <h4 class="modal-title">Yakin akan menghapus data ini</h4>
      </div>
      <div class="modal-footer">
        <form action="" id="formDelete" method="get">
          <button class="btn btn-default" data-dismiss="modal" >Tidak</button>
          <button class="btn btn-danger" type="submit">YA</button>
        </form>
      
      </div>  
    </div>
  </div>
</div>

<!-- JAVA SCRIPT ONLY -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- END JAVA SCRIPT -->

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>