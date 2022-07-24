@extends('layouts.app')
@section('title', 'Data Mata Kuliah')
@section('page_title', 'Data Mata Kuliah')
@section('content')
<!-- Basic datatable -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Data Mata Kuliah</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                    data-target="#modal_tambah"><b><i class="icon-add"></i></b>
                    Tambah
                </button>
                {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
            </div>
        </div>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($course as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $item->course_code }}</td>
                <td>{{ $item->course }}</td>
                <td class="text-center">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div
                                    class="dropdown-header font-weight-semibold py-0 text-default text-uppercase font-size-xs line-height-xs mt-1">
                                    Prodi
                                </div>
                                <div class="dropdown-divider opacity-75"></div>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal_edit"
                                    onclick="editCourse({{ $item->id }})">
                                    <i class="icon-pencil"></i>
                                    Edit
                                </a>
                                <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                    <i class="icon-bin"></i>
                                    Delete
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('course.destroy', $item->id) }}"
                                    method="POST" class="d-none">
                                    @method('delete')
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /basic datatable -->

<!-- modal tambah dosen -->
@include('admin.modal.tambah_course')
<!-- /modal tambah dosen -->

<!-- modal edit dosen -->
@include('admin.modal.edit_course')
<!-- /modal edit mahasiswa -->

<script>
    $(document).ready(function() {
        $('.modal').on('hidden.bs.modal', function () {
                // alert('closing modal');
                $(this).find('form').trigger('reset');
            }) 
    });

    function editCourse(id) {
            //Show edit form
            // alert(id);
            var url = '{{ route("course.edit", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                // data: $('#FormAjax').serialize(),
                success: function (result) {
                    console.log(result);
                    $('#form_edit input[name="course_code"]').val(result.course_code);
                    $('#form_edit input[name="course"]').val(result.course);
                },
                error: function (data) {
                    // you'd want to show your validation errors if there are any, as well
                    console.log(data);
                }
            });
            //add route edit in form_edit
            var url = '{{route("course.update", ":id")}}';
            url = url.replace(':id', id);
            $('#form_edit').attr('action', url);
        }
</script>

@endsection