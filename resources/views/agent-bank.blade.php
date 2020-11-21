@extends('layouts.dashboard')
@section('head')

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="msapplication-tap-highlight" content="no"/>
  <!-- Font & Icon -->
  <!-- Font & Icon -->
  <link rel="stylesheet" href="../../agent/font/inter/inter.min.css">
  <link href="../../agent/plugins/material-design-icons-iconfont/material-design-icons.min.css" rel="stylesheet">
  <link href="../../agent/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Plugins -->
  <link rel="stylesheet" href="../../agent/plugins/bootstrap-select/bootstrap-select.min.css">
  <!-- CSS plugins goes here -->
  <!-- Main Style -->
  <link rel="stylesheet" href="../../agent/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
  <link rel="stylesheet" href="../agent/css/style.min.css" id="main-css">
  <link rel="stylesheet" href="../agent/css/sidebar-gray.min.css" id="theme-css"> <!-- options: blue,cyan,dark,gray,green,pink,purple,red,royal,ash,crimson,namn,frost -->
  <title>My Bank - Agent Portal | {{config('app.name')}}</title>
</head>
@endsection
@section('main-content')

    <!-- Main body -->
    <div class="main-body">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('agent.index') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">My Bank</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->


      <h5 class="mt-5">My Bank</h5>
      @include('inc.messages')
      {{-- <p class="text-secondary font-size-sm">
        DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table.
      </p> --}}
      <div class="card">
        <div class="card-body">
          <section id="section3">
            <h5>Select Your Bank Account</h5>
            {{-- <p class="text-muted font-size-sm">
              Custom select menus need only a custom class, <code>.custom-select</code> to trigger the custom styles.
            </p> --}}
            @if($checkAgentBank < 1)
            <form action="{{ route('agentBank.store') }}" method="POST">
            <div class="row">
                @csrf
                @captcha                
              
              <div class="col-sm-12">
                  <input type="text" name="accountName" class="form-control" placeholder="Account Name"><br>
                  <select name="bankName" class="form-control bs-select" title="Choose Bank Name" data-live-search="true">
                    @foreach($banks as $item)
                      <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                  </select> <br><br>
                  <input type="number" name="accountNumber" class="form-control" placeholder="Account Number"><br>
                  <button type="submit" class="btn btn-info">Submit</button>
                
              </div>

            </div>
          </form>
          @else
            <form action="{{ route('agentBank.update') }}" method="POST">
              <div class="row">
                  @csrf
                  @captcha                
                
                <div class="col-sm-12">
                    <input type="text" name="accountName" class="form-control" placeholder="Account Name" value="{{$bank->accountName}}"><br>
                    <select name="bankName" class="form-control bs-select" title="Choose Bank Name" data-live-search="true">
                      @foreach($banks as $item)
                      <option {{$item->name == $bank->bankName ? 'selected' : ''}} value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                    </select> <br><br>
                    <input type="number" name="accountNumber" class="form-control" placeholder="Account Number" value="{{$bank->accountNumber}}"><br>
                    <button type="submit" class="btn btn-info">Update</button>
                  
                </div>

              </div>
            </form>
          @endif
          </section>       
          
          
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
  <script src="../../agent/plugins/bootstrap-select/bootstrap-select.min.js"></script>
  <script>
    $(() => {
      $('.bs-select').selectpicker({ style: 'btn' })
      $('.bs-select-sm').selectpicker({ style: 'btn btn-sm' })
      $('.bs-select-lg').selectpicker({ style: 'btn btn-lg' })
      $('.bootstrap-select').on('show.bs.select', function () {
        this.querySelector('.dropdown-toggle').classList.add('focus')
      }).on('hide.bs.select', function () {
        this.querySelector('.dropdown-toggle').classList.remove('focus')
      })
      $('.bs-select-creatable').selectpicker({
        style: 'btn',
        liveSearch: true,
        noneResultsText: 'Press Enter to add: <b>{0}</b>'
      })
      $('.bs-select-creatable .bs-searchbox .form-control').on('keyup', function (e) {
        const bs = this.closest('.bootstrap-select')
        if (bs.querySelector('.no-results')) {
          if (e.keyCode === 13) {
            let el = bs.querySelector('select')
            el.insertAdjacentHTML('afterbegin', `<option value="${$(this).val()}">${$(this).val()}</option>`)
            let newVal = $(el).val()
            Array.isArray(newVal) ? newVal.push(this.value) : newVal = this.value
            console.log(newVal)
            $(el).val(newVal)
            $(el).selectpicker('toggle')
            $(el).selectpicker('refresh')
            bs.querySelector('.dropdown-toggle').focus()
            this.value = ''
          }
        }
      })

      // Clearable
      function toggleClear(select, el) {
        el.style.display = select.value == '' ? 'none' : 'inline'
        if (select.value == '') {
          select.parentNode.querySelector('.filter-option').classList.remove('mr-4')
        } else {
          select.parentNode.querySelector('.filter-option').classList.add('mr-4')
        }
      }
      for (const el of document.querySelectorAll('select.bs-select, select.bs-select-sm, select.bs-select-lg')) {
        const clearEl = el.parentNode.nextElementSibling
        if (clearEl && clearEl.classList.contains('bs-select-clear')) {
          toggleClear(el, clearEl)
          el.addEventListener('change', function () {
            toggleClear(this, clearEl)
          })
        }
      }
      for (const el of document.querySelectorAll('.bs-select-clear')) {
        el.addEventListener('click', function () {
          const select = this.previousElementSibling.querySelector('select')
          $(select).selectpicker('val', '')
          select.dispatchEvent(new Event('change'))
        })
      }
    })
  </script>
@endsection