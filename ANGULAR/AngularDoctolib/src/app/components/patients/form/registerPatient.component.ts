import { NgForm } from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { PatientService } from './../../../service/Patient.service';

@Component({
  selector : 'app-register-patient',
  templateUrl : './registerPatient.component.html',
  styleUrls : ['./registerPatient.component.css']
})
export class RegisterPatientComponent implements OnInit {
  ngOnInit() {}
  constructor(private patientService:PatientService) {}

  onSubmit(form:NgForm) {
    const email    = form.value['Email'];
    const nom      = form.value['Nom'];
    const prenom   = form.value['Prenom'];
    const age      = form.value['Age'];
    const password = form.value['Password'];

    this.patientService.AddPatient(email, nom, prenom, age, password);
  }
}
