@extends('layouts.main')
@section('content')
@php
    if($community->nearby) {
        $nearby = []; 
        $nearby_data = get_object_vars(json_decode($community->nearby));
        $keys = ['hospital', 'school', 'restaurant', 'shopping_mall'];
        foreach($keys as $key){
            $nearby[$key] = [];
        }
        foreach($nearby_data as $key => $nearby_place_name){
            foreach($nearby_place_name as $nearby_place_list){
                array_push($nearby[$key], $nearby_place_list);
            }
        }
        $icons = ['hospital' => 'fa-hospital-o', 'restaurant' => 'fa-cutlery', 'school' => 'fa-graduation-cap', 'shopping_mall' => 'fa fa-cart-plus'];
    }
    else $nearby = []; 
    ini_set("max_execution_time", 0);
@endphp
<div class="main-wrapper">
    <div class="section-center" style="overflow: hidden; position: relative; align-items:normal">
        <div class="svgloader" style="position: absolute; background: rgba(255,255,255); height: 100%; width: 100%;z-index: 111;">
            <img src="{{ asset('images/spinner.gif') }}" style="height: auto; top: 30%; position: relative;">
        </div> 
        <div class="svg-draggable" id="stage">
            <div id="referencer"></div>
            <svg version="1.1" id="Layer_48" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="100%" height="100%" viewBox="0 0 492 227.2" style="enable-background:new 0 0 492 227.2;" xml:space="preserve">
            <style type="text/css">
                .st0{fill:#FFFFFF;stroke:#ED1F24;stroke-width:0.25;stroke-miterlimit:10;}
                .st1{ font-weight:500}
                .st2{font-size: 5.2px; }
                .st3{font-size:3.602px;}
            </style>
            <image style="overflow:visible;" width="3000" height="1388" xlink:href="/uploads/westview.jpg" transform="matrix(0.1643 0 0 0.1643 -0.3977 -0.2353)">
            </image>
            <g id="XMLID_7_">
                <polygon id="XMLID_2_" class="st0" points="41.1,142.4 59.8,141.9 64.7,128.8 54.2,128.8 	"/>
                <text id="XMLID_50_" transform="matrix(0.8862 0 0 1 49.8687 136.3672)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_99_">
                <polygon id="XMLID_3_" class="st0" points="84,128.5 79.8,141.8 65,142 69.7,128.5 	"/>
                <text id="XMLID_53_" transform="matrix(0.8862 0 0 1 69.9116 136.3672)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_100_">
                <polygon id="XMLID_4_" class="st0" points="89,128.5 84.9,141.4 99.7,141.4 103.3,128.2 	"/>
                <text id="XMLID_55_" transform="matrix(0.8862 0 0 1 89.1348 136.3672)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_101_">
                <polygon id="XMLID_5_" class="st0" points="108.5,128 104.8,141.4 119.6,141.2 122.7,127.7 	"/>
                <text id="XMLID_54_" transform="matrix(0.8862 0 0 1 108.8496 135.2286)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_102_">
                <polygon id="XMLID_6_" class="st0" points="127.6,127.7 124.6,141 139.4,140.7 142.1,127.4 	"/>
                <text id="XMLID_56_" transform="matrix(0.8862 0 0 1 127.9072 135.5762)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_103_">
                <polygon id="XMLID_8_" class="st0" points="146.9,127.4 144.5,140.6 159.2,140.2 161.2,127 	"/>
                <text id="XMLID_57_" transform="matrix(0.8862 0 0 1 147.6221 135.2286)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_104_">
                <path id="XMLID_9_" class="st0" d="M50.1,127.7c0,0-2.7-0.9-3.7-1.9c-1-1-1-1-1-1L10.4,134l-1.1,9.2l26.2-0.8L50.1,127.7z"/>
                <text id="XMLID_52_" transform="matrix(0.8862 0 0 1 22.959 136.3672)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_105_">
                <path id="XMLID_10_" class="st0" d="M44.6,122c0,0-0.3-1.6,0.3-3s0.9-1.7,0.9-1.7l-24.6-5.5L10,126.4l0.6,4.3L44.6,122z"/>
                <text id="XMLID_58_" transform="matrix(0.8862 0 0 1 22.959 121.2901)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_106_">
                <polygon id="XMLID_11_" class="st0" points="48.7,114.9 22.5,109 46.1,88.9 55.4,111.4 	"/>
                <text id="XMLID_59_" transform="matrix(0.8862 0 0 1 36.9229 105.8951)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_107_">
                <path id="XMLID_13_" class="st0" d="M60,110.2c0,0,2.6-0.9,6.2-0.5c3.6,0.4,3.6,0.4,3.6,0.4l8.4-21.6H50.7L60,110.2z"/>
                <text id="XMLID_60_" transform="matrix(0.8862 0 0 1 59.9238 99.3853)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_108_">
                <polygon id="XMLID_14_" class="st0" points="76.9,107.9 75.6,111.8 83.7,114 98.7,114 100.4,107.9 	"/>
                <text id="XMLID_61_" transform="matrix(0.8862 0 0 1 83.7466 112.1588)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_109_">
                <polygon id="XMLID_12_" class="st0" points="80,97.9 77.5,105 101.5,105 103.9,98.4 	"/>
                <text id="XMLID_62_" transform="matrix(0.8862 0 0 1 86.0117 102.8257)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_110_">
                <polygon id="XMLID_15_" class="st0" points="82.5,89 80,95.7 104.9,95.7 107.3,89.5 	"/>
                <text id="XMLID_63_" transform="matrix(0.8862 0 0 1 87.9849 93.6548)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_111_">
                <polygon id="XMLID_17_" class="st0" points="56.2,79.8 50.1,86.9 108.4,86.9 110.5,81 	"/>
                <text id="XMLID_64_" transform="matrix(0.8862 0 0 1 75.5518 85.1402)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_112_">
                <polygon id="XMLID_18_" class="st0" points="111.5,78.3 113.7,72.7 69.3,71.7 59.5,78.3 	"/>
                <text id="XMLID_65_" transform="matrix(0.8862 0 0 1 81.4951 76.2955)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_113_">
                <polygon id="XMLID_19_" class="st0" points="71.9,69.9 114.3,70.1 111.9,64.6 80.3,64 	"/>
                <text id="XMLID_66_" transform="matrix(0.8862 0 0 1 87.9849 68.4361)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_114_">
                <path id="XMLID_20_" class="st0" d="M111,62.2c0,0-0.2-1.5,1.7-3.3c0.7-0.6,0.2-0.3,2-1.4c0.7-0.4,1.3-0.9,1.3-0.9l-13.2-9.3
                    l-6.4,14.8H111z"/>
                <text id="XMLID_67_" transform="matrix(0.8862 0 0 1 100.7993 57.9556)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_115_">
                <path id="XMLID_16_" class="st0" d="M106.3,46.4l13.3,8.9c0,0,2.3-1.3,6.2-1.2s4,0.1,4,0.1l10.8-10l-31.3-0.4L106.3,46.4z"/>
                <text id="XMLID_68_" transform="matrix(0.8862 0 0 1 119.1997 49.563)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_116_">
                <path id="XMLID_21_" class="st0" d="M134,54.8c0,0,1.9,0.2,3.3,1.8c1.3,1.6,1.7,2.5,1.7,2.5l18.7-0.8l3.1-13.4l-16-0.4L134,54.8z"
                    />
                <text id="XMLID_69_" transform="matrix(0.8862 0 0 1 143.3496 53.0015)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_117_">
                <polygon id="XMLID_22_" class="st0" points="138.9,61.4 136.9,67.5 156.4,67.7 157.8,62.9 156.9,62.9 157.3,60.6 	"/>
                <text id="XMLID_70_" transform="matrix(0.8862 0 0 1 142.3647 65.4879)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_118_">
                <polygon id="XMLID_24_" class="st0" points="136.1,69.6 134.2,75.9 154,76.3 155.6,70 	"/>
                <text id="XMLID_71_" transform="matrix(0.8862 0 0 1 140.6118 73.6763)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_119_">
                <polygon id="XMLID_23_" class="st0" points="133.3,78.3 131.1,84.8 151.6,85.2 153.2,78.6 	"/>
                <text id="XMLID_26_" transform="matrix(0.8862 0 0 1 136.4097 82.8472)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_120_">
                <polygon id="XMLID_72_" class="st0" points="130.4,87.5 127.9,94.3 148.9,95 150.7,88 	"/>
                <text id="XMLID_73_" transform="matrix(0.8862 0 0 1 134.7114 92.1812)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_121_">
                <polygon id="XMLID_25_" class="st0" points="127.3,96.7 124.8,104.2 146.3,104.2 148,97.3 	"/>
                <text id="XMLID_74_" transform="matrix(0.8862 0 0 1 132.4111 101.4595)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_122_">
                <polygon id="XMLID_27_" class="st0" points="124.1,106.9 122.5,113.4 144.5,112.9 145.7,106.9 	"/>
                <text id="XMLID_75_" transform="matrix(0.8862 0 0 1 129.1797 111.0689)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_123_">
                <polygon id="XMLID_28_" class="st0" points="154.1,97.6 150.8,113.1 162.5,112.8 164.6,97.8 	"/>
                <text id="XMLID_76_" transform="matrix(0.8862 0 0 1 153.2446 106.9205)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_124_">
                <polygon id="XMLID_29_" class="st0" points="169.1,98 167.2,112.6 175.5,112.6 178.5,98.2 	"/>
                <text id="XMLID_77_" transform="matrix(0.8722 0 0 1 168.1953 106.5181)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_125_">
                <polygon id="XMLID_30_" class="st0" points="200.8,100.4 199.3,112 218.7,111.8 218.7,100.4 	"/>
                <text id="XMLID_78_" transform="matrix(0.8862 0 0 1 204.5034 106.9205)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_126_">
                <polygon id="XMLID_31_" class="st0" points="223.2,100.1 223.2,111.7 237,111.3 236.8,99.9 	"/>
                <text id="XMLID_79_" transform="matrix(0.8862 0 0 1 225.5327 106.9205)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_127_">
                <polygon id="XMLID_32_" class="st0" points="241.2,99.7 256.4,99.7 256.7,111.5 241.6,111.5 	"/>
                <text id="XMLID_81_" transform="matrix(0.8862 0 0 1 244.2612 106.9205)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_128_">
                <polygon id="XMLID_34_" class="st0" points="263.7,99.4 277.7,99.4 279.3,110.7 264.9,110.7 	"/>
                <text id="XMLID_80_" transform="matrix(0.8862 0 0 1 266.6006 106.188)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_129_">
                <polygon id="XMLID_33_" class="st0" points="282.3,99.2 296,98.9 297.9,110.4 284,110.7 	"/>
                <text id="XMLID_82_" transform="matrix(0.8862 0 0 1 285.0703 105.8951)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_130_">
                <polygon id="XMLID_35_" class="st0" points="299.5,97.7 302.3,112.5 317.4,112.1 314.2,97.3 	"/>
                <text id="XMLID_83_" transform="matrix(0.8862 0 0 1 303.3066 106.188)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_131_">
                <polygon id="XMLID_36_" class="st0" points="336.2,98.1 349.9,97.9 353.2,109.4 339.5,109.7 	"/>
                <text id="XMLID_84_" transform="matrix(0.8862 0 0 1 340.1904 104.813)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_132_">
                <polygon id="XMLID_37_" class="st0" points="354.2,97.9 357.9,109.7 371.7,109.3 367.7,97.7 	"/>
                <text id="XMLID_86_" transform="matrix(0.8862 0 0 1 357.7822 104.813)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_133_">
                <polygon id="XMLID_39_" class="st0" points="372.3,97.7 376.4,109.4 390.2,109 386.2,97.3 	"/>
                <text id="XMLID_85_" transform="matrix(0.8862 0 0 1 376.3359 104.4039)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_134_">
                <polygon id="XMLID_38_" class="st0" points="390.1,97.5 394.8,109.1 408.5,108.4 403.6,97 	"/>
                <text id="XMLID_87_" transform="matrix(0.8862 0 0 1 394.7354 104.4039)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_135_">
                <polygon id="XMLID_40_" class="st0" points="406.8,95.7 413.2,110.4 427.8,110.4 422,95.7 	"/>
                <text id="XMLID_88_" transform="matrix(0.8862 0 0 1 413.0527 104.4039)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_136_">
                <polygon id="XMLID_41_" class="st0" points="398.1,122.9 412.4,122.4 417.9,135.7 403.4,135.9 	"/>
                <text id="XMLID_89_" transform="matrix(0.8862 0 0 1 403.7715 130.2549)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_137_">
                <polygon id="XMLID_42_" class="st0" points="379.4,123.3 393.5,122.9 398.7,135.9 384,136.2 	"/>
                <text id="XMLID_90_" transform="matrix(0.8862 0 0 1 385.041 131.3194)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_138_">
                <polygon id="XMLID_43_" class="st0" points="360.4,123.5 374.7,123.2 379.2,136.2 364.5,136.5 	"/>
                <text id="XMLID_91_" transform="matrix(0.8862 0 0 1 364.3418 131.3194)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_139_">
                <polygon id="XMLID_44_" class="st0" points="341.4,123.9 355.8,123.6 359.7,136.5 345,137 	"/>
                <text id="XMLID_93_" transform="matrix(0.8862 0 0 1 345.9414 131.3194)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_140_">
                <polygon id="XMLID_45_" class="st0" points="336.7,123.6 340.3,137 325.5,137.3 322.9,124.2 	"/>
                <text id="XMLID_92_" transform="matrix(0.8862 0 0 1 326.9648 132.3008)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_141_">
                <polygon id="XMLID_46_" class="st0" points="303.7,124.5 306,137.6 320.6,137.6 317.8,124.5 	"/>
                <text id="XMLID_94_" transform="matrix(0.8862 0 0 1 307.4971 132.3008)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_142_">
                <polygon id="XMLID_47_" class="st0" points="284.7,124.9 298.7,124.5 301.2,137.8 286.3,137.8 	"/>
                <text id="XMLID_95_" transform="matrix(0.8862 0 0 1 287.8633 132.711)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_143_">
                <polygon id="XMLID_48_" class="st0" points="261.7,125.2 279.7,125 281.5,138 262.5,137.8 	"/>
                <text id="XMLID_96_" transform="matrix(0.8862 0 0 1 266.6006 133.2012)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_144_">
                <polygon id="XMLID_49_" class="st0" points="234.1,125.7 234.6,139 256.9,138.5 256.2,125.2 	"/>
                <text id="XMLID_97_" transform="matrix(0.8862 0 0 1 239.9868 133.2012)" class="st1 st2">OOOO</text>
            </g>
            <g id="XMLID_145_">
                <polygon id="XMLID_51_" class="st0" points="215.1,126 214.8,139.4 229.4,139 229.2,126 	"/>
                <text id="XMLID_98_" transform="matrix(0.8862 0 0 1 217.7231 134.0206)" class="st1 st2">OOOO</text>
            </g>
            </svg>
        </div>
    </div>
    @include('includes.sidemenu')
    @include('includes.floating-icons')
    <div class="section-left">
        <div class="bottom-img">
            <ul class="zoom-icons">
                <li class="refrest-btn"> 
                  <div class="theme-white-icon theme-icon icon-refresh"></div>
                </li>
                <li class="zoomin-btn" onclick="step('zoom-in')"> 
                  <i class="theme-white-icon theme-icon icon-plus" ></i>
                </li>
                <li class="zoomout-btn" onclick="step('zoom-out')"> 
                  <i class="theme-white-icon theme-icon icon-minus" ></i>
                </li>
            </ul>
        </div>
    </div>
    <!--  Div for tool tip-->
    <div id="lotInfoOnHover">
        <p class="alias"></p>
        <p class="price"></p>
        <p class="status"></p>      
    </div>
    <!-- end of the div here-->
    <div class="footer">
        <div class="row h-100 justify-content-between align-items-center">
            <div class="footer-btns pbtns">
                @if(Session::has('com_first'))
                <a class="pbs-btn" href="{{ asset('/elevations?community='.$community->slug) }}">previous</a>
                @else
                @if($home_type)
                <a class="pbs-btn" href="{{ asset('/community/'.$home->slug.'/'.$home_type->slug) }}">previous</a>
                @else
                <a class="pbs-btn" href="{{ asset('/community/'.$home->slug) }}">previous</a>
                @endif
                @endif
            </div> 
            <div class="row footer-title" style="padding:10px 0 !important;">
                <h5 class="m-0 pr-2 border-right">
                    <span class="material-icons">business</span>
                    {{$community->name}}</h5>
                <h6 class="m-0 pl-2">
                    <span class="material-icons">home</span>
                    {{$home->title}} @if($home_type)<span class="m-0 home-type-title" style="position:unset; color:#1f223e;">- {{$home_type->title}}</span> @endif
                </h6>
            </div>           
            <div class="footer-btns fns-btn">
                <a href="javascript:void(0);" id="continue_to_home" data-lid="" data-hid="" data-link="">Continue</a>

            </div>
        </div>
        <div class="close-arrow">
            <span class="material-icons">
            expand_more
            </span>
        </div>
    </div>
</div>
<!-- Feature Tour Modal -->
<div class="login-section feature-tour">
    <div class="modal fade" id="FeatureTourModal" tabindex="-1" role="dialog" aria-labelledby="FeatureTourModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center" style="max-width: 450px">
            <div class="modal-header">
                <h5 class="modal-title" id="FeatureTourModalLongTitle">Features Tour</h5>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('new-ui/images/close-btn.png') }}" alt="">
            </button>
            <div class="modal-body">
                <p>Let's start your tour....</p>
                <div class="tab-box">
                    <button type="button" class="btn btn-primary btn-block waves-effect waves-light login-button" id="pstart-btn">Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
window.onload = function(){ 
    @if(Session::has('lot_group'))
        var lid = '<?= Session::get('lot_group') ?>';
        $('#'+lid).trigger('click');
    @endif
    downrate();
    $('#shmprice').html(formatter.format(<?=($home_type)?$home_type->price:$home->price?>));
    $('#shome_id').val(<?= ($home_type)?$home_type->price:$home->price?>);
    setPayment();
}    
</script>
@endpush
@endsection
