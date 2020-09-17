@extends('layouts.admin') @section('content')
<div class="container-fluid">
	<div class="justify-content-between mb-1">
		<h1 class="a_dash">Bulk Data Upload</h1> 
	</div>
	<div id="syncresponse">
		<div class="sync-process text-center mb-1">
			<ul class="text-center">
				<li> <a class="active text-center" id="ss_step">1</a> </li>
				<li> <a class="incomplete text-center" id="drm_step">2</a> </li>
				<li> <a class="incomplete text-center" id="sr_step">3</a> </li>
			</ul>
		</div>
		<div class="fix-sync">
			<div class="sync-container">
				<div id="ss_step_div" class="text-center containers">
					<h3 class="text-center">Import Files</h3>
					<div class="pt-0 pb-2">
						<h6>Have existing records in your own file? Import your own excel file. If not you can download sample file.</h6>
					</div>
					<div class="row pl-1 pr-1 justify-content-between align-items-center choose-file-wrap">
						<div class="file-upload pr-md-1 pr-0">
							<div class="file-select">
								<div class="file-select-button" id="fileName">Choose Excel File</div>
								<div class="file-select-name" id="noFile">No file chosen...</div>
								<input type="file" name="excel_file" id="excelFile"> 
                            </div>
						</div> 
                        <a href="{{ url('/admin/bulk-upload-sample.xlsx') }}">
                            <button class="btn btn-secondary btn-sm ftbtn" type="button"> Sample File </button>
                        </a>
                    </div>
					<h6 class="my-2">OR</h6>
                    <button class="btn btn-info btn-sm ftbtn" type="button"> Import From Google </button>
					<h6 class="mt-3" style="cursor:pointer; width:fit-content; margin:0 auto;">View Recent Reports</h6>
                    <div id="start_sync" class="d-none">
						<p>Please wait.. We are importing the data.</p>
						<p class="syncloader"><img src="{{ asset('images/spinner.gif') }}"></p>
					</div>
				</div>
				<div id="drm_step_div" class="table-responsive containers">
					<h3 class="text-center">Data Mapping</h3>
				</div>
				<div id="sr_step_div" class="containers">
					<h3 class="text-center">Sync Report</h3>
					<div class="scrollable-table">
						<div class="text-center sr-ans"> <i class="material-icons">done</i> <span>All data has been updated successfully.</span>
							<ul class="same-btns">
								<li> <a href="#">Sync Data Again </a> </li>
								<li> <a href="#">View Report </a> </li>
							</ul>
							<ul class="sys-btns">
								<li> <a href="#">Manage Communities </a> </li>
								<li> <a href="#">Manage Elevations </a> </li>
								<li> <a href="#">Manage Floors </a> </li>
							</ul>
						</div>
						<div class="sr-synop">
							<h6>Activity Log </h6>
							<p> <span class="border-bottom"> <b class="badge badge-success">5</b> Lots has been updated successfully.  </span> </p>
							<p> <span class="border-bottom"> <b class="badge badge-danger">3</b> conflicts has been skipped.  </span> </p>
							<p> <span class="border-bottom"> <b class="badge badge-info">100%</b> Sync Process Completed. </span> </p>
						</div>
					</div>
					<div class="text-center"> <a href="/admin/dashboard" class="btn btn-dark btn-md"> Close</a> </div>
				</div>
			</div>
            <div class="footer-buttons">
                <button class="btn btn-secondary btn-sm ftbtn" id="backButton" type="button" onclick="changeStep(false)"> Back </button>
                <button class="btn btn-info btn-sm ftbtn" type="button" onclick="changeStep(true)"> Next </button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade show" id="sdsModal" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5>Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fa fa-times"></i>  </span> </button>
			</div>
			<div class="modal-body">
				<div class="">
					<h6 class="delete_heading">What can you do by this button ?</h6>
					<div class="clearfix"></div>
					<div class="mb-3">
						<ul>
							<li>You can change Lot status to sold and connect the respective elevation and elevation type.</li>
							<li>You can change Lot status to available and connect multiple elevations.</li>
							<li>After syncing, you will see all the changes below.</li>
						</ul>
					</div>
					<h6 class="delete_heading">What can't you do by this button?</h6>
					<div class="clearfix"></div>
					<div class="mb-3">
						<ul>
							<li>You can not update elevation or anything without changing Lot Status.</li>
							<li>You can change Lot status to any available status but elevations will update only with lot status - Sold, Available.</li>
							<li>After syncing, you will see all the changes below.</li>
						</ul>
					</div>
					<h6 class="delete_heading text-danger"> Points to remember</h6>
					<div class="clearfix"></div>
					<div class="text-danger">
						<ul>
							<li>When you making any change in lot status, It is mandatory to change STATUS CODE.</li>
							<li>If Lot status is sold, then there must be only 1 elevation ID, 1 elevation name and elevation type.</li>
							<li>For elevation update, Elevation ID must be updated with elevation name.</li>
							<li>You can download Elevation master sheet any time from the report section above.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade show" id="sasModal" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5>Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fa fa-times"></i>  </span> </button>
			</div>
			<div class="modal-body">
				<div class="">
					<h6 class="delete_heading">What can you do by this button ?</h6>
					<div class="clearfix"></div>
					<div>
						<ul>
							<li>This button will sync all data with CRM.</li>
							<li>This feature has been disabled at the moment.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>

