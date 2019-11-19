<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!--Plugin-->
<script src="{{asset('js/vendor/metismenu/dist/metisMenu.js')}}"></script>
<script src="{{asset('js/vendor/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('js/components/dashboard-init.js')}}"></script>
<script src="{{asset('js/components/main.js')}}"></script>
<script src="{{asset('js/components/toastr.min.js')}}"></script>
{!! Toastr::message() !!}
<script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                  toastr.error('{{ $error }}','Error',{
                      closeButton:true,
                      progressBar:true,
                   });
            @endforeach
        @endif
    </script>

@stack('scripts')
<!--script-->