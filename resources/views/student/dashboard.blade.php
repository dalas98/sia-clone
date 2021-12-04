@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <table class="table text-center">
                        <caption>Daftar Mata Kuliah</caption>
                        <thead>
                            <th id="number">No.</th>
                            <th id="code">Kode</th>
                            <th id="subject">Matakuliah</th>
                            <th id="lecture_code">Kode Dosen</th>
                            <th id="time">Jam</th>
                            <th id="classroom">Ruang Kelas</th>
                            <th id="start_date">Tanggal Mulai</th>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->subject->subject_code }}</td>
                                    <td>{{ $item->subject->name }}</td>
                                    <td>{{ $item->subject->lecture_code }}</td>
                                    <td>{{ date('H:i',strtotime($item->subject->time)). __(" - ") .date("H:i", strtotime('+90 minutes', strtotime($item->subject->time))) }}</td>
                                    <td>{{ $item->subject->classroom }}</td>
                                    <td>{{ date("d F Y",strtotime($item->subject->start_date)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