#ss_step_div{
	display: block;
}

.containers{
	display:none;
}

th .form-control-checkbox,
td .form-control-checkbox {
	float: right
}

.form-control-checkbox {
	height: 18px;
	width: 18px;
	cursor: pointer
}

.step-2-tbl thead {
	border: 1px solid #f6f6f6;
	background: #ccc
}

.step-2-tbl th {
	padding: 10px 8px!important;
	text-align: center
}

.step-2-tbl td {
	padding: 8px!important;
	text-align: center
}

.step-2-tbl p.ds_old_value {
	margin: 0 0 5px;
	padding: 0 0 5px
}

.step-2-tbl p.ds_new_value {
	margin: 0;
	font-weight: 600;
	color: #F44336
}

.step-2-tbl .btn {
	box-shadow: none
}

.sync-container {
	padding: 15px
}

.fix-sync h6 {
	font-weight: 600
}

a.add_button.active {
	background: #003a8b
}

.sync-process ul {
	margin: 0;
	padding: 0
}

.sync-process ul li:not(:first-child) a::before {
	position: absolute;
	content: "";
	height: 8px;
	width: 87px;
	background: #6c757d;
	z-index: 9;
	top: 16px;
	right: 37px
}

.sync-process li {
	list-style: none;
	display: inline-block;
	width: 120px
}

.sync-process a {
	position: relative;
	margin-right: 1px!important;
	z-index: 111;
	border-radius: 50%;
	width: 40px;
	height: 40px;
	display: inline-block;
	line-height: 40px;
	font-size: 19px
}

.sync-process ul li:not(:first-child) a.active::before,
.sync-process ul li:not(:first-child) a.complete::before {
	background-color: #007bff!important;
	right: 38px;
}

.sync-process a.active {
	color: #fff!important;
	background-color: #007bff!important
}

.sync-process a.incomplete {
	color: #fff!important;
	background-color: #6c757d!important
}

.sync-process a.complete {
	color: #fff!important;
	background-color: #007bff!important
}

.fix-sync {
	height: calc(100vh - 260px);
	overflow: auto;
	background: #fff;
	border: 1px solid #e4e4e4;
	border-radius: 7px;
    position: relative;
}

.fix-sync h3 {
	text-align: center;
	font-weight: 600;
	text-transform: uppercase;
	margin-top: 10px;
}

.scrollable-table {
	height: calc(100vh - 475px);
	overflow: auto
}

.bg-sdanger {
	background-color: #fadbd8!important
}

.bg-ssuccess {
	background-color: #d2f4e8!important
}

.sr-ans {
	margin: 30px
}

.sr-ans i {
	font-weight: 600;
	font-size: 36px;
	border: 2px solid #aaa;
	padding: 27px 20px;
	border-radius: 69%
}

.sr-ans span {
	display: block;
	margin-top: 15px;
	font-weight: 500;
	font-size: 19px;
	margin-bottom: 10px
}

.sr-ans ul.same-btns {
	list-style: none
}

.sr-ans ul.same-btns li {
	display: inline-block;
	padding: 0 8px;
	line-height: 15px
}

.sr-ans ul.same-btns li:not(:first-child) {
	border-left: 1px solid
}

.sr-ans ul.same-btns li a {
	font-weight: 500;
	text-transform: uppercase
}

.sr-ans ul.sys-btns {
	list-style: none
}

.sr-ans ul.sys-btns li {
	display: inline-block;
	padding: 0 8px;
	line-height: 15px
}

.sr-ans ul.sys-btns li:not(:first-child) {
	border-left: 1px solid
}

.sr-ans ul.sys-btns li a {
	font-weight: 500;
	text-transform: uppercase
}

.sr-synop {
	padding: 20px;
	text-align: center
}

.sr-synop h6 {
	text-transform: uppercase;
	font-size: 17px
}

.sr-synop p {
	font-size: 16px
}

tr.bg-ssuccess input[type="checkbox"],
tr.bg-sdanger input[type="checkbox"] {
	display: none;
}

#bulk-action-box {
	padding: 8px 10px;
	margin-bottom: 8px;
	background: #f4f4f4;
	border: 1px solid #e4e4e4;
}

.choose-file-wrap{
    max-width: 70%;
    margin: 0 auto;
}

