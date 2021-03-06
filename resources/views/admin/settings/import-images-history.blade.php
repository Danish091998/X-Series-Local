@extends('layouts.admin') @section('content')
<div class="container-fluid page-wrapper">
    <div class="row mb-2 justify-content-between ml-0 mr-0 align-items-center">
        <div>
            <h1 class="a_dash p-0 m-0 d-inline-block">{{$page_title}} <small><span class="color-secondary">|</span></small></h1>
            <div class="row breadcrumbs-top pl-2 d-inline-block">
                <ol class="breadcrumb"> 
                <li class="breadcrumb-item">
                <a href="{{ route('import-images-history') }}"> Image Upload Reports </a>
                </li>
                </ol>
            </div>
        </div>
        <div class="btn-group">
			<a style="position:relative;" href="{{route('uploads')}}" class="add_button"><i style="top:0;" class="fa fa-arrow-left"></i> Go To Uploads</a>
		</div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive" id="custom_table">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width:40px">#</th>
                            <th width="250px">Name</th>
                            <th width="200px">Uploaded By</th> 
                            <th width="130px">Status</th>
                            <th>Progress</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>image-upload-157227872.xlsx</td>
                            <td>Admin</td>
                            <td>Finished On <span class="subbottom"> Sep 18, 2020 </span></td>
                            <td class="progress-row">
                                <span class="progresss-span-bg"> 
                                    <a href="javascript:;" class="progresss-span" style="width:100%"> 100% complete </a>
                                    <!-- <a href="javascript:;" class="float-right progresss-side-span"> 0 of 6 failed </a> -->
                                </span>
                            </td>
                            <td class="action">
                                <a href="#" class="d-inline-block"> 6 <span class="subbottom"> Total </span> </a>
                                <a href="#" class="d-inline-block"> 6 <span class="subbottom"> Uploaded </span> </a>
                                <a href="#" class="mr-0 d-inline-block"> 0 <span class="subbottom"> Failure </span> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    .imp-table tbody td{padding: 8px !important; font-size: 15px;}
    .action{min-width: 160px;}
    .poptable td, .poptable th{padding: 8px !important;font-size: 11px !important;text-align: left !important;}
    .subbottom{display: block; color: #aaa; position: relative; top: -4px; font-size: 85%;}
    .progresss-span-bg{display: block; background: #dc3545; height: 26px; color: #fff; border-radius: 4px; line-height: 26px; position: relative; font-weight: 500;}
    .progresss-span{background: #28a745; display: block; height: 26px; color: #fff; border-radius: 4px; line-height: 26px; padding: 0 10px; text-align:left;}
    .progresss-span:hover, .progresss-span:focus{color: #000;}
    .progresss-side-span{position: absolute; right: 0px; top: 0; font-weight: 500; color: #fff; text-decoration:none}
    .progresss-side-span:hover, .progresss-side-span:focus{color:#000}
    .progress-row{ min-width: 250px;}
</style>
@endsection
