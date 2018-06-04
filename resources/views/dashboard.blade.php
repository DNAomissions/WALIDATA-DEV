@extends('layouts.nav') @section('content')
<div id="map">
    <h1></h1>
    {{-- <button id="buttonAdd" class="action-button esri-icon-add-attachment" title="Tambah data" data-toggle="modal" data-target="#addUrl"></button> --}}
</div>
<div class="modal fade" id="addUrl" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="tutup">&times;</button>
                <h4 class="modal-title">Tambah data</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default">Simpan</button>
            </div>
        </div>

    </div>
</div>
@endsection