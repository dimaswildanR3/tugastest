@extends('layouts.master')

@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        @if(session('sukses'))
        <div class="callout callout-success alert alert-success alert-dismissible fade show" role="alert">
            <h5><i class="fas fa-check"></i> Sukses :</h5>
            {{session('sukses')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session('warning'))
        <div class="callout callout-warning alert alert-warning alert-dismissible fade show" role="alert">
            <h5><i class="fas fa-info"></i> Informasi :</h5>
            {{session('warning')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="callout callout-danger alert alert-danger alert-dismissible fade show">
            <h5><i class="fas fa-exclamation-triangle"></i> Peringatan :</h5>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="/total_sampah/store" method="POST" enctype="multipart/form-data">
            <h4><i class="nav-icon fas fa-child my-1 btn-sm-1"></i> Tambah Penilaian</h4>
            <hr>
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <label for="id_jumlah_sampah">Jenis sampah</label>
                    <select name="id_jumlah_sampah" class="form-control my-1 mr-sm-2 bg-light" id="id_jumlah_sampah"  oninput="setCustomValidity('')">
                        <option value="">-- Pilih Jenis sampah --</option>
                        @foreach($datas as $jenis_sampahs)
                        <option value="{{$jenis_sampahs->id}}">Nama :{{$jenis_sampahs->User->name}} | Sampah :{{$jenis_sampahs->jenis_sampaho->jenis_sampah}} | harga /Kg : {{$jenis_sampahs->jenis_sampaho->harga}}Rp
                        </option>
                        @endforeach
                    </select>       
                   
                        
                    <label for="status">Status</label>
                    <input value="{{old('status')}}" name="status" type="text" class="form-control" id="status" placeholder="status" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">                     
                    
                    <label for="penyimpangan">Lama penyimpanan sampah</label>
                    <table>
                        <tr>
                          <td>  <input value="{{old('penyimpangan')}}" name="penyimpangan" type="number" class="form-control" id="penyimpangan" placeholder="" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">    </td>
                          <td> Hari</td>

                        </tr>
                      </table>    
                    {{-- <label for="keterangan">Keterangan</label> --}}
                                
                  
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> SIMPAN</button>
            <a class="btn btn-danger btn-sm" href="index" role="button"><i class="fas fa-undo"></i> BATAL</a>
        </form>
    </div>
</section>
@endsection