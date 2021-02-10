import { Router } from '@angular/router';
import { Rdv } from './model/Rdv.model';
import { AppService } from './app.service';
import { Patient } from './model/Patient.model';
import { Component, OnInit } from '@angular/core';
import { RdvService } from './service/Rdv.service';
import { Praticien } from './model/Praticien.model';
import { PatientService } from './service/Patient.service';
import { PraticienService } from './service/Praticien.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: [
    './app.component.css'
  ]
})
export class AppComponent implements OnInit {
  title = 'AngularDoctolib';
  session = localStorage;

  allPatients:Patient[];
  patient:Patient;

  allPraticiens:Praticien[];
  praticien:Praticien;

  allRdvs:Rdv[];
  rdv:Rdv;

  constructor(
    private patientService:PatientService,
    private praticienService:PraticienService,
    private rdvService:RdvService,
    private AppService:AppService,
    private router:Router,
  ) {}

  ngOnInit():void {
    /* //* GET ALL PRATICIEN
    this.praticienService.getAllPraticiens().subscribe((response) => {
      this.allPraticiens = response;
      console.log(this.allPraticiens);
    }, (error) => {
      console.log(error);
    })
    */

    /* //* GET ONE PRATICIEN
    this.praticienService.getPraticien(3).subscribe((response) => {
      this.praticien = response;
      console.log(this.praticien);
    },(error) => {
      console.log(error);
    })
    */

    /* //* MODIFY PATIENT
    this.praticienService.PutPraticien(
      20,
      "testModifier_praticien@httprequest.com",
      "testHttpNomModifier01",
      "testHttpPrenomModifier01",
      "Orthopédie",
      "motDePasse02"
    )
    */

    /* //? GET ALL RDV
    this.rdvService.getAllRdvs().subscribe((response) => {
      this.allRdvs = response;
      console.log(this.allRdvs);
    }, (error) => {
      console.log(error);
    })
    */

    /* //? GET RDV
    this.rdvService.getRdv(7).subscribe((response) => {
      this.rdv = response;
      console.log(this.rdv);
    }, (error) => {
      console.log(error);
    })
    */

    /* //? GET RDV BY ID PATIENT
    this.rdvService.getRdvByIdPatient(10).subscribe((response) => {
      this.rdv = response;
      console.log(this.rdv);
    }, (error) => {
      console.log(error);
    })
    */

    /* //? GET RDV BY ID PRATICIEN
    this.rdvService.getRdvByIdPraticien(5).subscribe((response) => {
      this.rdv = response;
      console.log(this.rdv);
    }, (error) => {
      console.log(error);
    })
    */

    /* //? DELETE RDV
    this.rdvService.DelRdv(3)
    */

    /* //? ADD RDV
    this.rdvService.AddRdv(
      "2021-02-01 11:30:00",
      "86 Allée des flandres",
      10,
      3
    )
    */
  }

  logout() {
    this.AppService.logout();
  }
}
