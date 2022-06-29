@extends('layouts.user_type.auth')

@section('content')

<div>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px">
        <strong style="color: white">
            {{ $message }}
        </strong>
        <button type="button" style="color: white" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
    @elseif ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px">
        <strong style="color: white">
            {{ $message }}
        </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 10px">
        <ul>
            @foreach ($errors->all() as $error)
            <strong style="color: white">
                <li>{{ $error }}</li>
            </strong>
            @endforeach
        </ul>
        <button type="button" style="color: white" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Employess</h5>
                        </div>
                        <div class="modal fade" id="addEmployee" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="Add Employee" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add New Employee</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- form to add new employee --}}
                                        <form action="{{ route('addEmployee') }}" id="addEmployeeForm" method="POST">
                                            @csrf
                                            <div class="mb-2">
                                                <label for="nomorInduk" class="form-label">Nomor Induk</label>
                                                <input type="text" class="form-control" id="nomorInduk"
                                                    aria-describedby="nomorInduk" name="nomor_induk">
                                            </div>
                                            <div class="mb-2">
                                                <label for="nama" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="nama"
                                                    aria-describedby="nama" name="nama">
                                            </div>
                                            <div class="mb-2">
                                                <label for="alamat" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="alamat"
                                                    aria-describedby="alamat" name="alamat">
                                            </div>
                                            <div class="mb-2">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir"
                                                    aria-describedby="tanggal_lahir" name="tanggal_lahir">
                                            </div>
                                            <div class="mb-2">
                                                <label for="tanggal_bergabung" class="form-label">Tanggal
                                                    Bergabung</label>
                                                <input type="date" class="form-control" id="tanggal_bergabung"
                                                    aria-describedby="tanggal_bergabung" name="tanggal_bergabung">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <a onclick="document.getElementById('addEmployeeForm').submit();"
                                            class="btn btn-sm btn-primary">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a data-bs-toggle="modal" data-bs-target="#addEmployee"
                            class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Employee</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nomor Induk
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Address
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Birth Date
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Join Date
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$employee->id}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$employee->nomor_induk}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$employee->nama}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$employee->alamat}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{date('d-M-Y', strtotime($employee->tanggal_lahir))}}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{date('d-M-Y', strtotime($employee->tanggal_bergabung))}}
                                        </p>
                                    </td>
                                    <td class="text-left">
                                        <div class="modal fade" id="editEmployee{{$employee->id}}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="Edit {{$employee->id}} Employee" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editEmployee{{$employee->id}}">Edit
                                                            {{$employee->nama}}
                                                            Employee
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- form to edit employee --}}
                                                        <form
                                                            action="{{ route('editEmployee', ['id'=>$employee->id]) }}"
                                                            id="editEmployeeForm{{$employee->id}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-2">
                                                                <label for="nomorInduk" class="form-label">Nomor
                                                                    Induk</label>
                                                                <input type="text" class="form-control" id="nomorInduk"
                                                                    aria-describedby="nomorInduk" name="nomor_induk"
                                                                    value="{{$employee->nomor_induk}}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="nama" class="form-label">Name</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    aria-describedby="nama" name="nama"
                                                                    value="{{$employee->nama}}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="alamat" class="form-label">Address</label>
                                                                <input type="text" class="form-control" id="alamat"
                                                                    aria-describedby="alamat" name="alamat"
                                                                    value="{{$employee->alamat}}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="tanggal_lahir" class="form-label">Tanggal
                                                                    Lahir</label>
                                                                <input type="date" class="form-control"
                                                                    id="tanggal_lahir" aria-describedby="tanggal_lahir"
                                                                    name="tanggal_lahir"
                                                                    value="{{$employee->tanggal_lahir}}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="tanggal_bergabung"
                                                                    class="form-label">Tanggal
                                                                    Bergabung</label>
                                                                <input type="date" class="form-control"
                                                                    id="tanggal_bergabung"
                                                                    aria-describedby="tanggal_bergabung"
                                                                    name="tanggal_bergabung"
                                                                    value="{{$employee->tanggal_bergabung}}">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a onclick="document.getElementById('editEmployeeForm{{$employee->id}}').submit();"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="mx-3" data-bs-toggle="modal"
                                            data-bs-target="#editEmployee{{$employee->id}}"
                                            data-bs-original-title="Edit {{$employee->nama}}">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection