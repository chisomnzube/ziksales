@extends('layouts.dashboard')
@section('head')

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="msapplication-tap-highlight" content="no"/>
  <!-- Font & Icon -->
  <link rel="stylesheet" href="../../agent/font/inter/inter.min.css">
  <link href="../../agent/plugins/material-design-icons-iconfont/material-design-icons.min.css" rel="stylesheet">
  <link href="../../agent/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Plugins -->
  <link rel="stylesheet" href="../../agent/plugins/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../agent/plugins/datatables/responsive.bootstrap4.min.css">
  <!-- Main Style -->
  <link rel="stylesheet" href="../../agent/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
  <link rel="stylesheet" href="../agent/css/style.min.css" id="main-css">
  <link rel="stylesheet" href="../agent/css/sidebar-gray.min.css" id="theme-css"> <!-- options: blue,cyan,dark,gray,green,pink,purple,red,royal,ash,crimson,namn,frost -->
  <title>My Orders - Agent Portal | {{config('app.name')}}</title>
</head>
@endsection
@section('main-content')

    <!-- Main body -->
    <div class="main-body">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('agent.index') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Agent Order(s)</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->


      <h5 class="mt-5">My Orders</h5>
      @include('inc.messages')
      {{-- <p class="text-secondary font-size-sm">
        DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table.
      </p> --}}
      <div class="card">
        <div class="card-body">
          <table id="example" class="table table-striped table-bordered table-sm dt-responsive nowrap w-100">
            <!-- Filter columns -->
            <thead>
              <tr class="column-filter dt-column-filter">
                <th><input type="text" class="form-control form-control-sm" placeholder="Search S/N"></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Product"></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Price"></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Profit"></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Order ID"></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Status"></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Date"></th>
              </tr>
              <tr>
                <th>S/N</th>
                <th>Product</th>
                <th>Price</th>
                <th>Profit</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
            <!-- /Filter columns -->

            <tbody>
              <?php $i = 0; ?>
              @if($orders->count() > 0)
                @foreach($orders as $order)
                <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  @if(getProduct($order->product_id) != null)
                  <td>{{getProduct($order->product_id)->name}}</td>
                  <td class="font-number">&#8358;{{ number_format( totalcash(getProduct($order->product_id)->price, getProduct($order->product_id)->profit) )}}</td>
                  @endif
                  
                  <td class="font-number">&#8358;{{ number_format($order->profit)}}</td>
                  <td class="font-number">{{$order->order_id}}</td>
                  <td>{{$order->status == 1 ? 'Valid' : 'InValid'}}</td>
                  <td class="font-number">{{$order->created_at->format('d M, Y')}}</td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <!-- /Main body -->
@endsection
@section('script')

  <!-- Main Scripts -->
  <script src="../agent/js/jquery.min.js"></script>
  <script src="../agent/js/bootstrap.bundle.min.js"></script>
  <script src="../../agent/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="../../agent/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="../../agent/plugins/feather-icons/feather.min.js"></script>
  <script src="../agent/js/script.min.js"></script>
  <script src="../agent/js/settings.min.js"></script>

  <!-- Plugins -->
  <script src="../../agent/plugins/datatables/jquery.dataTables.bootstrap4.responsive.min.js"></script>
  <script>
    $(() => {
      // Run datatable
      var table = $('#example').DataTable({
        drawCallback: function () {
          $('.dataTables_paginate > .pagination').addClass('pagination-sm') // make pagination small
        }
      })
      // Apply column filter
      $('#example .dt-column-filter th').each(function (i) {
        $('input', this).on('keyup change', function () {
          if (table.column(i).search() !== this.value) {
            table
            .column(i)
            .search(this.value)
            .draw()
          }
        })
      })
      // Toggle Column filter function
      var responsiveFilter = function (table, index, val) {
        var th = $(table).find('.dt-column-filter th').eq(index)
        val === true ? th.removeClass('d-none') : th.addClass('d-none')
      }
      // Run Toggle Column filter at first
      $.each(table.columns().responsiveHidden(), function (index, val) {
        responsiveFilter('#example', index, val)
      })
      // Run Toggle Column filter on responsive-resize event
      table.on('responsive-resize', function (e, datatable, columns) {
        $.each(columns, function (index, val) {
          responsiveFilter('#example', index, val)
        })
      })
    })
  </script>
@endsection