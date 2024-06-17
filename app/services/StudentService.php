<?php

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;
use Ramsey\Uuid\Uuid;

class StudentService {
    protected $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getAllStudents() {
        return $this->database->select('students', '*');
    }

    public function getStudentById($id) {
        return $this->database->get('students', '*', ['id' => $id]);
    }

    public function getStudentByCode($code) {
        return $this->database->get('students', '*', ['code' => $code]);
    }

    public function createStudent($data) {
        try {
            v::key('email', v::email()->notEmpty())
                ->key('username', v::length(5, 30)->notEmpty())
                ->key('department', v::length(5, 30)->notEmpty())
                ->key('major', v::length(5, 30)->notEmpty())
                ->assert($data);

            $student = $this->database->get('students', '*', ['email' => $data['email']]);
            if ($student){
                return 'student already exists';
            }

            return $this->database->insert('students', [
                'code' =>'SV' . substr(preg_replace('/\D/', '',str_replace('-', '',Uuid::uuid4()->toString())),0,6),
                'username' => $data['username'],
                'email' => $data['email'],
                'department' => $data['department'],
                'major' => $data['major']
            ]);
        } catch (NestedValidationException $e) {
            return $e->getMessage();
        }
    }

    public function updateStudent($code, $data) {
        try {
            v::key('email', v::email()->notEmpty())
                ->key('username', v::length(5, 30)->notEmpty())
                ->key('department', v::length(5, 30)->notEmpty())
                ->key('major', v::length(5, 30)->notEmpty())
                ->assert($data);

            $current_student = $this->database->get('students', '*', ['code' => $code]);
            if ($current_student['email'] !== $data['email']) {
                $student = $this->database->get('students', '*', ['email' => $data['email']]);
                if ($student) {
                    return 'email already exists';
                }
            }

            return $this->database->update('students', [
                'username' => $data['username'],
                'email' => $data['email'],
                'department' => $data['department'],
                'major' => $data['major']
            ], ['code' => $code]);
        } catch (NestedValidationException $e) {
            return $e->getMessage();
        }
    }


    public function deleteStudent($code) {
        return $this->database->delete('students', ['code' => $code]);
    }
}

class ValidationException extends Exception {
    private $validationErrors;

    public function __construct(array $validationErrors) {
        $this->validationErrors = $validationErrors;
        parent::__construct('Validation failed.');
    }

    public function getValidationErrors() {
        return $this->validationErrors;
    }
}