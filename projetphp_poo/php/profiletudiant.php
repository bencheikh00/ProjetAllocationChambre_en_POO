<!DOCTYPE html>
<html>

<head>
	<title>Profil étudiant</title>
	<link rel="stylesheet" type="text/css" href="./../css/profil.css">
</head>

<body>
<?php

class Student {

    public $name;
    public $dateOfBirth;
    public $address;
    public $phone;
    public $email;
    public $faculty;
    public $department;
    public $studentNumber;
    public $dateOfEnrollment;
    public $status;
    public $clubsAndOrganizations;

    public function __construct($name, $dateOfBirth, $address, $phone, $email, $faculty, $department, $studentNumber, $dateOfEnrollment, $status, $clubsAndOrganizations) {
        $this->name = $name;
        $this->dateOfBirth = $dateOfBirth;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->faculty = $faculty;
        $this->department = $department;
        $this->studentNumber = $studentNumber;
        $this->dateOfEnrollment = $dateOfEnrollment;
        $this->status = $status;
        $this->clubsAndOrganizations = $clubsAndOrganizations;
    }

    public function getName() {
        return $this->name;
    }

    public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFaculty() {
        return $this->faculty;
    }

    public function setDepartment($department) {
        $this->department = $department;
    }

    public function getStudentNumber() {
        return $this->studentNumber;
    }

    public function setDateOfEnrollment($dateOfEnrollment) {
        $this->dateOfEnrollment = $dateOfEnrollment;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setClubsAndOrganizations($clubsAndOrganizations) {
        $this->clubsAndOrganizations = $clubsAndOrganizations;
    }

    public function __toString() {
        return $this->name . ' ' . $this->dateOfBirth . ' ' . $this->address . ' ' . $this->phone . ' ' . $this->email . ' ' . $this->faculty . ' ' . $this->department . ' ' . $this->studentNumber . ' ' . $this->dateOfEnrollment . ' ' . $this->status . ' ' . $this->clubsAndOrganizations;
    }
}

$student = new Student('Joseph Faye', '05/09/2001', 'Rue Davide Diop, Dakar, SENEGAL', '+211 77 777 88 77', 'josephfaye2001@gmail.com', 'Informatique', 'Département Science', '2196339', '11/05/2022', 'Étudiant à temps plein', 'AGE (Assemblée Générale des Etudiants)');

echo $student;

?>

</body>

</html>