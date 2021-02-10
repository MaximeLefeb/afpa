import { NgxSpinnerService } from 'ngx-spinner';
import { Component, Input, OnChanges, OnInit, Output } from '@angular/core';
import { PatientService } from './../../service/Patient.service';
import { PraticienService } from './../../service/Praticien.service';

@Component({
  selector: 'app-rdvs',
  templateUrl: './rdvs.component.html',
  styleUrls: [
    './rdvs.component.css'
  ]
})
export class RdvsComponent implements OnChanges {
  userInfo = JSON.parse(localStorage.getItem('userInfo'));
  type     = JSON.parse(localStorage.getItem('type'));
  @Input() namePraticien:string;
  @Input() namePatient:string;
  @Input() rdvs:any;

  constructor(
    private patientService:PatientService,
    private SpinnerService:NgxSpinnerService,
    private praticienService:PraticienService,
  ) {}

  ngOnChanges():void {
    this.GetName();
  }

  public replaceIdByName() {
    for (const rdv of this.rdvs) {
      rdv.praticien = this.namePraticien;
      rdv.patient = this.namePatient;
      this.SpinnerService.hide();
    }
  }

  public GetName() {
    //! OUTPUT LA FONCTION POUR LA LANCER DANS LE COMPOSANT PARENT UNIQUEMENT A LA FIN DU GETRDV
    //* GET NOM FOR REPLACE RDV ID PRATICIEN
    this.praticienService.getPraticien(this.rdvs.praticien).subscribe(practicienFound => {
      this.namePraticien = practicienFound.nom;
      this.replaceIdByName();
    }, (error) => {
      this.SpinnerService.hide();
      console.log(error);
    });
    //* GET NOM FOR REPLACE RDV ID PATIENT
    this.patientService.getPatient(this.rdvs.patient).subscribe(patientFound => {
      this.namePatient = patientFound.nom;
      this.replaceIdByName();
    }, (error) => {
      this.SpinnerService.hide();
      console.log(error);
    })
  }
}
