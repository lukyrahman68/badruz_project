@extends('layouts.back_end')
@section('main')
    Karywan
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: "Selamat Datang Di <b>UD Sunan Drajad</b> - Tempat Belanja Murah."

        },{
            type: 'info',
            timer: 4000
        });

    });
</script>
@endsection