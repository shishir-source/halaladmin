<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Halal Haram App Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- end of global css -->
    <!--page level css -->
    <link href="{{ asset('public/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="{{ asset('public/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/pages/only_dashboard.css') }}" />
    <link href="{{ asset('public/vendors/iCheck/css/square/blue.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet" />
    <!-- page level css -->
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/pages/login.css') }}" />--}}

    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/vendors/datatables/css/dataTables.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/vendors/datatables/css/buttons.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/vendors/datatables/css/colReorder.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/vendors/datatables/css/dataTables.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/vendors/datatables/css/rowReorder.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/vendors/datatables/css/buttons.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public') }}/vendors/datatables/css/scroller.bootstrap.css" />
    <link href="{{ asset('public') }}/css/pages/tables.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('public') }}/css/pages/only_dashboard.css" />

    <!-- end of page level css -->
    <!-- global css -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet" type="text/css" />


</head>
<body class="skin-josh">

@include('layouts.includes.navbar')
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.includes.leftsidebar')
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        @yield('content')
    </aside>
    <!-- right-side -->
</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>


    <!-- global js -->
    <script src="{{ asset('public/js/app.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!-- EASY PIE CHART JS -->
    <script src="{{ asset('public/vendors/jquery.easy-pie-chart/js/easypiechart.min.js') }}"></script>
    <script src="{{ asset('public/vendors/jquery.easy-pie-chart/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.easingpie.js') }}"></script>
    <!--end easy pie chart -->
    <!--for calendar-->
    <script src="{{ asset('public/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/vendors/fullcalendar/js/fullcalendar.min.js') }}" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="{{ asset('public/vendors/flotchart/js/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/vendors/flotchart/js/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="{{ asset('public/vendors/sparklinecharts/jquery.sparkline.js') }}"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="{{ asset('public/vendors/countUp.js')}}"></script>
    <!--   maps -->
    <script src="{{ asset('public/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{ asset('public/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('public/vendors/chartjs/Chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>


    <!--  todolist-->

    <!-- begining of page level js -->
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/jeditable/js/jquery.jeditable.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/dataTables.colReorder.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/dataTables.rowReorder.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/buttons.colVis.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/buttons.html5.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/buttons.print.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/pdfmake.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/vendors/datatables/js/dataTables.scroller.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/pages/table-advanced.js"></script>

    <script src="{{ asset('public/js/pages/todolist.js') }}"></script>
    <script src="{{ asset('public/js/pages/dashboard.js') }}" type="text/javascript"></script>
    <!-- end of page level js -->
    
    <script>
//   $(document).ready(function () {
//       $('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
           
//           $('.id').text($(this).data('id'));
           
//           e.preventDefault();
           
//           $('#confirm').modal({ backdrop: 'static', keyboard: false })
//                   .on('click', '#delete-btn', function(){
                       
//                       var id = $('.id').text();
                       
//                         // $.ajax({
//                         //     url: 'category/delete/'+id,
//                         //     type: 'POST',
//                         //     data: {'_token':'{{ csrf_token() }}'},
//                         //     success: function(data){
//                         //         console.log("asdasd");
//                         //     }
//                         //  });
//                          return true;
//           });
//       });
//   });
</script>
</body>
</html>
