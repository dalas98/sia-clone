@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Mata Kuliah') }}</div>

        <div class="card-body">
            @if (session('session'))
                <div class="alert alert-success" role="alert">
                    {{ session('session') }}
                </div>
            @endif
            <a href="{{ route('subject.add') }}" class="btn btn-info mb-2">Tambah Mata Kuliah</a>
            <table class="table text-center">
                <caption>Daftar Mata Kuliah</caption>
                <thead>
                    <th id="number">No.</th>
                    <th id="code">Kode</th>
                    <th id="subject">Matakuliah</th>
                    <th id="lecture_code">Kode Dosen</th>
                    <th id="time">Jam</th>
                    <th id="classroom">Ruang Kelas</th>
                    <th id="student_total">Jumlah Mahasiswa</th>
                    <th id="start_date">Tanggal Mulai</th>
                    <th id="action">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($subjects as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->subject_code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->lecture_code }}</td>
                            <td>{{ date('H:i',strtotime($item->time)). __(" - ") .date("H:i", strtotime('+90 minutes', strtotime($item->time))) }}</td>
                            <td>{{ $item->classroom }}</td>
                            <td>{{ __("0/").$item->student_total }}</td>
                            <td>{{ date("d F Y",strtotime($item->start_date)) }}</td>
                            <td>
                                <form action="{{ route('subject.destroy',$item->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('subject.edit',$item->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection