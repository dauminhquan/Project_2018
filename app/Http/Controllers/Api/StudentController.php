<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StudentRequest;
use App\Services\ProfileService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    // lay toan bo danh sach sinh vien
    // GET /api/student
    public function index()
    {
        //
        $studentProfile = new ProfileService();
        return $studentProfile->getStudentsInfo();
    }
    // GET /api/student/create
    // Hien thi form tao thong tin sinh vien
    // -- khong dung`den
    public function create()
    {
        //
    }

   // luu tru thong tin sinh vien
    // POST /api/student
    public function store(StudentRequest $request)
    {
        //
        
        $studentProfile = new ProfileService();
        if($request->hasFile("excel"))
        {
            return $studentProfile->addStudents(Excel::load($request->file("excel"))->get());
        }
        $studentProfile->addStudent($request);
        return ["sc" => "true"];
    }

   // hien thi thong tin sinh vien cu the

    // GET /api/student/{$id}
    public function show($id)
    {
        $studentProfile = new ProfileService();
        return $studentProfile->getStudentInfo($id);
    }

    //show form chinh sua
    // khong dung
    // GET /api/student/edit
    public function edit($id)
    {
        //
    }

    // update thong tin sinh vien
    // PUT/PATCH /api/student/{id}
    public function update(StudentRequest $request, $id)
    {

        $studentProfile = new ProfileService();

       return  $studentProfile->updateStudent($id,$request);
        return ["sc" => true];
    }

    // xoa sinh vien
    // DELETE /api/student/{id}
    public function destroy($id)
    {
        $studentProfile = new ProfileService();
        $studentProfile->deleteStudent($id);
        return ["sc" => true];
    }
}
