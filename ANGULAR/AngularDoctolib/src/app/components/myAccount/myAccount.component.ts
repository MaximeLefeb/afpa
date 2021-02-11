import { Observable } from 'rxjs';
import { Praticien } from './../../model/Praticien.model';
import { RdvService } from './../../service/Rdv.service';
import { Component, OnInit } from "@angular/core";
import { NgxSpinnerService } from "ngx-spinner";
import { Rdv } from "src/app/model/Rdv.model";
import { PatientService } from './../../service/Patient.service';
import { PraticienService } from './../../service/Praticien.service';

@Component({
  selector : 'app-myAccount',
  templateUrl : './myAccount.component.html',
  styleUrls : ['./myAccount.component.css']
})
export class MyAccountComponent implements OnInit {
  userInfo = JSON.parse(localStorage.getItem('userInfo'));
  type     = JSON.parse(localStorage.getItem('type'));
  namePraticien:string;
  namePatient:string;
  allRdvs:any;

  constructor(
    private rdvService:RdvService,
    private patientService:PatientService,
    private SpinnerService:NgxSpinnerService,
    private praticienService:PraticienService) {}

  ngOnInit():void {
    //* ECRAN DE CAHRGEMENT
    this.SpinnerService.show();

    //* GET ALL RDVS FOR THE CURRENT USER CONNECTED
    if (this.type == 'praticien') {
      this.rdvService.getRdvByIdPraticien(this.userInfo.id).subscribe((response) => {
        this.allRdvs = (response);
        this.GetName(this.allRdvs);
      }, (error) => {
        this.SpinnerService.hide();
        console.log(error);
      });
    } else if(this.type == 'patient') {
      this.rdvService.getRdvByIdPatient(this.userInfo.id).subscribe((response) => {
        this.allRdvs = (response);
        this.GetName(this.allRdvs);
      }, (error) => {
        this.SpinnerService.hide();
        console.log(error);
      });
    }
  }

  //* FOR DELETE ACCOUNT BUTTON
  public deleteAccount(id:number) {
    if (this.type == 'praticien') {
      this.praticienService.DelPraticien(id);
    } else {
      this.patientService.DelPatient(id);
    }
  }

  //*GET NAME OF PATIENT AND PRATICIEN
  public GetName(rdvs) {
    //* FOR EACH RDV
    for (const rdv of rdvs) {
      //*GET PRATICIEN NAME
      this.praticienService.getPraticien(rdv.praticien).subscribe(practicienFound => {
        //*GET PATIENT NAME
        this.patientService.getPatient(rdv.patient).subscribe(patientFound => {
          //* SET THE RESULT IN VARS
          this.namePraticien = practicienFound.nom;
          this.namePatient   = patientFound.nom;
          //* REPLACE ID BY NAME FOUND
          rdv.praticien = this.namePraticien
          rdv.patient   = this.namePatient
          this.SpinnerService.hide();
        }, (error) => {
          this.SpinnerService.hide();
          console.log(error);
        })
      }, (error) => {
        this.SpinnerService.hide();
        console.log(error);
      });
    }
  }
}

