<div class="cointainer">
    <div class="row">
        <div class="col-sm-3"><a href="{{route('view.section1.appraisal', ['appraisee_id' => $appraisee_id, 'supervisor_id' => $supervisor_id])}}" class="btm btn-submit @if(Request::segment(6) == 'section-1') active @endif"> SECTION 1</a></div>
        <div class="col-sm-3"><a href="{{route('view.section2.appraisal', ['appraisee_id' => $appraisee_id, 'supervisor_id' => $supervisor_id])}}" class="btm btn-submit @if(Request::segment(6) == 'section-2') active @endif"> SECTION 2</a></div>
        <div class="col-sm-3"><a href="{{route('view.section3.appraisal', ['appraisee_id' => $appraisee_id, 'supervisor_id' => $supervisor_id])}}" class="btm btn-submit @if(Request::segment(6) == 'section-3') active @endif"> SECTION 3</a></div>
        <div class="col-sm-3"><a href="{{route('view.section4.appraisal', ['appraisee_id' => $appraisee_id, 'supervisor_id' => $supervisor_id])}}" class="btm btn-submit @if(Request::segment(6) == 'section-4') active @endif"> SECTION 4</a></div>
    </div>
</div>