@extends('layouts.admin')
@section('content')
<style>
#pie{
    width:100%;
}
.highcharts-credits{
    display:none !important;
}
.myTabSettings .nav-link{
    padding:0 5px !important;
    font-size:11px; 
    line-height:24px;
}
</style>
<div class="container-fluid page-wrapper">
    <div class="row justify-content-between align-items-center mb-2 pl-1 pr-1">
        <h2 class="a_dash p-0 m-0">Analytics</h2>
        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 15px; border: 1px solid #ccc; width:auto;">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
        <!-- <input type="text" name="date" id="datepicker"> -->
    </div>
    <div class="d-flex flex-column flex-md-row mt-1 mb-1 p-1 pl-2 bg-light border">
        <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="country">Country:</label>
        <select class="form-control mr-1 mb-1 mb-md-0" name="country" id="country">
            
        </select>

        <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="state">State:</label>
        <select class="form-control mr-1 mb-1 mb-md-0" name="state" id="state">
            <option value="">Select State</option>
        </select>

        <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="city">City:</label>
        <select class="form-control mr-1 mb-1 mb-md-0" name="city" id="city">
            <option value="">Select City</option>
        </select>      
    </div>
    <div class="row">
        <div class="col-xl-5">
            <div id="pie"></div>
        </div>

        <div class="col-xl-7">
            <nav>
                <div class="nav nav-tabs myTabSettings" role="tablist">
                    <a class="nav-item wf-25 nav-link active" style="line-height:40px; margin-bottom:5px;" id="nav-com-tab" data-toggle="tab" href="#nav-com" role="tab" aria-controls="nav-com" aria-selected="true">Communities</a>
                    <a class="nav-item wf-25 nav-link" style="line-height:40px; margin-bottom:5px;" id="nav-ele-tab" data-toggle="tab" href="#nav-ele" role="tab" aria-controls="nav-ele" aria-selected="false">Elevations</a>
                    <a class="nav-item wf-25 nav-link" style="line-height:40px; margin-bottom:5px;" id="nav-eletype-tab" data-toggle="tab" href="#nav-eletype" role="tab" aria-controls="nav-eletype" aria-selected="false">Elevation Types</a>
                    <a class="nav-item wf-25 nav-link" style="line-height:40px; margin-bottom:5px;" id="nav-lot-tab" data-toggle="tab" href="#nav-lots" role="tab" aria-controls="nav-lots" aria-selected="false">Lots</a>
                    <a class="nav-item wf-25 nav-link" style="line-height:40px;" id="nav-color-tab" data-toggle="tab" href="#nav-color" role="tab" aria-controls="nav-color" aria-selected="false">Color Schemes</a>
                    <a class="nav-item wf-25 nav-link" style="line-height:40px;" id="nav-upgrade-tab" data-toggle="tab" href="#nav-upgrade" role="tab" aria-controls="nav-upgrade" aria-selected="false">Upgrades</a>
                    <a class="nav-item wf-25 nav-link" style="line-height:40px;" id="nav-feature-tab" data-toggle="tab" href="#nav-feature" role="tab" aria-controls="nav-feature" aria-selected="false">Features</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-com" role="tabpanel" aria-labelledby="nav-com-tab">
                    <div class="pt-1 pr-1 text-right">
                        <a id="community-csv"  href="javascript:void(0)" class="add_button"><i class="la la-file-excel-o"></i> Export</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="custom_table">
                            <table class="table table-bordered table-hover" id="community_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Community</th>
                                        <th>Selected Sessions</th>
                                        <th>Total Sessions</th>
                                        <th>Popularity</th>
                                    </tr>
                                </thead>
                                <tbody class='lots_list_analytics'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>        
                <div class="tab-pane fade" id="nav-ele" role="tabpanel" aria-labelledby="nav-ele-tab">
                    <div class="pt-1 pr-1 text-right">
                        <a id="elevation-csv" href="javascript:void(0)" class="add_button"><i class="la la-file-excel-o"></i> Export</a>
                    </div>
                    <div class="card-body">
                        
                        <div id="community-filter" style="padding:5px 15px;" class='d-flex flex-column flex-md-row bg-light mb-1 border'>
                            <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="community">Community:</label>
                            <select class="form-control" name="community" id="community">
                                <option value="">Select Community</option>
                            </select> 
                        </div>
                        <div class="table-responsive" id="custom_table">
                            <table class="table table-bordered table-hover" id="elevation_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Elevation</th>
                                        <th>Selected Sessions</th>
                                        <th>Total Sessions</th>
                                        <th>Popularity</th>
                                    </tr>
                                </thead>
                                <tbody class='lots_list_analytics'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-eletype" role="tabpanel" aria-labelledby="nav-eletype-tab">
                    <div class="pt-1 pr-1 text-right">
                        <a id="ele-type-csv" href="javascript:void(0)" class="add_button"><i class="la la-file-excel-o"></i> Export</a>
                    </div>
                    <div class="card-body">
                        
                        <div id="community-filter" style="padding:5px 15px;" class='d-flex flex-column flex-md-row bg-light mb-1 border'>
                            <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="elevation-type-dropdown">Community:</label>
                            <select class="form-control mr-1" name="ele-type-community-dropdown" id="ele-type-community-dropdown">
                            </select> 
                            <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="elevation-type-dropdown">Elevation:</label>
                            <select class="form-control" name="elevation-type-dropdown" id="elevation-type-dropdown">
                            </select> 
                        </div>
                        <div class="table-responsive" id="custom_table">
                            <table class="table table-bordered table-hover" id="ele_type_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Elevation Type</th>
                                        <th>Selected Sessions</th>
                                        <th>Total Sessions</th>
                                        <th>Popularity</th>
                                    </tr>
                                </thead>
                                <tbody class='lots_list_analytics'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-lots" role="tabpanel" aria-labelledby="nav-lots-tab">
                    <div class="pt-1 pr-1 text-right">
                        <a id="lot-csv" href="javascript:void(0)" class="add_button"><i class="la la-file-excel-o"></i> Export</a>
                    </div>
                    <div class="card-body">
                        <div id="community-filter" style="padding:5px 15px;" class='d-flex flex-column flex-md-row bg-light mb-1 border'>
                            <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="lot-community-dropdown">Community:</label>
                            <select class="form-control" name="lot-community-dropdown" id="lot-community-dropdown"></select> 
                        </div>
                        <div class="table-responsive" id="custom_table">
                            <table class="table table-bordered table-hover" id="lots_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Lot Number</th>
                                        <th>Selected Sessions</th>
                                        <th>Total Sessions</th>
                                        <th>Popularity</th>
                                    </tr>
                                </thead>
                                <tbody class='lots_list_analytics'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-color" role="tabpanel" aria-labelledby="nav-color-tab">
                    <div class="pt-1 pr-1 text-right">
                        <a id="color-csv" href="javascript:void(0)" class="add_button"><i class="la la-file-excel-o"></i> Export</a>
                    </div>
                    <div class="card-body">
                        <div id="community-filter" style="padding:5px 15px;" class='d-flex flex-column flex-md-row bg-light mb-1 border'>
                            <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="color-dropdown">Community:</label>
                            <select class="form-control" name="color-community-dropdown" id="color-community-dropdown">
                            </select> 
                            <label style="white-space: nowrap;" class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="color-dropdown">Elevation Type:</label>
                            <select class="form-control" name="elevation" id="color-dropdown">
                            </select> 
                        </div>
                        <div class="table-responsive" id="custom_table">
                            <table class="table table-bordered table-hover" id="color_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Color Scheme</th>
                                        <th>Selected Sessions</th>
                                        <th>Total Sessions</th>
                                        <th>Popularity</th>
                                    </tr>
                                </thead>
                                <tbody class='lots_list_analytics'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-upgrade" role="tabpanel" aria-labelledby="nav-upgrade-tab">
                    <div class="pt-1 pr-1 text-right">
                        <a id="upgrade-csv" href="javascript:void(0)" class="add_button"><i class="la la-file-excel-o"></i> Export</a>
                    </div>
                    <div class="card-body">
                        <div id="community-filter" style="padding:5px 15px;" class='d-flex flex-column flex-md-row bg-light mb-1 border'>
                            <label style="white-space: nowrap" class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="upgrade-elevation-dropdown">Community:</label>
                            <select class="form-control mr-1 mb-1 mb-md-0" name="upgrade-community-dropdown" id="upgrade-community-dropdown">
                            </select> 
                            <label style="white-space: nowrap" class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="upgrade-elevation-dropdown">Elevation Type:</label>
                            <select class="form-control mr-1 mb-1 mb-md-0" name="upgrade-elevation-dropdown" id="upgrade-elevation-dropdown">
                            </select> 
                            <label style="white-space: nowrap" class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="upgrade-color-dropdown">Color Scheme:</label>
                            <select class="form-control" name="upgrade-color-dropdown" id="upgrade-color-dropdown">
                            </select> 
                        </div>
                        <div class="table-responsive" id="custom_table">
                            <table class="table table-bordered table-hover" id="upgrade_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Feature</th>
                                        <th>Selected Sessions</th>
                                        <th>Total Sessions</th>
                                        <th>Popularity</th>
                                    </tr>
                                </thead>
                                <tbody class='lots_list_analytics'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-feature" role="tabpanel" aria-labelledby="nav-feature-tab">
                    <div class="pt-1 pr-1 text-right">
                        <a id="feature-csv" href="javascript:void(0)" class="add_button"><i class="la la-file-excel-o"></i> Export</a>
                    </div>
                    <div class="card-body">
                       <div id="community-filter" style="padding:5px 15px;" class='d-flex flex-column flex-md-row bg-light mb-1 border'>
                            <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="feature-community-dropdown">Community:</label>
                            <select class="form-control mr-1 mb-1 mb-md-0" name="feature-community-dropdown" id="feature-community-dropdown">
                            </select>
                            <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="feature-elevation-dropdown">Elevation:</label>
                            <select class="form-control mr-1 mb-1 mb-md-0" name="feature-elevation-dropdown" id="feature-elevation-dropdown">
                            </select> 
                            <label class="align-self-left align-self-md-center m-0 font-weight-bold text-dark" for="feature-floor-dropdown">Floor:</label>
                            <select class="form-control" name="feature-floor-dropdownn" id="feature-floor-dropdown">
                            <option value="">Select Elevation First</option>
                            </select> 
                        </div>
                        <div class="table-responsive" id="custom_table">
                            <table class="table table-bordered table-hover" id="feature_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Feature</th>
                                        <th>Selected Sessions</th>
                                        <th>Total Sessions</th>
                                        <th>Popularity</th>
                                    </tr>
                                </thead>
                                <tbody class='lots_list_analytics'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection