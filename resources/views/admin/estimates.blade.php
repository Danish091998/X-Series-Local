@extends('layouts.admin')
@section('content')
@if (session('error'))
<div class="alert alert-danger" id="msg">
    {{ session('error') }}
</div>
@endif

<div class="container-fluid page-wrapper">
    <div class="row justify-content-between mb-2 align-items-center pr-1 pl-1">
        <div>
            <h1 class="a_dash d-inline-block">Estimates</h1>
        </div>
        <div class="btn-group">
            <form target="_blank" method="get" action="{{Route('export-estimates')}}">
                @csrf
                <input type="hidden" name="estimate_ids" value="" id="estimate_ids" />
                <button id="exportButton" style="min-width: 101px;" type="submit" class="btn-orange t_b_s"><i class="la la-file-excel-o"></i> Export</button>
            </form>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive" id="custom_table">
                @if(\Session::has('success'))

                <div class="alert alert-success alert-dismissible" style="margin-top: 18px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <strong>Success!</strong> {{ \Session::get('success') }}
                </div>
                @endif
                <label class=""> <input type="checkbox" style="position: relative; top: 1.5px;" name="sample" class="select-all" /> Select All </label>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Buyer</th>
                            <th>Email</th>
                            <th>Community</th>
                            <th>Home</th>
                            <th>Color Scheme</th>
                            <th>Total Price</th>
                            <th>Generated By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estimates as $key => $estimate)
                        <tr>
                            <td><input type="checkbox" class="estimate_checkbox" style="margin-right: 3px; position: relative; top: 1.5px;" value="{{$estimate->id}}" />{{$key+1}}.</td>
                            <td>{{ isset($estimate->admins->name)?ucwords($estimate->admins->name):''}}</td>
                            <td>{{ isset($estimate->admins->email)?ucwords($estimate->admins->email):'Not Given'}}</td>
                            <td>{{ isset($estimate->communities->name)?ucwords($estimate->communities->name):''}}</td>
                            <td>{{ isset($estimate->homes->title)?ucwords($estimate->homes->title):'Not Selected'}}</td>
                            <td>{{ isset($estimate->color_schemes->title)?ucwords($estimate->color_schemes->title):'Not Selected'}}</td>
                            <td>{{ isset($estimate->total_price)?ucwords($estimate->total_price):''}}</td>
                            <td>{{ isset($estimate->references->name)?ucwords($estimate->references->name):'Self'}}</td>

                            <td>
                                <span>
                                    <a href="#" class="a1" onclick="deleteData({{$estimate->id}})" data-toggle="modal" data-target="#modal-delete" id="{{$estimate->id}}"><i class="fas fa-trash"></i> <span></span></a>
                                </span>
                                <span>
                                    <a href="{{route('single-estimates',$estimate->id)}}" class="a1"><i class="fas fa-info-circle"></i> <span></span></a>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <!-- Edit User popup modal-->
                </table>
            </div>

            <div class="modal fade bd-example-modal-xl" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="addNewCommunityTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fa fa-times"></i></span>
                            </button>
                        </div>
                        <form method="post" action="{{Route('update_lead')}}" name="user" id="user">
                            @csrf
                            <input type="hidden" name="users_id" id="users_id" value="" />
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input required class="form-control forms1" id="users_name" name="name" placeholder="Name" type="text" value="" />
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input required class="form-control forms1" id="users_email" name="email" placeholder="Email" type="email" value="" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control forms1" id="users_pass" name="password" placeholder="Password" type="password" value="" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input required class="form-control forms1" id="users_mob" name="mobile" placeholder="Mobile Number" type="text" value="" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control forms1" name="status" id="users_status"> </select>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <button type="button" data-dismiss="modal" class="btn-orange t_b_s d_gr">Cancel</button>
                            <button type="submit" class="btn-orange t_b_s">Save</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit user popup modal-->

            <!-- Delete user modal popup modal-->

            <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="addNewCommunityTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                    <form action="{{route('delete_estimate')}}" id="deleteForm" method="POST">
                        <input type="hidden" name="estimate_id" id="estimate_id" />
                        @csrf
                        <div class="modal-content" style="margin-left: 110px;">
                            <div class="modal-header">
                                <h5>Confirm Action</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times"></i> </span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <h6 class="delete_heading">Are you sure, you want to delete this record ?</h6>
                                    <div class="clearfix"></div>
                                    <div class="m-auto">
                                        <button type="button" data-dismiss="modal" class="btn-orange t_b_s d_gr">No</button>
                                        <button type="submit" class="btn-orange t_b_s" onclick="formSubmit()">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <script type="text/javascript">
                function deleteData(id) {
                    $("#deleteForm #estimate_id").val(id);
                }
            </script>

            <!-- Delete user modal popup-->
        </div>
    </div>
</div>
     

@endsection
@push('scripts')
<script>
$(".select-all").click(function(){
   $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
});
$('#exportButton').click(function(){
var checked_boxes = $("tbody").find("input[type=checkbox]:checked");
    var estimate_ids = [];
        $.each(checked_boxes,function(key){
         estimate_ids.push($(this).val());  
        });
      $("#estimate_ids").val(estimate_ids);
      $("input[type=checkbox]:checked").prop('checked',false);
   });
</script>
@endpush
