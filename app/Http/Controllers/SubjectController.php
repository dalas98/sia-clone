<?php

namespace App\Http\Controllers;

use App\EnrollSubject;
use App\Http\Requests\StoreSubject;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private $redirectTo = 'admin/subject';
    
    public function index()
    {
        $data['subjects'] = Subject::all();
        return view('admin.subjectList', $data);
    }

    public function add()
    {
        $data = [
            'lecturers' => User::where('role', 2)->get(),
            'url'=>'subject.store',
            'title' => 'Tambah',
            'method' => 'POST'
        ];
        return view('admin.subjectInput',$data);
    }

    public function store(StoreSubject $request)
    {
        $subject = new Subject;
        $subject->name = $request->name;
        $subject->subject_code = $request->code;
        $subject->lecture_code = $request->lecturer_code;
        $subject->time = $request->time;
        $subject->classroom = $request->classroom;
        $subject->student_total = $request->max_student;
        $subject->start_date = $request->start_date;
        $subject->save();

        return redirect($this->redirectTo)->with('session','Tambah Matakuliah Berhasil');
    }

    public function edit($id)
    {
        $data = [
            'data' => Subject::find($id),
            'lecturers' => User::where('role', 2)->get(),
            'url'=>'subject.update',
            'title' => 'Edit',
            'method' => 'PATCH'
        ];
        return view('admin.subjectInput',$data);
    }

    public function update(StoreSubject $request, Subject $subject)
    {
        $subject->name = $request->name;
        $subject->subject_code = $request->code;
        $subject->lecture_code = $request->lecturer_code;
        $subject->time = $request->time;
        $subject->classroom = $request->classroom;
        $subject->student_total = $request->max_student;
        $subject->start_date = $request->start_date;
        $subject->save();

        return redirect($this->redirectTo)->with('session','Edit Matakuliah Berhasil');
    }

    function destroy(Request $request)
    {
        $subject = Subject::find($request->id);
        $subject->delete();
        return redirect($this->redirectTo)->with('session','Hapus Matakuliah Berhasil');
    }

    public function enrollStudentSubject()
    {
        $data['subjects'] = Subject::all();
        $data['enrolls'] = EnrollSubject::where('student_id',request()->user()->id)->with('subject')->get();
        return view('student.enrollSubject',$data);
    }

    public function deleteEnrollStudent($id)
    {
        $enroll = EnrollSubject::find($id);
        $enroll->delete();
        return redirect('student/subject')->with('session','Berhasil Dihapus');
    }

    public function enrollRegisterStudentSubject($id)
    {
        $enroll = new EnrollSubject;
        $enroll->subject_id = $id;
        $enroll->student_id = request()->user()->id;
        $enroll->save();
        return redirect('student/subject')->with('session','Berhasil Ditambahkan');
    }
}
