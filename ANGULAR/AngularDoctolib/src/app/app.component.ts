import { RdvService } from './service/Rdv.service';
import { PraticienService } from './service/Praticien.service';
import { PatientService } from './service/Patient.service';
import { Component, OnInit } from '@angular/core';
import { Patient } from './model/Patient.model';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: [
    './app.component.css'
  ]
})
export class AppComponent implements OnInit {
  title = 'AngularDoctolib';
  allPatients:Patient[];
  patient:Patient;

  constructor(
    private patientService:PatientService,
    private praticienService:PraticienService,
    private rdvService:RdvService
  ) {}

  ngOnInit():void {
    /* //! GET ALL PATIENTS
    this.patientService.getAllPatients().subscribe((response) => {
      this.allPatients = response;
      console.log(this.allPatients);
    }, (error) => {
      console.log(error);
    })
    */

    /* //! GET ONE PATIENT
    this.patientService.getPatient(1).subscribe((response) => {
      this.patient = response;
      console.log(this.patient);
    },(error) => {
      console.log(error);
    })
    */

    /* //! ADD PATIENT
    this.patientService.AddPatient(
      "test@httprequest.com",
      "testHttpNom",
      "testHttpPrenom",
      21,
      "motDePasse"
    )
    */

    /* //! DELETE PATIENT
    this.patientService.DelPatient(13)
    */

    /* //! MODIFY PATIENT
    this.patientService.PutPatient(
      14,
      "testModifier@httprequest.com",
      "testHttpNomModifier",
      "testHttpPrenomModifier",
      21,
      "motDePasse"
    )
    */
  }
}
