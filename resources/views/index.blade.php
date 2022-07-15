@extends('layout/master')
@section('title','Offline')
@section('content')

<!-- # # # # # # # # # # -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<style>
    /* text button */
    .astext {
        background:none;
        border:none;
        margin:0;
        padding:0;
        cursor: pointer;
    }
    /* col search */
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    tfoot {
        display: table-header-group;
    }
</style>


<!-- # # # # # # # # # # -->
<div class="container-fluid px-4">
@if($cust == null)
    <form autocomplete="off" action="{{ url('/customer') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-3">
        <input type="text" class="form-control" name="customer" id ="id_customer" list="customer">
        <datalist id="customer">
        @foreach($list as $lt=> $customer)
            <option value="{{$customer[0]}}"></option>
        @endforeach
        </datalist>
        <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </div>
    </form>
@else
    <form autocomplete="off" action="{{ url('/customer') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-3">
        <input type="text" class="form-control" name="customer" id ="id_customer" list="customer">
        <datalist id="customer">
        @foreach($list as $lt=> $customer)
            <option value="{{$customer[0]}}"></option>
        @endforeach
        </datalist>
        <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </div>
    </form>
    <!-- <h1 class="mt-4">Title</h1>
    <button class="" type="button" data-bs-toggle="modal" data-bs-target="#addModal">Button</button> -->
    <div class="card-body">
        <table id="example" class="display cell-border">
            <thead>
                <tr>
                    <th>Datetime</th>
                    <th>Plat</th>
                    <th>SimCard</th>
                    <th>IMEI</th>
                    <th>Customer</th>
                    <th>ACC</th>
                    <th>Battery</th>
                    <th>Signal Strength</th>
                    <th>GPS Type</th>
                    <th>Port Server</th>
                    <th>Port Server Live</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Datetime</th>
                    <th>Plat</th>
                    <th>SimCard</th>
                    <th>IMEI</th>
                    <th>Customer</th>
                    <th>ACC</th>
                    <th>Battery</th>
                    <th>Signal Strength</th>
                    <th>GPS Type</th>
                    <th>Port Server</th>
                    <th>Port Server Live</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>        
                <?php $c = 0?>
                @foreach($response as $rs => $r)
                    <?php $c++ ?>
                    <tr>

                        <td>{{ $r[0] }}</td>

                        <td>{{ $r[1] }}</td>

                        <td>{{ $r[2] }}</td>

                        <td>{{ $r[3] }}</td>

                        <td>{{ $r[4] }}</td>

                        <td>{{ $r[5] }}</td>

                        <td>{{ $r[6] }}</td>

                        <td>{{ $r[7] }}</td>

                        <td>{{ $r[8] }}</td>
                        
                        <td>{{ $r[9] }}</td>

                        @if($r[10] == null)
                            <td>none</td>
                        @else
                            <td>{{ $r[10] }}</td>
                        @endif
                        <td>
                            <div style="display: inline-block">
                                <button class="" style="width:;margin:5px" type="button" data-bs-toggle="modal" data-bs-target="#addModal_{{ $r[3] }}">Keterangan</button>
                            </div>
                        </td>
                    </tr>
                    <!--Modal keterangan -->
                    <div class="modal fade" id="addModal_{{ $r[3] }}" tabindex="-2" role="dialog" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Keterangan - {{ $r[3] }}</h5>
                                </div>
                                <div class="modal-body">
                                <form autocomplete="off" method="post" action="{{ url('/keterangan/'.$r[3]) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" id ="customer" name="customer" value="{{$r[4]}}">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id ="keterangan" name="keterangan">
                                </div>
                                </br>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                <h4>{{$cust}} - Offline {{$c}}</h4>
                <br/>
                <!-- <a href="{{ url('/export_excel')}}" class="btn btn-success" target="_blank">Export</a> -->
            </tbody>
        </table>
    </div>
    </div>
    </div>
@endif
</div>


<!-- # # # # # # # # # # -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });
 
    // DataTable
    var table = $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel'],
        //buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;
 
                    $('input', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
        },
    });
});   
</script>

@endsection
