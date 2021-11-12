@extends('layouts.main')

@section('body')

@section('body')
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 my-auto"><h4 class="header-title">List Penelitian</h4></div>
                    <!-- <div class="col-md-6 my-auto text-right"><button onclick=add() class="btn btn-primary text-right px-5" data-toggle="modal" data-target="#formModal">
                        <i class="fa fa-plus mr-1"></i> Tambah Data </button></div>
                </div> -->
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">ID</th>
                            <th width="20%" class="text-center">Title</th>
                            <th width="5%" class="text-center">File</th>
                            <th width="15%" class="text-center">Date</th>
                            <th width="10%" class="text-center">LPPM</th>
                            <th width="10%" class="text-center">Reviewer</th>
                            <th width="5%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datatable -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- MODAL -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Data Penelitian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body mx-5">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <!-- <input type="file" class="form-control" name="file" placeholder="Upload File"> -->
                    <form action="{{url('reviewer/store')}}" class="notes" id="notes" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id">
                    <input type="hidden" name="title">
                    <input type="hidden" name="approve" value="2">
                    <textarea class="form-control" name="notes" id="notes"></textarea>
                    
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn-submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('admin_template/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin_template/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_template/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin_template/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin_template/assets/plugins/sweet-alert2/sweetalert2.min.js')}} "></script>
<script src="{{ asset('admin_template/assets/pages/sweet-alert.init.js')}} "></script>
<script src="{{ asset('admin_template/assets/plugins/dropzone/dist/dropzone.js')}} "></script>
<script>
$(document).ready(function() {
    var dataTable = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: "{{ url('reviewer/list') }}",
        "order": [[ 0, "desc" ]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'download', name: 'download'},
            {data: 'dosen_date', name: 'dosen_date'},
            {data: 'lppm_st', name: 'lppm_st'},
            {data: 'reviewer_st', name: 'reviewer_st'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#title').on('change',function(){
        $('[name="title"]').val($(this).val());
    });
});


$('#btn-submit').on('click',function(){
    console.log('asd')
});

function add(id){
    $('[name="id"]').val("");
    // $('#formModal').modal('show'); 
}

function edit(id){
    $('[name="id"]').val(id);
    $('#formModal').modal('show'); 
}
function accept(id){
    $('[name="id"]').val(id);
    $('#formModal').modal('show'); 
}

</script>
@endsection