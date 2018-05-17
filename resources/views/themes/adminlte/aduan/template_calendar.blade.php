@extends('themes/adminlte/layouts/master')

@section('style')
<!-- fullCalendar -->
  <link rel="stylesheet" href="/themes/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="/themes/adminlte/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
@endsection

@section('content')
<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Summary</h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
title="Collapse">
<i class="fa fa-minus"></i></button>
<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
<i class="fa fa-times"></i></button>
</div>
</div>
<div class="box-body">

{!! $calendar->calendar() !!}

</div>
<!-- /.box-body -->
<div class="box-footer">
Footer
</div>
<!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->

@endsection

@section('script')
<script src="/themes/adminlte/bower_components/moment/moment.js"></script>
<script src="/themes/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

{!! $calendar->script() !!}
@endsection