.file-upload {
    display: block;
    text-align: center;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 12px;
    width: calc(100% - 96px);
}

.file-upload .file-select {
    display: block;
    border: 2px solid #dce4ec;
    color: #34495e;
    cursor: pointer;
    height: 40px;
    line-height: 40px;
    text-align: left;
    background: #FFFFFF;
    overflow: hidden;
    position: relative;
}

.file-upload .file-select .file-select-button {
    background: #dce4ec;
    padding: 0 10px;
    display: inline-block;
    height: 40px;
    line-height: 40px;
}

.file-upload .file-select .file-select-name {
    line-height: 40px;
    display: inline-block;
    padding: 0 10px;
}

.file-upload .file-select:hover {
    border-color: #34495e;
    transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
}

.file-upload .file-select:hover .file-select-button {
    background: #34495e;
    color: #FFFFFF;
    transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
}

.file-upload.active .file-select {
    border-color: #3fa46a;
    transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
}

.file-upload.active .file-select .file-select-button {
    background: #3fa46a;
    color: #FFFFFF;
    transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
}

.file-upload .file-select input[type=file] {
    z-index: 100;
    cursor: pointer;
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    filter: alpha(opacity=0);
}

.file-upload .file-select.file-select-disabled {
    opacity: 0.65;
}

.file-upload .file-select.file-select-disabled:hover {
    cursor: default;
    display: block;
    border: 2px solid #dce4ec;
    color: #34495e;
    cursor: pointer;
    height: 40px;
    line-height: 40px;
    margin-top: 5px;
    text-align: left;
    background: #FFFFFF;
    overflow: hidden;
    position: relative;
}

.file-upload .file-select.file-select-disabled:hover .file-select-button {
    background: #dce4ec;
    color: #666666;
    padding: 0 10px;
    display: inline-block;
    height: 40px;
    line-height: 40px;
}

.file-upload .file-select.file-select-disabled:hover .file-select-name {
    line-height: 40px;
    display: inline-block;
    padding: 0 10px;
}
.btn-orange{
    padding: .5rem 1.2rem;
    height: fit-content;
}

.footer-buttons{
    position: absolute;
    text-align: center;
    right: 15px;
    bottom: 15px;
}

#backButton{
	display: none;
}

@media(max-width:768px){
    .file-upload{width: 100%;}
    .choose-file-wrap{max-width: 100%;}
}
</style>
@endsection
@push('scripts')
<script>
// buttonClicked = true for next and false for back
let step = 1;
const changeStep = (buttonClicked) => {
	if(buttonClicked == true)
	{
		if(step < 4)
			step++;
	}
	else
	{
		if(step > 0)
			step--;
	}
	switch(step)
	{
		case 1:
			$('#ss_step').addClass('active').removeClass('incomplete');
			$('#drm_step').addClass('incomplete').removeClass('active');
			$(".containers").fadeOut(function(){
				$('#ss_step_div').fadeIn();
			});
			$('#backButton').fadeOut();
			break;
		case 2: 
			$('#ss_step').addClass('complete').removeClass('active');
			$('#drm_step').addClass('active').removeClass('incomplete');
			$(".containers").fadeOut(function(){
				$('#drm_step_div').fadeIn();
			});
			$('#backButton').fadeIn();
			break;
		case 3: 
			break;
	}
}
$(document).ready(function(){
    var file = null;
    var filename;
    $('#excelFile').on('change', function () {
        $(".error-messages").html('');
        file = this.files[0];
        filename = $("#excelFile").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen..."); 
        }
        else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
        }
    });

    // Modal Event
    $('#bulkUploadModal').on('hidden.bs.modal', function (e) {
        $("#excelFile").val('');
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen..."); 
        file = null;
        $(".error-messages").html('');
    })
         
    //Bulk Upload 
    $("#bulkUpload").click(function(){
        var formData = new FormData();
        formData.append('excelFile', file);
        if(file != null){
            var fileExtension = filename.split('.').pop();
            if(fileExtension == 'xlsx'){
                $.ajax({
                    type        : "post",
                    url         : "/api/mega-import",
                    headers     : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data        : formData,
                    cache       : false,
                    contentType : false,
                    processData : false,
                    success     : function(response){
                    toastr.success(response);
                    $("#bulkUploadModal").modal('hide');
                    $(".error-messages").html('');
                    },
                    error       : function(error){
                    console.log(error);
                    toastr.error(error.responseJSON.message);
                    var errorMessages = '';
                    $.each(error.responseJSON.errors, function(){
                        errorMessages += `<small class="danger">${this}</small><br>`
                    });
                    $(".error-messages").html(errorMessages);
                    } 
                });
            }
            else{
                toastr.error("Please choose an excel file.");
            }
        }
        else{
            toastr.error("Please choose an excel file.");
        }
    });
});
</script>
@endpush