@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __($title.' Mata Kuliah') }}</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <div class="card-body">
            <form method="POST" action="{{ route($url, $data->id ?? '') }}">
                @csrf
                @method($method)
                <div class="form-group row">
                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Kode Matakuliah') }}</label>

                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control" name="code" value="{{ $data->subject_code ?? '' }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Matakuliah') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $data->name ?? '' }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lecturer_code" class="col-md-4 col-form-label text-md-right">{{ __('Kode Dosen') }}</label>

                    <div class="col-md-6">
                        <select name="lecturer_code" id="lecture_code" class="form-control">
                            <option value="">-- Pilih --</option>
                            @foreach ($lecturers as $lecturer)
                                <option value="{{ $lecturer->identity_number }}" {{ !empty($data) ? ($data->lecture_code == $lecturer->identity_number ? 'selected' : '') : '' }}>{{ $lecturer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Jam') }}</label>

                    <div class="col-md-6">
                        <input id="time" type="time" class="form-control" value="{{ $data->time ?? '' }}" name="time" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="classroom" class="col-md-4 col-form-label text-md-right">{{ __('Ruang Kelas') }}</label>

                    <div class="col-md-6">
                        <input id="classroom" type="text" class="form-control" value="{{ $data->classroom ?? '' }}" name="classroom" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="max_student" class="col-md-4 col-form-label text-md-right">{{ __('Maksimum Mahasiswa') }}</label>

                    <div class="col-md-6">
                        <input id="max_student" type="text" class="form-control" value="{{ $data->student_total ?? '' }}" name="max_student" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Mulai') }}</label>

                    <div class="col-md-6">
                        <input id="start_date" type="date" class="form-control" value="{{ $data->start_date ?? '' }}" name="start_date" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection