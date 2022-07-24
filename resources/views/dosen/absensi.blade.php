@extends('layouts.app')
@section('title', 'Absensi')
@section('page_title', 'Absensi')
@section('content')

<!-- Basic layout-->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Absensi</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($dosen as $item)
            <div class="col-md-6">
                <!-- Center alignment -->
                <div class="card text-center">
                    <div class="card-body">
                        <i class="icon-cube3 icon-2x text-danger border-danger border-3 rounded-round p-3 mb-3"></i>
                        <h5 class="card-title">{{ $item->course_code }}</h5>
                        <p class="mb-3">{{ $item->course}}</p>
                        @foreach ($item->kelas as $kelas)
                        <button class="btn bg-danger-400"
                            onclick="event.preventDefault(); document.getElementById('absensi-form-{{ $kelas->id }}').submit();">{{
                            $kelas->kelas }} - {{ $kelas->jenis_kelas }}</button>
                        <form id="absensi-form-{{ $kelas->id }}" action="{{ route('absensi.show', $kelas->id) }}"
                            method="GET" class="d-none">
                            @csrf
                        </form>
                        @endforeach

                    </div>
                </div>
                <!-- /center alignment -->
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- /basic layout -->
{{-- <script>
    $(document).ready(function() {
        $('.modal').on('hidden.bs.modal', function () {
                // alert('closing modal');
                $(this).find('form').trigger('reset');
            }) 
    });

    function editDosen(id) {
            //Show edit form
            // alert(id);
            var url = '{{ route("dosen.edit", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                // data: $('#FormAjax').serialize(),
                success: function (result) {
                    console.log(result);
                    $('#form_edit input[name="name"]').val(result.name);
                    $('#form_edit input[name="nim"]').val(result.nim);
                    $('#form_edit input[name="email"]').val(result.email);
                },
                error: function (data) {
                    // you'd want to show your validation errors if there are any, as well
                    console.log(data);
                }
            });
            //add route edit in form_edit
            var url = '{{route("dosen.update", ":id")}}';
            url = url.replace(':id', id);
            $('#form_edit').attr('action', url);
        }
</script> --}}

@endsection