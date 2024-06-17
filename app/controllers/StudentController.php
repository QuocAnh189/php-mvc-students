<?php

require_once APP_ROOT . '/services/StudentService.php';

class StudentController {
    protected $studentService;

    public function __construct($database) {
        $this->studentService = new StudentService($database);
    }

    public function index() {
        $students = $this->studentService->getAllStudents();
        view('student/index', ['students' => $students]);
    }

    public function create() {
        if (is_post_request()) {
            $result = $this->studentService->createStudent($_POST);
            if($result == 'student already exists'){
                return view('/falure/index', ['message' => 'Sinh viên này đã tồn tại']);
            }
            return redirect('/student/index');
        } else {
            return view('student/create');
        }
    }

    public function update($code) {
        if (is_post_request()) {
            $result = $this->studentService->updateStudent($code, $_POST);
            if($result == 'email already exists'){
                return view('/falure/index', ['message' => 'Email này đã được sử dụng']);
            }
            return redirect('/student/index');
        } else {
            $student = $this->studentService->getStudentByCode($code);
            view('student/update', ['student' => $student]);
        }
    }

    public function delete($code) {
        $this->studentService->deleteStudent($code);
        redirect('/student/index');
    }
}
