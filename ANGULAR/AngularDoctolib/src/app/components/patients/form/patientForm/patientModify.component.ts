import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { Component, OnInit } from '@angular/core';
import { Patient } from './../../../../model/Patient.model';
import { PatientService } from './../../../../service/Patient.service';

@Component({
  selector: 'app-modification-patient',
  templateUrl: './patientModify.component.html',
  styleUrls: ['./patientModify.component.css']
})
export class PatientModifyComponent implements OnInit {
  userInfo = JSON.parse(localStorage.getItem('userInfo'));
  praticien :Patient;

  constructor(
    private router:Router,
    private patientService:PatientService,
    private SpinnerService:NgxSpinnerService) { }

  ngOnInit(): void {
    if (localStorage.length == 0) {
      this.router.navigate(['/login']);
    }
  }

  onSubmit(form: NgForm) {
    const id         = this.userInfo.id;
    const email      = form.value['Email'];
    const nom        = form.value['Nom'];
    const prenom     = form.value['Prenom'];
    const age        = form.value['Age'];
    const password   = form.value['Password'];

    this.SpinnerService.show();
    this.patientService.PutPatient(id, email, nom, prenom, age, password);
  }
}
